/*!
 *
 * ShopFloor Application
 * Copyright 2012 TCS
 *
 * @package       ShopFloor
 * @copyright     Copyright 2012 TCS
 * @author        Roland Schuetz <mail@rolandschuetz.at>
 * @author        Chris Nizzardini <cnizzardini@gmail.com>
 * @author        Jeff Wooden <jeff@morointeractive.com>
 */
/*jslint browser: true, vars: true, plusplus: true, white: true, sloppy: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false, strict:false */
/*global Ext:false, Bancha:false, ShopFloor:true, localActions:false, window:false */

Ext.define('ShopFloor.view.DotTextField', {
    extend: 'Ext.field.Text',
    alias: 'widget.dottextfield',

    config: {
        modelField: 'DotSerial.name',
        itemId: 'mytextfield4',
        style: 'border-bottom:1px solid #ddd;',
        width: '100%',
        clearIcon: false,
        label: Bancha.t('DOT Serial Number'),
        labelWidth: '35%',
        maxLength: 12,
        listeners: [
            {
                fn: 'onValuesSet',
                event: 'change'
            }
        ]
    },

    onValuesSet: function(textfield, newValue, oldValue, options) {
        if(newValue) {
            // replace this field with individual text fields
            var values = {};

            if(newValue.length === 12) {
                values = {
                    a: newValue.substr(0,2),
                    b: newValue.substr(2,2),
                    c: newValue.substr(4,4),
                    d: newValue.substr(8,4)
                };
            } else if(newValue.length === 8) {
                values = {
                    a: newValue.substr(0,2),
                    b: newValue.substr(2,2),
                    c: '----',
                    d: newValue.substr(4,4)
                };
            } else if(newValue.length === 6) {
                values = {
                    a: newValue.substr(0,2),
                    b: '--',
                    c: '----',
                    d: newValue.substr(2,4)
                };
            } else if(newValue.length === 2) {
                values = {
                    a: newValue.substr(0,2),
                    b: '--',
                    c: '----',
                    d: '----'
                };
            } else {
                return;
            }

            var validator = function(expectedLength) {
                return function(value) {
                    return value && value.length===expectedLength && value.indexOf('-')===-1;
                };
            };

            var fieldNotEmpty = { // on panel painted all values get registered
                'Casing.production_week': true // just set last to true so we don't get an error in first rendering
            };
            var resetter = function(textfield, newValue) {

                fieldNotEmpty[textfield.config.modelField] = newValue.replace(/-/g,'').length; // - doesn't count

                if(fieldNotEmpty[textfield.config.modelField]) {
                    return; // nothing to reset
                }

                // maybe reset
                var reset = true;
                Ext.Object.each(fieldNotEmpty, function(key,notEmpty) {
                    if(notEmpty) {
                        reset = false;
                    }
                });

                if(!reset) {
                    return;
                }

                // clear all old fields
                var container = textfield.getParent();
                container.removeAll();

                // add the new textfield
                container.add({xtype:'dottextfield'});

                Ext.create('ShopFloor.controller.mixin.ViewController');
            };


            var createListeners = function(value, isValid, defaultStyles) {
                return {
                    change: function(textfield, newValue, oldValue) {
                        if(isValid(newValue)) {
                            textfield.setStyle('background-color: white;'+defaultStyles);
                        } else {
                            textfield.setStyle('background-color: red;'+defaultStyles);
                        }
                        resetter(textfield, newValue);
                    },
                    painted: function(field) {
                        // set the value when it's painted to trigger the validation event
                        field.setValue(value);
                    }
                };
            };

            var container = textfield.getParent();
            container.remove(textfield);
            container.add({
                xtype: 'panel',
                width: '100%',
                layout: {
                    type: 'hbox'
                },
                defaults: {
                    xtype: 'textfield',
                    clearIcon: false,
                    autoCapitalize: true 
                },  
                items: [
                {
                    label: Bancha.t('DOT Serial Number'),
                    modelField: 'ManufacturerPlant.code',
                    maxLength: 2,
                    labelWidth: '74.5%',
                    width: '47%',
                    listeners: createListeners(values.a, validator(2),'border-radius: 0; webkit-border-radius: 0;')
                }, {
                    modelField: 'TireSize.two_char_code',
                    maxLength: 2,
                    width: '11%',
                    listeners: createListeners(values.b, validator(2))
                }, {
                    modelField: 'ManufacturerProductLine.dot_code',
                    maxLength: 4,
                    width: '21%',
                    listeners: createListeners(values.c, validator(4))
                }, {
                    modelField: 'Casing.production_week',
                    width: '21%',
                    listeners: createListeners(values.d, function(value) {
                        return value && value.length===4 && value.indexOf('-')===-1 && 
                        parseInt(value.substr(0,2),10)>=0 && parseInt(value.substr(0,2),10)<=52 &&
                        parseInt(value.substr(2,2),10)>=0 && parseInt(value.substr(2,2),10)<=parseInt(Ext.Date.format(new Date(), 'y'),10);
                    }, 'border-bottom:1px solid #ddd; border-radius: 0; webkit-border-radius: 0;')
                }
                ]
            }); //eo container add

            Ext.create('ShopFloor.controller.mixin.ViewController');

        } //eo if new value
    }

});