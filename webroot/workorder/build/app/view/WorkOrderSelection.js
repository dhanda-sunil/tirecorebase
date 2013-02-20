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

Ext.define('WorkOrder.view.WorkOrderSelection', {
    extend: 'Ext.Container',
    alias: 'widget.workorderselection',

    requires: [
        'Ext.field.Search',
        'Ext.Label',
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
                        title: Bancha.t('Select Work Order')
                    },
                    {
                        xtype: 'searchfield',
                        label: Bancha.t('Search any field below'),
                        name: 'search'
                    },
                    {
                        xtype: 'touchgridpanel',
                        columns: [
                            {
                                header: Bancha.t('Work Order'),
                                dataIndex: 'ref',
                                style: 'padding-left: 1em;',
                                width: '20%',
                                filter: {
                                    type: 'string'
                                },
                                highlight: true
                            },
                            {
                                header: Bancha.t('Account'),
                                dataIndex: 'account_number',
                                style: 'padding-left: 1em;',
                                width: '20%',
                                filter: {
                                    type: 'string'
                                },
                                highlight: true
                            },
                            {
                                header: Bancha.t('Company Name'),
                                dataIndex: 'company_name',
                                style: 'padding-left: 1em;',
                                width: '30%',
                                filter: {
                                    type: 'string'
                                },
                                sortable: false,
                                highlight: true
                            },
                            {
                                header: Bancha.t('Contact Person'),
                                dataIndex: 'contact_name',
                                style: 'padding-left: 1em;',
                                width: '30%',
                                filter: {
                                    type: 'string'
                                },
                                sortable: false,
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
                        store: 'CustomerOrdersSearch',
                        flex: 1
                    },
                    {
                        xtype: 'toolbar',
                        docked: 'bottom',
                        items: [
                            {
                                xtype: 'spacer'
                            },
                            {
                                xtype: 'button',
                                action: 'createWorkOrder',
                                ui: 'confirm',
                                text: Bancha.t('New Work Order')
                            }
                        ]
                    }
                ]
            }
        ]
    }

});