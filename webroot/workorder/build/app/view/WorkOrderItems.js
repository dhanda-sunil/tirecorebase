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

Ext.define('WorkOrder.view.WorkOrderItems', {
    extend: 'Ext.tab.Panel',
    alias: 'widget.workorderitems',

    requires: [
        'Ext.field.Number',
        'WorkOrder.view.GridView'
    ],

    config: {
        width: '100%',
        tabBar: {
            docked: 'top',
            layout: {
                pack: 'center',
                type: 'hbox'
            }
        },
        items: [{
            xtype: 'container',
            title: Bancha.t('Casings'),
            id: 'cocasingitemspanel',
            layout: {
                type: 'fit'
            },
            items: [{
                xtype: 'toolbar',
                docked: 'bottom',
                layout: {
                    pack: 'end',
                    type: 'hbox'
                },
                items: [{
                        xtype: 'button',
                        text: Bancha.t('Create')
                }]
            },{
                xtype: 'touchgridpanel',
                id: 'cocasingitemsgrid',
                columns: [{
                    header: Bancha.t('#'),
                    dataIndex: 'line_number',
                    style: 'padding-right: 0.5em; text-align: right;',
                    width: '5%',
                    filter: {
                        type: 'string'
                    },
                    editNext: true,
                    editor: {
                        xtype: 'numberfield',
                        clearIcon: false,
                        minValue: 0,
                        maxValue: 99999,
                        stepValue: 1
                    }
                },{
                    header: Bancha.t('Barcode'),
                    dataIndex: 'barcode',
                    style: 'padding-left: 0.5em;',
                    width: '10%',
                    filter: {
                        type: 'string'
                    },
                    editNext: true,
                    editor: {
                        xtype: 'numberfield',
                        clearIcon: false,
                        minValue: 0,
                        maxValue: 99999999999999999999,
                        //20 chars
                        stepValue: 1
                    }
                },{
                    header: Bancha.t('Line Code'),
                    dataIndex: 'co_item_type_id',
                    style: 'padding-left: 0.5em;',
                    width: '15%',
                    filter: {
                        type: 'string'
                    },
                    editNext: true,
                    renderer: function(co_item_type_id) {
                        var store = Ext.StoreMgr.get('CoItemCasingTypes');
                        if(!store || !store.getById(co_item_type_id)) {
                            return '&nbsp;'; // we need to always return something
                        }
                        return Bancha.t(store.getById(co_item_type_id).get('name'))+'&nbsp;';
                    },
                    editor: {
                        xtype: 'selectfield',
                        valueField: 'id',
                        displayField: 'name',
                        itemTpl: '<span class="x-list-label">{[Bancha.t(values.name)]}</span>',
                        /*seeselectcustomfieldoverride*/store: 'CoItemCasingTypes'
                    }
                },{
                    header: Bancha.t('DOT Code'),
                    dataIndex: 'dot_code',
                    style: 'padding-left: 0.5em;',
                    width: '15%',
                    filter: {
                        type: 'string'
                    },
                    editor: {
                        xtype: 'textfield',
                        clearIcon: false,
                        cls: 'input-text-transform-uppercase',
                        listeners: {
                            elementblur: function(textfield, newData, eOpts) {
                                if (textfield.getValue() != textfield.originalValue) {
                                    Ext.Viewport.fireEvent('dotfieldchange', textfield, newData, eOpts);
                                }
                            }
                        }
                    }
                },{
                    header: Bancha.t('Size'),
                    dataIndex: 'tire_size_id',
                    style: 'padding-left: 0.5em;',
                    width: '10%',
                    filter: {
                        type: 'string'
                    },
                    renderer: function(tire_size_id) {
                        var store = Ext.StoreMgr.get('TireSizes');
                        if(!store || !store.getById(tire_size_id)) {
                            return '&nbsp;'; // we need to always return something
                        }
                        return Bancha.t(store.getById(tire_size_id).get('name'))+'&nbsp;';
                    },
                    editor: {
                        xtype: 'textfield',
                        listeners: {
                            focus: function(textfield, e, eOpts) {
                                Ext.Viewport.fireEvent('tiresizefocus', textfield, textfield.getRecord(), e, eOpts);
                            }
                        }
                    }
                },{
                    header: Bancha.t('Brand'),
                    dataIndex: 'manufacturer_id',
                    style: 'padding-left: 0.5em;',
                    width: '15%',
                    filter: {
                        type: 'string'
                    },
                    renderer: function(manufacturer_id) {
                        var store = Ext.StoreMgr.get('Manufacturers');
                        if(!store || !store.getById(manufacturer_id)) {
                            return '&nbsp;'; // we need to always return something
                        }
                        return Bancha.t(store.getById(manufacturer_id).get('name'))+'&nbsp;';
                    },
                    editor: {
                        xtype: 'textfield',
                        readonly:true,
                        listeners: {
                            focus: function(textfield, e, eOpts) {
                                Ext.Viewport.fireEvent('manufacturersfocus', textfield, textfield.getRecord(), e, eOpts);
                            }
                        }
                    }
                },{
                    header: Bancha.t('Tread Design'),
                    dataIndex: 'tread_design_id',
                    style: 'padding-left: 0.5em;',
                    width: '10%',
                    filter: {
                        type: 'string'
                    },
                    renderer: function(tread_design_id) {
                        var store = Ext.StoreMgr.get('TreadDesigns');
                        if(!store || !store.getById(tread_design_id)) {
                            return '&nbsp;'; // we need to always return something
                        }
                        return Bancha.t(store.getById(tread_design_id).get('name'))+'&nbsp;';
                    },
                    editor: {
                        xtype: 'textfield',
                        listeners: {
                            focus: function(textfield, e, eOpts) {
                                Ext.Viewport.fireEvent('treaddesignfocus', textfield, textfield.getRecord(), e, eOpts);
                            }
                        }
                    }
                },{
                    header: Bancha.t('Actions'),
                    dataIndex: 'id',
                    style: '',
                    width: '20%',
                    filter: {
                        type: 'string'
                    },
                    renderer: function(id, value) {
                        // get the html of the new buttons (cached)
                        if(!this.buttons) {
                            this.buttons = Ext.create('Ext.Button', {
                                text: Bancha.t('more'),
                                cls: 'more',
                                ui:'confirm-small'
                            }).element.dom.outerHTML;
                            
                            this.buttons += Ext.create('Ext.Button', {
                                text: Bancha.t('duplicate'),
                                cls: 'duplicate',
                                ui:'confirm-small'
                            }).element.dom.outerHTML;
                            
                            this.buttons += Ext.create('Ext.Button', {
                                text: Bancha.t('delete'),
                                cls: 'destroy',
                                ui:'decline-small'
                            }).element.dom.outerHTML;
                        }
                        return this.buttons;
                    }
                }],
                features: [{
                        /*ftype: 'Ext.ux.touch.grid.feature.Sorter',
                        launchFn: 'initialize'
                    },
                    {
                        */ftype: 'Ext.ux.touch.grid.feature.Editable2',
                        launchFn: 'initialize'
                }],
                store: 'CoCasingItems',
                disableSelection: true
            }]
        },{
            xtype: 'container',
            title: Bancha.t('Services'),
            id: 'coserviceitemspanel',
            layout: {
                type: 'fit'
            },
            items: [{
                xtype: 'touchgridpanel',
                columns: [{
                    header: Bancha.t('Line Code'),
                    dataIndex: 'co_item_type_id',
                    style: 'padding-left: 1em;',
                    width: '20%',
                    filter: {
                        type: 'string'
                    },
                    editNext: true,
                    renderer: function(co_item_type_id) {
                        var store = Ext.StoreMgr.get('CoItemServiceTypes');
                        if(!store || !store.getById(co_item_type_id)) {
                            return '&nbsp;'; // we need to always return something
                        }
                        return Bancha.t(store.getById(co_item_type_id).get('name'))+'&nbsp;';
                    },
                    editor: {
                        xtype: 'selectfield',
                        valueField: 'id',
                        displayField: 'name',
                        itemTpl: '<span class="x-list-label">{[Bancha.t(values.name)]}</span>',
                        /*seeselectcustomfieldoverride*/store: 'CoItemServiceTypes'
                    }
                },{
                    header: Bancha.t('Service'),
                    dataIndex: 'desc',
                    style: 'padding-left: 1em;',
                    width: '72%',
                    filter: {
                        type: 'string'
                    },
                    editor: {
                        xtype: 'textfield',
                        clearIcon: false
                    }
                },{
                    header: Bancha.t('Actions'),
                    dataIndex: 'id',
                    style: '',
                    width: '8%',
                    filter: {
                        type: 'string'
                    },
                    renderer: function(id, value) {
                        // get the html of the new button (cached)
                        if(!this.button) {
                            this.button = Ext.create('Ext.Button', {
                                text: Bancha.t('delete'),
                                cls: 'destroy',
                                ui:'decline-small'
                            }).element.dom.outerHTML;
                        }
                        return this.button;
                    }
                }],
                features: [{
                        /*ftype: 'Ext.ux.touch.grid.feature.Sorter',
                        launchFn: 'initialize'
                    },
                    {
                        */ftype: 'Ext.ux.touch.grid.feature.Editable2',
                        launchFn: 'initialize'
                    }],
                id: 'coserviceitemsgrid',
                store: 'CoServiceItems',
                disableSelection: true
            },{
                xtype: 'toolbar',
                docked: 'bottom',
                layout: {
                    pack: 'end',
                    type: 'hbox'
                },
                items: [{
                    xtype: 'button',
                    text: Bancha.t('Create')
                }]
            }]
        }]
    }
});