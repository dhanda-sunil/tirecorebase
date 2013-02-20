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

Ext.define('ShopFloor.view.TireFailScreen', {
    extend: 'Ext.Panel',
    alias: 'widget.failscreen',

    requires: [
        'ShopFloor.view.FailReadonButton'
    ],

    config: {
        centered: true,
        id: 'TireFailScreen',
        minHeight: 500,
        minWidth: 700,
        layout: {
            type: 'fit'
        },
        modal: true,
        items: [
            {
                xtype: 'toolbar',
                docked: 'top',
                title: Bancha.t('Please select the reason for the fail')
            },
            {
                xtype: 'container',
                id: 'failscreen-card-container',
                layout: {
                    type: 'card'
                },
                items: [
                    {
                        xtype: 'container',
                        cls: [
                            'card-container'
                        ],
                        id: 'NrtCodeContainer',
                        layout: {
                            type: 'fit'
                        },
                        items: [
                            {
                                xtype: 'container',
                                docked: 'top',
                                hidden: true,
                                id: 'FailButtons1',
                                padding: '0 0 0 10',
                                style: 'background: white',
                                ui: '',
                                layout: {
                                    type: 'hbox'
                                },
                                items: [
                                    {
                                        xtype: 'failreasonbutton',
                                        hidden: true,
                                        text: Bancha.t('Sidewall Damage')
                                    },
                                    {
                                        xtype: 'failreasonbutton',
                                        hidden: true,
                                        text: Bancha.t('Shoulder Separation')
                                    },
                                    {
                                        xtype: 'failreasonbutton',
                                        hidden: true,
                                        text: Bancha.t('Bead Separation')
                                    }
                                ]
                            },
                            {
                                xtype: 'container',
                                docked: 'top',
                                hidden: true,
                                id: 'FailButtons2',
                                padding: '0 0 10 10',
                                style: 'background: white',
                                ui: '',
                                layout: {
                                    type: 'hbox'
                                },
                                items: [
                                    {
                                        xtype: 'failreasonbutton',
                                        text: Bancha.t('Too Many Repairs')
                                    },
                                    {
                                        xtype: 'failreasonbutton',
                                        text: Bancha.t('Brake Skid')
                                    },
                                    {
                                        xtype: 'failreasonbutton',
                                        hidden: true,
                                        text: Bancha.t('Impact Break')
                                    }
                                ]
                            },
                            {
                                xtype: 'list',
                                border: 1,
                                id: 'NrtCodeList',
                                itemTpl: [
                                    '<div>{category}  {name}</div>'
                                ],
                                store: 'NrtCodes'
                            }
                        ]
                    },
                    {
                        xtype: 'container',
                        layout: {
                            align: 'center',
                            pack: 'center',
                            type: 'hbox'
                        },
                        items: [
                            {
                                xtype: 'button',
                                action: 'failscreencasinghandling',
                                height: '100px',
                                margin: '0 20 0 0',
                                width: 200,
                                text: Bancha.t('Return as Received')
                            },
                            {
                                xtype: 'button',
                                action: 'failscreencasinghandling',
                                height: 100,
                                width: 200,
                                text: Bancha.t('Scrap')
                            }
                        ]
                    }
                ]
            },
            {
                xtype: 'toolbar',
                docked: 'bottom',
                height: 60,
                items: [
                    {
                        xtype: 'button',
                        action: 'cancelfailscreen',
                        height: 50,
                        width: 100,
                        text: Bancha.t('Cancel')
                    },
                    {
                        xtype: 'button',
                        action: 'failscreenup',
                        height: 50,
                        right: 110,
                        width: 100,
                        text: Bancha.t('Up')
                    },
                    {
                        xtype: 'button',
                        action: 'failscreendown',
                        height: 50,
                        right: 0,
                        width: 100,
                        text: Bancha.t('Down')
                    }
                ]
            }
        ]
    }

});