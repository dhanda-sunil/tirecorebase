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

Ext.define('ShopFloor.view.FinalInspectionCheckpointPanel', {
    extend: 'Ext.Panel',
    alias: 'widget.checkpointpanel5',

    config: {
        items: [
            {
                xtype: 'container',
                height: 300,
                itemId: 'mycontainer1',
                layout: {
                    type: 'hbox'
                },
                items: [
                    {
                        xtype: 'list',
                        id: 'AppliedRepairs',
                        itemId: 'mylist',
                        itemTpl: [
                            '<div>',
                            '    <table>',
                            '        <tr>',
                            '            <td width="160px">{material_name}</td>',
                            '            <td width="100px">x{quantity}</td>',
                            '            <td width="160px">{repair_type_name}</td>',
                            '        </tr>',
                            '    </table>',
                            '</div>'
                        ],
                        selectedCls: 'none',
                        store: 'RepairActuals',
                        items: [
                            {
                                xtype: 'titlebar',
                                docked: 'top',
                                width: 767,
                                title: Bancha.t('Repairs'),
                                layout: {
                                    align: 'end',
                                    type: 'hbox'
                                }
                            }
                        ]
                    }
                ]
            },
            {
                xtype: 'container',
                height: 300,
                layout: {
                    type: 'hbox'
                },
                items: [
                    {
                        xtype: 'fieldset',
                        width: 768,
                        items: [
                            {
                                xtype: 'selectfield',
                                modelField: 'Casing.tread_design_id',
                                disabled: true,
                                id: 'TreadDesignFin',
                                label: Bancha.t('Design'),
                                displayField: 'name',
                                store: 'TreadDesigns',
                                valueField: 'id'
                            },
                            {
                                xtype: 'selectfield',
                                modelField: 'Casing.tread_width_id',
                                disabled: true,
                                id: 'TreadWidthFin',
                                label: Bancha.t('Width'),
                                displayField: 'tread_width',
                                store: 'TreadWidths',
                                valueField: 'id'
                            },
                            {
                                xtype: 'image',
                                height: 201,
                                id: 'TreadDesignImageFin',
                                margin: '10px auto 5px auto',
                                width: '200px',
                                src: '/img/tread_default.jpg'
                            },
                            {
                                xtype: 'titlebar',
                                docked: 'top',
                                width: 767,
                                title: Bancha.t('Tread Desgn / Width'),
                                layout: {
                                    align: 'end',
                                    type: 'hbox'
                                }
                            }
                        ]
                    }
                ]
            }
        ],
        listeners: [
            {
                fn: 'onAppliedRepairsShow',
                event: 'show',
                delegate: '#AppliedRepairs'
            }
        ]
    },

    onAppliedRepairsShow: function(component, options) {
        this.refresh();
    }

});