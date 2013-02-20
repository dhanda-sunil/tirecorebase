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

Ext.define('ShopFloor.field.NumberSplit', {
    extend: 'Ext.field.Number',
    xtype : 'numbersplitfield',
    
    config: {
        value:0,
        clearIcon:false,
        readOnly:true,
        cls:'x-field-numbersplit'
    }, 
    initialize: function(){
        this.callParent();
        this.element.on('tap', function(e, dom, eOpts) {
            //blur and prevent all defaults
            dom.blur();
            e.stopPropagation();
            e.preventDefault();
            e.stopEvent();            
            var fieldWidth = e.target.clientWidth;
            var clickX = e.browserEvent.offsetX || e.event.offsetX;
            var halfWidth = Math.round(fieldWidth/2);
            if (clickX <= halfWidth) {
                //left side click
                if (this.getValue() > 0) {
                    this.setValue(this.getValue()-1);
                }
            } else {
                //right side click
                this.setValue(this.getValue()+1);
            }
        },this);
    }
});