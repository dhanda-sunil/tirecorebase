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

Ext.define('ShopFloor.view.MainPanel', {
    extend: 'Ext.Panel',
    alias: 'widget.main',
    requires: [
        'ShopFloor.view.Header',
        'ShopFloor.view.MainLeftPanel',
        'ShopFloor.view.SwipeTab'
    ],
    config: {
        associatedModels:['Casing', 'Manufacturer', 'Customer', 'TireSize', 'TreadDesign', 'MoldType', 'BuffSpec', 'DotSerial', 'CoItem', 'Co'],
        cls:'main-panel',
        width: '100%',
        layout: {
            type: 'hbox'
        },
        scrollable: false,
        items: [{
            xtype: 'header'
        },{
            xtype: 'mainleftpanel'
        },{
            xtype: 'swipetab'
        },{
            xtype: 'panel',
            id: 'mainrightpanel',
            flex:1,
            layout: {
                animation: 'slide',
                type: 'card'
            },
            scrollable: false
        }]
    }
});