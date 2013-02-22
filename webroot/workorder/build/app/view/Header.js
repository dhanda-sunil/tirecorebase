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

Ext.define('WorkOrder.view.Header', {
    extend: 'Ext.Panel',
    alias: 'widget.header',
    config: {
        docked: 'top',
        id: 'header',
        style: 'border-bottom:1px solid black',
        layout: {
            type: 'hbox'
        },
        scrollable: false,
        items: [{
            xtype: 'container',
            styleHtmlContent: true,
            width: 510,
            items: [{
                xtype: 'fieldset',
                id: 'header_left_column',
                title: Bancha.t('Enter Order Details'),
                items: [{
                    xtype: 'textfield',
                    modelField: 'Co.ref',
                    label: Bancha.t('Work Order Number')
                },{
                    xtype: 'datepickerfield',
                    modelField: 'Co.created',
                    label: Bancha.t('Work Order Date'),
                    placeHolder: 'mm/dd/yyyy',
                    dateFormat: 'm/d/Y',
                    picker: {
                        yearFrom: 2011,
                        yearTo: 2020
                    }
                },{
                    xtype: 'datepickerfield',
                    modelField: 'Co.pickup_date',
                    label: Bancha.t('Picked Up Date'),
                    placeHolder: 'mm/dd/yyyy',
                    dateFormat: 'm/d/Y',
                    picker: {
                        value: {
                            year: 2012,
                            month: 1,
                            day: 1
                        },
                        yearFrom: 2012,
                        yearTo: 2020,
                        doneButton: {
                            ui: 'confirm'
                        },
                        cancelButton: {
                            ui: 'decline'
                        }
                    }
                },{
                    xtype: 'textfield',
                    modelField: 'Co.po_number',
                    label: Bancha.t('PO Number')
                }]
            }]
        },{
            xtype: 'container',
            id: 'header_right_clumn',
            styleHtmlContent: true,
            width: '50%',
            items: [{
                xtype: 'button',
                action: 'showcustomerdetails',
                right: 15,
                style: 'cursor:pointer;',
                top: 27,
                ui: 'plain',
                width: 30,
                iconCls: 'compose',
                iconMask: true
            },{
                xtype: 'component',
                models: 'CustomerAlert,Customer,Location',
                action: 'showcustomerdetails',
                cls: [
                    'customer-data-header'
                ],
                minHeight: 50,
                tpl: [
                    '<h1><tpl if="CustomerAlert.present"><img src="img/alert.png" title="{CustomerAlert.text}"/></tpl> {Customer.company_name}</h1>',
                    '{Location.name}'
                ]
            },{
                xtype: 'fieldset',
                items: [{
                    xtype: 'selectfield',
                    modelField: 'Co.requester_id',
                    allowBlank: true,
                    label: Bancha.t('Requested By'),
                    name: 'requester_id',
                    displayField: 'name',
                    store: 'CustomerContacts',
                    valueField: 'id'
                }, {
                    xtype: 'container',
                    role: 'showRequestorPhoneNumber',
                    html: Bancha.t('Please select a requestor'),
                    padding: 10,
                    tpl: [
                        '{[Bancha.t(values.type)]}: {value}'
                    ]
                }]
            }]
        }]
    }
});