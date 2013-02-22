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
/*global Ext:false, jQuery:false, Bancha:false, ShopFloor:true, localActions:false, window:false */

Ext.define('WorkOrder.controller.AppController', {
    extend: 'Ext.app.Controller',

    mixins: {
        viewController: 'ShopFloor.controller.mixin.ViewController',
        convenience: 'WorkOrder.controller.mixin.Convenience'
    },

    config: {
        control: {
            "button[action=navigationnext]": {
                tap: 'onNextClick'
            },
            "button[action=pass]": {
                tap: 'onPassClick'
            },
            "button[action=navigationback]": {
                tap: 'onBackClick'
            },
            "button[action=cancel]": {
                tap: 'onCancelClick'
            }
        }
    },

    onNextClick: function(button, e, options) {
        if(button.getDisabled()) {
            return;
        }

        this.showNextScreen();
    },

    onPassClick: function(button, e, options) {
        if(button.getDisabled()) {
            return;
        }

        var me = this;

        this.saveData(Ext.Viewport, function() {
            // after the data is saved, prompt for new casing
            me.promptForCasingBarcode();
        });
    },

    onBackClick: function(button, e, options) {
        if(button.getDisabled()) {
            return;
        }

        this.showPreviousScreen();
    },

    onCancelClick: function(button, e, options) {
        if(button.getDisabled()) {
            return;
        }

        this.getApplication().fireEvent('reset');
        this.showScreen('workorderselection','right');
    },

    onLoggedIn: function(userRecord) {
        // load translations
        Bancha.Localizer.currentLang = userRecord.get('lang');
        Ext.ux.Localizer.localize(Ext.Viewport, userRecord.get('lang'));

        // load the main view (we have to wait till here to be able to render in the correct language)
        Ext.Viewport.add(this.createPanel('widget.main'));
    },

    /**
     * Prompts should by default close on an enter press
     */
    launch: function() {
        
        Ext.Msg.on('show', function(cmp) {

            if(Ext.Msg.getPrompt() === null){
                return; // there is a config object this time
            }

            // every time there os a new prompt config, apply listener

            Ext.Msg.getPrompt().on('keyup', function(field, e) {
                if(e.browserEvent.keyCode===13) {
                    e.stopEvent();

                    // fake a on-button press
                    Ext.Msg.onClick(Ext.Msg.buttonsToolbar.getItems().getByKey('ok'));
                }
            });
        });
    },

    init: function(application) {
        application.on([
            { event: 'loggedin', fn: this.onLoggedIn, scope: this }
        ]);
    }

});