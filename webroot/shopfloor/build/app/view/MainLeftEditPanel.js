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

Ext.define('ShopFloor.view.MainLeftEditPanel', {
    extend: 'Ext.Panel',
    alias: 'widget.mainlefteditpanel',

    requires: [
        'ShopFloor.view.DotSerialField'
    ],

    config: {
        layout: {
            type: 'hbox'
        },
        scrollable: 'vertical',
        items: [
            {
                xtype: 'fieldset',
                flex: 1,
                margin: '20px',
                width: '',
                defaults: {
                    labelWidth: '35%'
                },
                items: [
                    {
                        xtype: 'label',
                        models: [
                            'TireSize',
                            'Manufacturer',
                            'TreadDesign'
                        ],
                        border: 1,
                        cls: [
                            'x-form-fieldset-title x-docked-top'
                        ],
                        html: Bancha.t('Loading Casing...'),
                        tpl: [
                            '<tpl if="TireSize.width">{TireSize.width}/</tpl>{TireSize.name}=>{TireSize.aspect_ratio}R{TireSize.diameter} {Manufacturer.name} - {TreadDesign.name}'
                        ]
                    },
                    {
                        xtype: 'textfield',
                        modelField: 'TreadDesign.name',
                        label: Bancha.t('Tread Design')
                    },
                    {
                        xtype: 'textfield',
                        modelField: 'MoldType.description',
                        label: Bancha.t('Model Profile')
                    },
                    {
                        xtype: 'textfield',
                        modelField: 'Casing.tread_width',
                        label: Bancha.t('Tread Width')
                    },
                    {
                        xtype: 'textfield',
                        label: Bancha.t('Bead Plate ??????')
                    },
                    {
                        xtype: 'textfield',
                        modelField: 'Casing.production_week',
                        label: Bancha.t('Casing Age')
                    },
                    {
                        xtype: 'textfield',
                        modelField: 'Casing.customer_tag',
                        label: Bancha.t('Tag Number')
                    },
                    {
                        xtype: 'textfield',
                        modelField: 'Casing.grade',
                        label: Bancha.t('Casing Grade')
                    },
                    {
                        xtype: 'textfield',
                        modelField: 'BuffSpec.name',
                        label: Bancha.t('Recommended Buff')
                    },
                    {
                        xtype: 'textfield',
                        modelField: 'Casing.checking',
                        label: Bancha.t('Weather Checking')
                    },
                    {
                        xtype: 'dotserialfield',
                        defaults: '{labelWidth:'
                    }
                ]
            },
            {
                xtype: 'container',
                flex: 1,
                margin: '20px 20px 20px 10px',
                layout: {
                    type: 'vbox'
                },
                items: [
                    {
                        xtype: 'fieldset',
                        flex: 1,
                        title: Bancha.t('Special Instructions'),
                        items: [
                            {
                                xtype: 'textareafield',
                                modelField: 'Co.notes',
                                flex: 1,
                                clearIcon: false
                            }
                        ]
                    },
                    {
                        xtype: 'container',
                        layout: {
                            type: 'hbox'
                        },
                        items: [
                            {
                                xtype: 'button',
                                action: 'editleftsidecancel',
                                flex: 1,
                                margin: '0 10px 0 0',
                                ui: 'decline',
                                text: Bancha.t('Cancel')
                            },
                            {
                                xtype: 'button',
                                action: 'editleftsidesave',
                                flex: 1,
                                margin: '0 0 0 10px',
                                ui: 'confirm',
                                text: Bancha.t('Save')
                            }
                        ]
                    }
                ]
            }
        ]
    }

});