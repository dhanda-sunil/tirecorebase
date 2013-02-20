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

Ext.define('ShopFloor.view.InitialInspectionGrid', {
    extend: 'Ext.Container',
    alias: 'widget.inspectiongrid',

    requires: [
        'Ext.form.Panel',
        'Ext.form.FieldSet',
        'ShopFloor.field.NumberSplit'
    ],

    config: {
        layout:'vbox',
        height:196,
        items:[{
            //row 1
            xtype:'container',
            height:24,
            layout:'hbox',
            items:[{
                xtype:'container',
                flex:1,
                html:''
            },{
                xtype:'container',
                flex:1,
                style:'text-align:center;',
                html:'<strong>'+Bancha.t('CROWN')+'</strong>'
            },{
                xtype:'container',
                flex:1,
                style:'text-align:center;',
                html:'<strong>'+Bancha.t('SHOULDER')+'</strong>'
            },{
                xtype:'container',
                flex:1,
                style:'text-align:center;',
                html:'<strong>'+Bancha.t('SIDEWALL')+'</strong>'
            },{
                xtype:'container',
                flex:1,
                style:'text-align:center;',
                html:'<strong>'+Bancha.t('BEAD')+'</strong>'
            }]
        },{
            //row 2
            xtype:'container',
            flex:1,
            layout:'hbox',
            items:[{
                xtype:'container',
                flex:1,
                style:'background-color:#f1f1f1; padding-left:6px;',
                html: '<div style="height:40px; line-height:40px; font-weight:bold; text-algin:right !important;">'+Bancha.t('PREVIOUS')+'</div>'
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666;',
                items:[{
                    xtype:'numbersplitfield',
                    name:'previous_crown',
                    listeners:{
                        initialize: function(field){
                            field.element.on('tap', function(e, dom, eOpts) {
                                var sharedField = Ext.ComponentQuery.query('numbersplitfield[name=required_crown]')[0];
                                var totalField = Ext.ComponentQuery.query('numberfield[name=total_crown]')[0];
                                totalField.setValue(field.getValue()+sharedField.getValue());
                                Ext.Viewport.fireEvent('totalfieldchange', totalField);
                            });
                        }
                    }
                }]
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666;',
                items:[{
                    xtype:'numbersplitfield',
                    name:'previous_shoulder',
                    listeners:{
                        initialize: function(field){
                            field.element.on('tap', function(e, dom, eOpts) {
                                var sharedField = Ext.ComponentQuery.query('numbersplitfield[name=required_shoulder]')[0];
                                var totalField = Ext.ComponentQuery.query('numberfield[name=total_shoulder]')[0];
                                totalField.setValue(field.getValue()+sharedField.getValue());
                                Ext.Viewport.fireEvent('totalfieldchange', totalField);
                            });
                        }
                    }
                }]
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666;',
                items:[{
                    xtype:'numbersplitfield',
                    name:'previous_sidewall',
                    listeners:{
                        initialize: function(field){
                            field.element.on('tap', function(e, dom, eOpts) {
                                var sharedField = Ext.ComponentQuery.query('numbersplitfield[name=required_sidewall]')[0];
                                var totalField = Ext.ComponentQuery.query('numberfield[name=total_sidewall]')[0];
                                totalField.setValue(field.getValue()+sharedField.getValue());
                                Ext.Viewport.fireEvent('totalfieldchange', totalField);
                            });
                        }
                    }
                }]
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-right:1px solid #666;',
                items:[{
                    xtype:'numbersplitfield',
                    name:'previous_bead',
                    listeners:{
                        initialize: function(field){
                            field.element.on('tap', function(e, dom, eOpts) {
                                var sharedField = Ext.ComponentQuery.query('numbersplitfield[name=required_bead]')[0];
                                var totalField = Ext.ComponentQuery.query('numberfield[name=total_bead]')[0];
                                totalField.setValue(field.getValue()+sharedField.getValue());
                                Ext.Viewport.fireEvent('totalfieldchange', totalField);
                            });
                        }
                    }
                }]
            }]
        },{
            //row 3
            xtype:'container',
            flex:1,
            layout:'hbox',
            items:[{
                xtype:'container',
                flex:1,
                style:'background-color:#f1f1f1; border-top:1px solid #666; padding-left:6px;',
                html:'<div style="height:40px; line-height:40px; font-weight:bold; text-algin:right !important;">'+Bancha.t('REQUIRED')+'</div>'
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666;',
                items:[{
                    xtype:'numbersplitfield',
                    name:'required_crown',
                    listeners:{
                        initialize: function(field){
                            field.element.on('tap', function(e, dom, eOpts) {
                                var sharedField = Ext.ComponentQuery.query('numbersplitfield[name=previous_crown]')[0];
                                var totalField = Ext.ComponentQuery.query('numberfield[name=total_crown]')[0];
                                totalField.setValue(field.getValue()+sharedField.getValue());
                                Ext.Viewport.fireEvent('totalfieldchange', totalField);
                            });
                        }
                    }
                }]
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666;',
                items:[{
                    xtype:'numbersplitfield',
                    name:'required_shoulder',
                    listeners:{
                        initialize: function(field){
                            field.element.on('tap', function(e, dom, eOpts) {
                                var sharedField = Ext.ComponentQuery.query('numbersplitfield[name=previous_shoulder]')[0];
                                var totalField = Ext.ComponentQuery.query('numberfield[name=total_shoulder]')[0];
                                totalField.setValue(field.getValue()+sharedField.getValue());
                                Ext.Viewport.fireEvent('totalfieldchange', totalField);
                            });
                        }
                    }
                }]
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666;',
                items:[{
                    xtype:'numbersplitfield',
                    name:'required_sidewall',
                    listeners:{
                        initialize: function(field){
                            field.element.on('tap', function(e, dom, eOpts) {
                                var sharedField = Ext.ComponentQuery.query('numbersplitfield[name=previous_sidewall]')[0];
                                var totalField = Ext.ComponentQuery.query('numberfield[name=total_sidewall]')[0];
                                totalField.setValue(field.getValue()+sharedField.getValue());
                                Ext.Viewport.fireEvent('totalfieldchange', totalField);
                            });
                        }
                    }
                }]
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-right:1px solid #666;',
                items:[{
                    xtype:'numbersplitfield',
                    name:'required_bead',
                    listeners:{
                        initialize: function(field){
                            field.element.on('tap', function(e, dom, eOpts) {
                                var sharedField = Ext.ComponentQuery.query('numbersplitfield[name=previous_bead]')[0];
                                var totalField = Ext.ComponentQuery.query('numberfield[name=total_bead]')[0];
                                totalField.setValue(field.getValue()+sharedField.getValue());
                                Ext.Viewport.fireEvent('totalfieldchange', totalField);
                            });
                        }
                    }
                }]
            }]
        },{
            //row 4
            xtype:'container',
            flex:1,
            layout:'hbox',
            items:[{
                xtype:'container',
                flex:1,
                style:'background-color:#f1f1f1; border-top:1px solid #666; padding-left:6px;',
                html:'<div style="height:40px; line-height:40px; font-weight:bold; text-algin:right !important;">'+Bancha.t('TOTAL')+'</div>'
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                items:[{
                    xtype:'numberfield',
                    value:0,
                    readOnly:true,
                    cls:'field-centered-dark',
                    name:'total_crown'
                }]
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                items:[{
                    xtype:'numberfield',
                    value:0,
                    readOnly:true,
                    cls:'field-centered-dark',
                    name:'total_shoulder'
                }]
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                items:[{
                    xtype:'numberfield',
                    value:0,
                    readOnly:true,
                    cls:'field-centered-dark',
                    name:'total_sidewall'
                }]
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;  border-right:1px solid #666;',
                items:[{
                    xtype:'numberfield',
                    value:0,
                    readOnly:true,
                    cls:'field-centered-dark',
                    name:'total_bead'
                }]
            }]
        },{
            //row 5
            xtype:'panel',
            flex:1,
            height:16
        },{
            //row 6
            xtype:'container',
            flex:1,
            layout:'hbox',
            items:[{
                xtype:'container',
                flex:1,
                style:'background-color:#f1f1f1; padding-left:6px;',
                html:'<div style="height:40px; line-height:40px; font-weight:bold; text-algin:right !important;">'+Bancha.t('LIMITS')+'</div>'
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                items:[{
                    xtype:'numberfield',
                    value:0,
                    readOnly:true,
                    cls:'field-centered-dark',
                    name:'profile_crown'
                }]
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                items:[{
                    xtype:'numberfield',
                    value:0,
                    readOnly:true,
                    cls:'field-centered-dark',
                    name:'profile_shoulder'
                }]
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                items:[{
                    xtype:'numberfield',
                    value:0,
                    readOnly:true,
                    cls:'field-centered-dark',
                    name:'profile_sidewall'
                }]
            },{
                xtype:'container',
                flex:1,
                style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;  border-right:1px solid #666;',
                items:[{
                    xtype:'numberfield',
                    value:0,
                    readOnly:true,
                    cls:'field-centered-dark',
                    name:'profile_bead'
                }]
            }]
        }]
    }
});