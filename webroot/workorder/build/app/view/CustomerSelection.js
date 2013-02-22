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

Ext.define('WorkOrder.view.CustomerSelection', {
    extend: 'Ext.Container',
    alias: 'widget.customerselection',

    requires: [
        'WorkOrder.view.GridView'
    ],

    config: {
        items: [
            {
                xtype: 'panel',
                centered: true,
                height: '93%',
                width: 900,
                hideOnMaskTap: false,
                layout: {
                    type: 'vbox'
                },
                modal: true,
                items: [
                    {
                        xtype: 'titlebar',
                        docked: 'top',
                        title: Bancha.t('Select Customer')
                    },
                    {
                        xtype: 'searchfield',
                        label: Bancha.t('Search for'),
                        name: 'search'
                    },
                    {
                        xtype: 'touchgridpanel',
                        columns: [
                            {
                                header: Bancha.t('Company Name'),
                                dataIndex: 'company_name',
                                style: 'padding-left: 1em;',
                                width: '30%',
                                filter: {
                                    type: 'string'
                                },
                                highlight: true
                            },
                            {
                                header: Bancha.t('First Name'),
                                dataIndex: 'first_name',
                                style: 'padding-left: 1em;',
                                width: '30%',
                                filter: {
                                    type: 'string'
                                },
                                highlight: true
                            },
                            {
                                header: Bancha.t('Last Name'),
                                dataIndex: 'last_name',
                                style: 'padding-left: 1em;',
                                width: '30%',
                                filter: {
                                    type: 'string'
                                },
                                highlight: true
                            }
                        ],
                        header: {
                            xtype: 'toolbar',
                            docked: 'top',
                            cls: [
                                'x-grid-header',
                                'grid-header-align-left'
                            ]
                        },
                        emptyText: '<div style="margin-top: 60px; text-align: center">'+Bancha.t('No matches to your search')+'</div>',
                        flex: 1
                    },
                    {
                        xtype: 'toolbar',
                        docked: 'bottom',
                        items: [
                            {
                                xtype: 'button',
                                action: 'cancel',
                                ui: 'decline',
                                text: Bancha.t('Cancel')
                            },
                            {
                                xtype: 'spacer'
                            },
                            {
                                xtype: 'button',
                                action: 'createWorkOrder',
                                hidden: true,
                                ui: 'confirm',
                                text: Bancha.t('New Customer')
                            }
                        ]
                    }
                ]
            }
        ]
    }

});