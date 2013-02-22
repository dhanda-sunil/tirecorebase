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

Ext.define('WorkOrder.view.MainPanel', {
    extend: 'Ext.Panel',
    alias: 'widget.main',

    requires: [
        'WorkOrder.view.WorkOrderSelection',
        'WorkOrder.view.CustomerSelection',
        'WorkOrder.view.Header',
        'WorkOrder.view.AccountSelection',
        'WorkOrder.view.WorkOrderItems',
        'WorkOrder.view.Confirmation'
    ],

    config: {
        width: '100%',
        layout: {
            animation: 'slide',
            type: 'card'
        },
        scrollable: false,
        items: [
            {
                xtype: 'workorderselection'
            },
            {
                xtype: 'customerselection'
            },
            {
                xtype: 'container',
                width: '100%',
                layout: {
                    type: 'hbox'
                },
                scrollable: false,
                items: [
                    {
                        xtype: 'header'
                    },
                    {
                        xtype: 'panel',
                        flex: 1,
                        id: 'mainrightpanel',
                        layout: {
                            animation: 'slide',
                            type: 'card'
                        },
                        scrollable: false,
                        items: [
                            {
                                xtype: 'accountselection'
                            },
                            {
                                xtype: 'workorderitems'
                            }
                        ]
                    },
                    {
                        xtype: 'toolbar',
                        role: 'footer',
                        docked: 'bottom',
                        height: 90,
                        scrollable: false,
                        items: [
                            {
                                xtype: 'label',
                                model: 'User',
                                docked: 'top',
                                html: Bancha.t('Logging in...'),
                                itemId: 'mylabel',
                                left: 10,
                                top: 5,
                                tpl: [
                                    '<p style="font-size:14px;color:#000;">'+Bancha.t('You are current logged in as:<br />{first_name} {last_name}')+'<p>'
                                ]
                            },
                            {
                                xtype: 'button',
                                action: 'logout',
                                bottom: 10,
                                left: 5,
                                text: Bancha.t('Logout')
                            },
                            {
                                xtype: 'spacer'
                            },
                            {
                                xtype: 'button',
                                action: 'cancel',
                                height: '50px',
                                style: 'font-size:25px;-webkit-border-radius: 0px;',
                                ui: 'decline',
                                width: '100px',
                                text: Bancha.t('Cancel')
                            },
                            {
                                xtype: 'button',
                                action: 'navigationback',
                                height: '50px',
                                style: 'font-size:25px;-webkit-border-radius: 0px;',
                                width: '100px',
                                text: Bancha.t('Back')
                            },
                            {
                                xtype: 'button',
                                action: 'navigationnext',
                                disabled: true,
                                height: '50px',
                                style: 'font-size:25px;-webkit-border-radius: 0px;',
                                ui: 'confirm',
                                width: '100px',
                                text: Bancha.t('Next')
                            }
                        ]
                    }
                ]
            },
            {
                xtype: 'container',
                items: [
                    {
                        xtype: 'confirmation'
                    },
                    {
                        xtype: 'toolbar',
                        role: 'footer',
                        docked: 'bottom',
                        height: 90,
                        scrollable: false,
                        items: [
                            {
                                xtype: 'label',
                                model: 'User',
                                docked: 'top',
                                html: Bancha.t('Logging in...'),
                                itemId: 'mylabel',
                                left: 10,
                                top: 5,
                                tpl: [
                                    '<p style="font-size:14px;color:#000;">'+Bancha.t('You are current logged in as:<br />{first_name} {last_name}')+'<p>'
                                ]
                            },
                            {
                                xtype: 'button',
                                action: 'logout',
                                bottom: 10,
                                left: 5,
                                text: Bancha.t('Logout')
                            },
                            {
                                xtype: 'spacer'
                            },
                            {
                                xtype: 'button',
                                action: 'cancel',
                                height: '50px',
                                style: 'font-size:25px;-webkit-border-radius: 0px;',
                                ui: 'decline',
                                width: '100px',
                                text: Bancha.t('Cancel')
                            },
                            {
                                xtype: 'button',
                                action: 'navigationback',
                                height: '50px',
                                style: 'font-size:25px;-webkit-border-radius: 0px;',
                                width: '100px',
                                text: Bancha.t('Back')
                            },
                            {
                                xtype: 'button',
                                action: 'navigationsave',
                                height: '50px',
                                style: 'font-size:25px;-webkit-border-radius: 0px;',
                                ui: 'confirm',
                                width: '100px',
                                text: Bancha.t('Save')
                            }
                        ]
                    }
                ]
            }
        ]
    }

});