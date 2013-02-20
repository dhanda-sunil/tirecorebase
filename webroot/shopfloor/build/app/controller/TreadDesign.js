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

Ext.define('ShopFloor.controller.TreadDesign', {
    extend: 'Ext.app.Controller',

    mixins: {
        recordController: 'ShopFloor.controller.mixin.RecordController',
        viewController: 'ShopFloor.controller.mixin.ViewController'
    },

    config: {
    },

    init: function(application) {

        this.setupModel({
            modelName: 'TreadDesign',
            load: {
                event: 'loadpostcasingmodels'
            },
            renderable: true,
            saveable: true
        });
        
        application.on([
            { event: 'beadselected', fn: this.onBeadSelected, scope: this },
            { event: 'moldselected', fn: this.onMoldSelected, scope: this }
        ]);
    },
    onBeadSelected: function(value) {
        var me=this;
        var casing = this.getApplication().getController('Casing').getActiveRecord();
        this.disable('Viewport', Bancha.t('Verifying Barcode...'));
        Bancha.getStub('MoldType').checkBead(parseInt(value), casing.get('tread_design_id'), casing.get('tire_size_id'), function(result,response) {
            if (result.success) {
                me.getApplication().fireEvent('closebarcodewindow');
                me.getApplication().fireEvent('forcecasingselection', 'mold');
            } else {
                me.enable('Viewport');
                Ext.Msg.alert(
                    Bancha.t('Error'),
                    Bancha.t('Could not find a valid barcode, please try again.'),
                    function(btn) {
                        if (btn == 'ok') {
                            me.getApplication().getController('AppController').promptForCasingBarcode('bead');
                        }
                    }
                );
            }
        });
    },    
    onMoldSelected: function(value) {
        var me=this;
        var casing = this.getApplication().getController('Casing').getActiveRecord();
        this.disable('Viewport', Bancha.t('Verifying Barcode...'));
        Bancha.getStub('MoldType').checkMold(parseInt(value), casing.get('tread_design_id'), casing.get('tire_size_id'), function(result,response) {
            if (result.success) {
                me.getApplication().fireEvent('closebarcodewindow');
                me.enable('Viewport');
            } else {
                me.enable('Viewport');
                Ext.Msg.alert(
                    Bancha.t('Error'),
                    Bancha.t('Could not find a valid barcode, please try again.'),
                    function(btn) {
                        if (btn == 'ok') {
                            me.getApplication().getController('AppController').promptForCasingBarcode('mold');
                        }
                    }
                );
            }
        });
    }
});