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

Ext.define('ShopFloor.controller.FinalInspection', {
    extend: 'Ext.app.Controller',

    config: {
        refs: {
            mainRight: '#mainrightpanel',
            treadDesignImage: '#TreadDesignImageFin'
        },

        control: {
            "#TreadDesignFin": {
                change: 'onDesignChange'
            },
            "#AppliedRepairs": {
                refresh: 'onListRefresh'
            }
        }
    },

    onDesignChange: function(selectfield, newValue, oldValue, options) {
        this.getTreadDesignImage().setSrc('/TreadDesigns/viewimage/'+newValue+'.jpg');
        this.getTreadDesignImage().setWidth(230);
        this.getTreadDesignImage().setHeight(230);
    },

    onListRefresh: function(dataview, options) {

        if(this.getMainRight().getActiveItem()._itemId !== 'ext-checkpointpanel5-1'){

            this.loadPanelData();
        }
    },

    onLoggedin: function() {
        var store = Ext.StoreMgr.get("TreadDesigns") || Ext.create('ShopFloor.store.TreadDesigns');
        if(store.getCount() === 0) {
            store.load();
        }

        store = Ext.StoreMgr.get("TreadWidths") || Ext.create('ShopFloor.store.TreadWidths');
        if(store.getCount() === 0) {
            store.load();
        }
    },

    onLoadPostCasingModels: function(casingRecord) {
        this.loadPanelData();
    },

    onSavedata: function() {
        if(this.getMainRight().getActiveItem()._itemId === 'ext-checkpointpanel5-1'){

            // get the active casing
            var casing = this.getApplication().getController('Casing').getActiveRecord();

            // save as finished good
            var finishedGoods = Ext.StoreMgr.get('FinishedGoods');
            finishedGoods.add({
                casing_id: casing.get('id'),
                fg_code: 'AA',
                stockstatus: '1'
            });

            finishedGoods.sync();

            // load the label for the active casing
            Bancha.getStub('Casing').getLabel(casing.get('barcode'), function(result, response) {

                // as soon as it is loaded, print it
                localActions.printLabel64(result.string);
            });
        }
    },

    loadPanelData: function() {
        var repairActuals = Ext.StoreManager.get('RepairActuals') || Ext.create('ShopFloor.store.RepairActuals');
        var repairTypes = Ext.StoreManager.get('RepairTypes') || Ext.create('ShopFloor.store.RepairTypes');
        var materialStore = Ext.StoreManager.get('Materials') || Ext.create('ShopFloor.store.Materials');

        if(repairActuals.getCount() === 0){
            repairActuals.load();
        }

        if(repairTypes.getCount() === 0){
            repairTypes.load();
        }

        if(materialStore.getCount() === 0) {
            materialStore.load();
        }

        repairActuals.each(function(r){

            var materialKey = materialStore.find('id', r.get('material_id'));

            var key = repairTypes.find('id', materialStore.getAt(materialKey).get('repair_type_id'));

            var obj = repairTypes.getAt(key);

            r.set('material_name', materialStore.getAt(materialKey).get('name'));
            r.set('repair_type_name',obj.get('name'));
        });
    },

    init: function(application) {
        application.on([
            { event: 'loggedin', fn: this.onLoggedin, scope: this },
            { event: 'loadpostcasingmodels', fn: this.onLoadPostCasingModels, scope: this },
            { event: 'savedata', fn: this.onSavedata, scope: this }
        ]);
    }

});