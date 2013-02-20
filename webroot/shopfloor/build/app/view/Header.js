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

Ext.define('ShopFloor.view.Header', {
    extend: 'Ext.Panel',
    alias: 'widget.header',

    config: {
        docked: 'top',
        id: 'header',
        style: 'border-bottom:1px solid black',
        height:190,
        layout: {
            type: 'hbox'
        },
        scrollable: false,
        items: [
            {
                xtype: 'container',
                styleHtmlContent: true,
                width: '50%',
                items: [
                    {
                        xtype: 'fieldset',
                        id: 'header_left_column',
                        title: Bancha.t('Loading Checkpoint...'),
                        items: [
                            {
                                xtype: 'textfield',
                                modelField: 'Casing.barcode',
                                disabled: true,
                                label: Bancha.t('Barcode')
                            },
                            {
                                xtype: 'textfield',
                                modelField: 'Co.ref',
                                disabled: true,
                                label: Bancha.t('Work Order Number')
                            },
                            {
                                xtype: 'textfield',
                                modelField: 'CoItem.line_number',
                                disabled: true,
                                label: Bancha.t('Line Number')
                            }
                        ]
                    }
                ]
            },
            {
                xtype: 'container',
                id: 'header_right_clumn',
                styleHtmlContent: true,
                width: '50%',
                items: [
                    {
                        xtype: 'button',
                        action: 'showcustomerdetails',
                        right: 15,
                        style: 'cursor:pointer; display:none',
                        top: 27,
                        ui: 'plain',
                        width: 30,
                        iconCls: 'compose',
                        iconMask: true
                    },
                    {
                        xtype: 'component',
                        models: 'CustomerAlert,Customer,Location',
                        action: 'showcustomerdetails',
                        cls: [
                            'customer-data-header'
                        ],
                        html: Bancha.t('Loading Customer Data...'),
                        minHeight: 47,
                        tpl: [
                            '<h1>',
                            '    <tpl if="CustomerAlert.present"><!--<img src="img/alert.png" title="{CustomerAlert.text}"/>--></tpl>',
                            '    {Customer.company_name}',
                            '</h1>',
                            '{Location.name}'
                        ]
                    },
                    {
                        xtype: 'fieldset',
                        items: [
                            {
                                xtype: 'textfield',
                                readOnly: true,
                                label: Bancha.t('Requested By'),
                                name: 'requester_name'
                            }
                        ]
                    }
                ]
            }
        ]
    }

});