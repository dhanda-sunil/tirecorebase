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

Ext.define('ShopFloor.controller.MainLeftSidePanel', {
    extend: 'Ext.app.Controller',

    mixins: {
        viewController: 'ShopFloor.controller.mixin.ViewController'
    },

    config: {
        views: [
            'MainLeftEditPanel'
        ],

        refs: {
            mainLeft: '#mainleftpanel'
        },

        control: {
            "button[action=editleftside]": {
                tap: 'onEditLeftSideClick'
            },
            "button[action=editleftsidecancel]": {
                tap: 'onEditLeftSideCancelClick'
            },
            "button[action=editleftsidesave]": {
                tap: 'onEditLeftSideSaveClick'
            }
        }
    },

    onEditLeftSideClick: function(button, e, options) {
        if(button.getDisabled()) {
            return;
        }

        // disable other controls
        this.disable(['Header', 'MainRight', 'Footer']);

        // create new edit panel
        var panel = this.createPanel('ShopFloor.view.MainLeftEditPanel');

    // display panel
    this.getMainLeft().setWidth("90%");
    this.getMainLeft().setActiveItem(panel);
    },

    onEditLeftSideCancelClick: function(button, e, options) {
        if(button.getDisabled()) {
            return;
        }

        this.finishEditing();
    },

    onEditLeftSideSaveClick: function(button, e, options) {
        if(button.getDisabled()) {
            return;
        }

        this.disable('MainLeft', Bancha.t('Saving data...'));

        // perform save operation, and listen in onDataSaved for the finish
        var me = this;
        this.saveData(this.getMainLeft(), function() {
            me.finishEditing();

            // to inject the new data trigger a new painted event on the display panel
            me.getApplication().fireEvent('panelpainted', me.getMainLeft());
        });
    },

    finishEditing: function() {

        this.enable(['Header', 'MainLeft', 'MainRight', 'Footer']);

        // display the view panel again
        var panel = this.getMainLeft();
        panel.setWidth("50%");
        panel.setActiveItem(0);

        // after the animation finishes
        setTimeout(function() {
            panel.removeAt(1);
        }, 100);
    }

});