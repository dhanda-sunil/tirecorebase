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

Ext.define('ShopFloor.controller.InitialInspection', {
    extend: 'Ext.app.Controller',
    config: {
        refs: {
            inspectiongrid: 'inspectiongrid'
        }
    },
    
    onLoadPostCasingModels: function(record) {
        var me=this;
            if (record.get('tire_size_id') !== null) {
            Bancha.getStub('Preference').getCustomerRepairPrefs(record.get('customer_id'), record.get('tire_size_id'), function(result, cfg, response) {
                if (!result.success) {
                    Ext.Msg.alert(
                        Bancha.t('Attention'),
                        result.error);
                } else {
                    me.parseCustomerPrefs(result.data.preferences);
                }
            });
        } else {
            Ext.Msg.alert(Bancha.t('Attention'), 'Customer preferences cannot be loaded because a tire_size_id was not found.');
        }
    },
    parseCustomerPrefs: function(prefs) {
        //create a global customer prefs object
        ShopFloor.customerPrefs = {};
        //set our dynamic array
        ShopFloor.customerPrefs.dynamic = [];
        //get standard prefs
        for (var i=0;i<prefs.length;i++) { 
            if (prefs[i].name === 'max-age') {
                ShopFloor.customerPrefs.maxAge = prefs[i];
            } else if (prefs[i].name === 'Spot') {
                ShopFloor.customerPrefs.spot = prefs[i];
            } else if (prefs[i].name === 'Sidewall') {
                ShopFloor.customerPrefs.sidewall = prefs[i];
            } else if (prefs[i].name === 'Shoulder') {
                ShopFloor.customerPrefs.shoulder = prefs[i];
            } else if (prefs[i].name === 'Large Crown') {
                ShopFloor.customerPrefs.largeCrown = prefs[i];
            } else if (prefs[i].name === 'Crown') {
                ShopFloor.customerPrefs.crown = prefs[i];
            } else if (prefs[i].name === 'Bead') {
                ShopFloor.customerPrefs.bead = prefs[i];
            } else if (prefs[i].name === 'max-retreads') {
                ShopFloor.customerPrefs.maxRetreads = prefs[i];
            } else if (prefs[i].name === 'max-repairs') {
                ShopFloor.customerPrefs.maxRepairs = prefs[i];
            } else if (prefs[i].name === 'max-recap') {
                ShopFloor.customerPrefs.maxRecap = prefs[i];
            } else if (prefs[i].name === 'nrt-pref') {
                ShopFloor.customerPrefs.nrtPref = prefs[i];
            } else if (prefs[i].name === 'tread-pref') {
                ShopFloor.customerPrefs.treadPref = prefs[i];
            } else {
                //build dynamic prefs
                ShopFloor.customerPrefs.dynamic.push(prefs[i]);
            }
        }
        //now set inspection screen prefs
        var grid = this.getInspectiongrid();
        grid.down('field[name=profile_crown]').setValue(ShopFloor.customerPrefs.crown.value);
        grid.down('field[name=profile_shoulder]').setValue(ShopFloor.customerPrefs.shoulder.value);
        grid.down('field[name=profile_sidewall]').setValue(ShopFloor.customerPrefs.sidewall.value);
        grid.down('field[name=profile_bead]').setValue(ShopFloor.customerPrefs.bead.value);
    },
    onTotalFieldChange: function(field) {
        var crownVal = parseInt(ShopFloor.customerPrefs.crown.value, 10),
            shoulderVal = parseInt(ShopFloor.customerPrefs.shoulder.value, 10),
            sidewallVal = parseInt(ShopFloor.customerPrefs.sidewall.value, 10),
            beadVal = parseInt(ShopFloor.customerPrefs.bead.value, 10),
            fieldValue = parseInt(field.getValue(),10);
        
        if (field.getName() === 'total_crown') {
            if (fieldValue === crownVal) {
                field.addCls('red-cell');
            } else if (fieldValue === (crownVal+1)) {
                Ext.Msg.alert(Bancha.t('Attention'),Bancha.t('You have selected more repairs than what is allowed.'));
            } else if (field.getValue() < crownVal) {
                field.removeCls('red-cell');
            }
        }
        if (field.getName() === 'total_shoulder') {
            if (fieldValue === shoulderVal) {
                field.addCls('red-cell');
            } else if (fieldValue === (shoulderVal+1)) {
                Ext.Msg.alert(Bancha.t('Attention'),Bancha.t('You have selected more repairs than what is allowed.'));
            } else if (field.getValue() < shoulderVal) {
                field.removeCls('red-cell');
            }
        }
        if (field.getName() === 'total_sidewall') {
            if (fieldValue === sidewallVal) {
                field.addCls('red-cell');
            } else if (fieldValue === (sidewallVal+1)) {
                Ext.Msg.alert(Bancha.t('Attention'),Bancha.t('You have selected more repairs than what is allowed.'));
            } else if (field.getValue() < sidewallVal) {
                field.removeCls('red-cell');
            }
        }
        if (field.getName() === 'total_bead') {
            if (fieldValue === beadVal) {
                field.addCls('red-cell');
            } else if (fieldValue === (beadVal+1)) {
                Ext.Msg.alert(Bancha.t('Attention'),Bancha.t('You have selected more repairs than what is allowed.'));
            } else if (field.getValue() < beadVal) {
                field.removeCls('red-cell');
            }
        }
    },
    init: function(application) {
        application.on([
            { event: 'loadpostcasingmodels', fn: this.onLoadPostCasingModels, scope: this }
        ]);
        Ext.Viewport.on([
            { event: 'totalfieldchange', fn: this.onTotalFieldChange, scope: this }
        ]);
    }
});