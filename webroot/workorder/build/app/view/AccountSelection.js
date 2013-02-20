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

Ext.define('WorkOrder.view.AccountSelection', {
    extend: 'Ext.Container',
    alias: 'widget.accountselection',

    requires: [
        'Ext.form.FieldSet',
        'Ext.field.Select',
        'Ext.field.Number',
        'Ext.field.TextArea'
    ],

    config: {
        layout: {
            type: 'hbox'
        },
        scrollable: false,
        items: [
            {
                xtype: 'container',
                padding: '0 20',
                width: '50%',
                layout: {
                    type: 'vbox'
                },
                scrollable: false,
                items: [
                    {
                        xtype: 'fieldset',
                        title: Bancha.t('Account'),
                        items: [
                            {
                                xtype: 'selectfield',
                                modelField: 'Co.account_id',
                                allowBlank: true,
                                label: Bancha.t('Account Number'),
                                readOnly: false,
                                displayField: 'number',
                                store: 'Accounts',
                                valueField: 'id'
                            }
                        ]
                    },
                    {
                        xtype: 'fieldset',
                        flex: 1,
                        layout: {
                            type: 'fit'
                        },
                        title: Bancha.t('Special Instructions'),
                        items: [
                            {
                                xtype: 'textareafield',
                                modelField: 'Co.notes',
                                label: ''
                            }
                        ]
                    }
                ]
            },
            {
                xtype: 'container',
                id: 'addressselection',
                padding: '0 20',
                width: '50%',
                layout: {
                    type: 'vbox'
                },
                scrollable: true,
                items: [
                    {
                        xtype: 'fieldset',
                        title: '',
                        items: [
                            {
                                xtype: 'selectfield',
                                modelField: 'Co.bill_address_id',
                                allowBlank: true,
                                label: Bancha.t('Billing Address'),
                                name: 'billing_address',
                                displayField: 'name',
                                store: 'AccountBillingAddresses',
                                valueField: 'id'
                            },
                            {
                                xtype: 'component',
                                html: Bancha.t('Please select an address'),
                                padding: 10,
                                tpl: [
                                    Bancha.t([
                                        '{line1}<br/>',
                                        '{line2}<br/>',
                                        '{zip}<tpl if="zip">, </tpl>{state}'
                                    ].join('')) // some other countries might have different formats here
                                ],
                                ui: 'dark'
                            }
                        ]
                    },
                    {
                        xtype: 'fieldset',
                        title: '',
                        items: [
                            {
                                xtype: 'selectfield',
                                modelField: 'Co.ship_address_id',
                                allowBlank: true,
                                label: Bancha.t('Shipping Address'),
                                name: 'shipping_address',
                                displayField: 'name',
                                store: 'AccountShippingAddresses',
                                valueField: 'id'
                            },
                            {
                                xtype: 'component',
                                html: Bancha.t('Please select an address'),
                                padding: 10,
                                tpl: [
                                    Bancha.t([
                                        '{line1}<br/>',
                                        '{line2}<br/>',
                                        '{zip}<tpl if="zip">, </tpl>{state}'
                                    ].join('')) // some other countries might have different formats here
                                ],
                                ui: 'dark'
                            }
                        ]
                    },
                    {
                        xtype: 'fieldset',
                        height: 250,
                        layout: {
                            type: 'fit'
                        },
                        title: Bancha.t('Select A Contact Number'),
                        items: [
                            {
                                xtype: 'list',
                                role: 'accountphonenumbers',
                                emptyText: Bancha.t('No phone number defined yet'),
                                itemTpl: [
                                    '<div>{[Bancha.t(values.type)]}: {value}</div>'
                                ],
                                store: 'AccountPhoneNumbers'
                            },
                            {
                                xtype: 'container',
                                docked: 'bottom',
                                items: [
                                    {
                                        xtype: 'button',
                                        action: 'createPhoneNumber',
                                        text: Bancha.t('Add Number')
                                    }
                                ]
                            }
                        ]
                    }
                ]
            }
        ]
    }

});