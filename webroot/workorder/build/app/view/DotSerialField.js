/*!
 *
 * WorkOrder Application
 * Copyright 2012 TCS
 *
 * @package       WorkOrder
 * @copyright     Copyright 2012 TCS
 * @author        Roland Schuetz <mail@rolandschuetz.at>
 * @author        Chris Nizzardini <cnizzardini@gmail.com>
 * @author        Jeff Wooden <jeff@morointeractive.com>
 */
/*jslint browser: true, vars: true, plusplus: true, white: true, sloppy: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false, strict:false */
/*global Ext:false, jQuery:false, Bancha:false, WorkOrder:true, localActions:false, window:false */

Ext.define('WorkOrder.view.DotSerialField', {
    extend: 'Ext.Container',
    alias: 'widget.dotserialfield',

    requires: [
        'WorkOrder.view.DotTextField'
    ],

    config: {
        items: [
            {
                xtype: 'dottextfield'
            }
        ],
        listeners: [
            {
                fn: 'onContainerShow',
                event: 'show'
            }
        ]
    },

    onContainerShow: function(component, options) {


        // check if we have an value and if so, inject it into the text field
        if(this.config.value && this.getAt(0).setValue) {
            this.getAt(0).setValue(this.config.value);
        }
    },

    getValue: function() {
        /**
        * Implement a get value function be be usable as grid editor
        */

        var item = this.getItems().getAt(0);

        if(item.getValue) {
            // it's the single textfield
            return item.getValue();
        }

        // it's the container
        var value = '';
        item.getItems().each(function(field) {
            value += field.getValue();
        });

        return value.toUpperCase();
    },

    focus: function() {
        // since this is actually a component, but mimics a input field we focus on the first inner field
        var item = this.getItems().getAt(0);
        if(item && item.focus) {
            item.focus();
        }
    },

    isDirty: function() {
        return true;
    },

    getName: function() {
        return this.config.name;
    }

});