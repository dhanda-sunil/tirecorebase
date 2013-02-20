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

Ext.define('ShopFloor.controller.Gestures', {
    extend: 'Ext.app.Controller',
    config:{
        refs:{
            main: 'mainleftpanel',
            swipetab: 'swipetab'
        },
        control:{
            "main": {
                initialize: 'mainLeftPanelInit'
            },
            "swipetab": {
                initialize: 'swipeTabInit'
            }
        }
    },
    init: function(application) {
        this.mainLeftPanelState = 1; //open
    },
    mainLeftPanelInit: function(panel, eOpts) {
        panel.element.on('swipe', function(event, node, options, eOpts) {
            if (event.direction === 'left' && this.getState() === 1) {
                this.getMain().hide();
                this.getSwipetab().setCls('swipe-tab-closed').setWidth(24);    
                this.setState(0);
            }
        }, this);
    },
    setState: function(state) {
        this.mainLeftPanelState = parseInt(state, 10);
    },
    getState: function() {
        return this.mainLeftPanelState;
    },
    swipeTabInit: function(panel, eOpts) {
        panel.element.on('tap', function(button, e, eOpts) {
            if (this.getState() === 1) {
                this.getMain().hide();
                this.getSwipetab().setCls('swipe-tab-closed').setWidth(24);
                this.setState(0);
            } else {
                this.getMain().show();
                this.getSwipetab().setCls('swipe-tab-open').setWidth(18);
                this.setState(1);
            }

        }, this);
    },
    manualLeftPanelCollapse: function(collapse) {
        if (collapse && this.mainLeftPanelState === 1) {
            this.getMain().hide();
            this.getSwipetab().setCls('swipe-tab-closed').setWidth(24);
            this.setState(0);
        } else if (!collapse && this.mainLeftPanelState === 0) {
            this.getMain().show();
            this.getSwipetab().setCls('swipe-tab-open').setWidth(18);
            this.setState(1);
        }
    }
});