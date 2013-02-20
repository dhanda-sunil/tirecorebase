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

Ext.define('ShopFloor.controller.RepairCheckpoint', {
    extend: 'Ext.app.Controller',

    config: {
        refs: {
            appliedRepairs: '#appliedRepairs',
            materialList: '#materiallist',
            mainRight: '#mainrightpanel'
        },

        control: {
            "#RepairList": {
                refresh: 'onListRefresh'
            },
            "checkpointpanel3 list[role=category]": {
                select: 'onRepairSelected'
            },
            "checkpointpanel3 list[id=materiallist]": {
                itemsingletap: 'onMaterialSingletap',
                itemdoubletap: 'onMatierialDoubletap'
            },
            "checkpointpanel3 #appliedRepairs": {
                itemsingletap: 'onAppliedRepairsButtonClick',
                itemdoubletap: 'onAppliedRepairsDoubletap'
            }
        }
    },

    onListRefresh: function(dataview, options) {
        this.onRepairCheckpointLoad();
    },

    onRepairSelected: function(dataview, record, options) {
        var store = this.getMaterialList().getStore();

        if(store.getCount() === 0) {
            store.load();
        }

        store.filter('repair_type_id', record.get('id'));

        var materialStore = Ext.StoreManager.get('Materials') || Ext.create('ShopFloor.store.Materials');
        if(materialStore.getCount() === 0) {
            materialStore.load();
        }
    },

    onMaterialSingletap: function(dataview, index, target, record, e, options) {
        var store = this.getAppliedRepairs().getStore();
        this.incrementAppliedRepair(store, record);
    },

    onMatierialDoubletap: function(dataview, index, target, record, e, options) {
        var store = this.getAppliedRepairs().getStore();
        this.incrementAppliedRepair(store, record);
    },

    onAppliedRepairsButtonClick: function(dataview, index, target, record, e, options) {
        var button = Ext.get(e.getTarget('div.x-button'));

        if(button === null) {
            return; // this click wasn't a button
        }

        this.incrementAppliedRepairButtons(button, record);
    },

    onAppliedRepairsDoubletap: function(dataview, index, target, record, e, options) {
        var button = Ext.get(e.getTarget('div.x-button'));

        if(button === null) {
            return; // this click wasn't a button
        }

        this.incrementAppliedRepairButtons(button, record);
    },

    onValidatedata: function(panel, errorsCollection) {
        var store = Ext.StoreMgr.get('RepairsList');

        if(!store) {
            return; // in the current view there was never a repair list used
        }
        
        var total = store.find('name','Repairs Total'),
            totalRec = store.getAt(total),
            allowed = store.find('name','Repairs Allowed'),
            allowedRec = store.getAt(allowed);

       if(totalRec && totalRec.get('repairs') > totalRec.get('allowed')) {

           errorsCollection.valid = false;
           errorsCollection.errors['Repair Estimates'] = {
               each: function(fn) {
                   fn({
                       _field: '',
                       _message: Bancha.t('Allowed repairs exceeded')
                   });
               }
           }; //yes, very hacky, but there is no public api for errors :-/
       }
       if(allowedRec && allowedRec.get('repairs') > allowedRec.get('allowed')){
           errorsCollection.valid = false;
           errorsCollection.errors['Repair Estimates'] = {
               each: function(fn) {
                   fn({
                       _field: '',
                       _message: Bancha.t('Total repairs exceeded')
                   });
               }
           }; //yes, very hacky, but there is no public api for errors :-/
       }

       // this is a hack because for now we want to save regardless of errors
       Ext.StoreMgr.get('RepairActuals').sync();
    },

    incrementAppliedRepairButtons: function(button, record) {
        var repairTypeInt = 0;
        Bancha.log([record,'record log']);

        var materialKey = Ext.StoreMgr.get('Materials').find('id', record.get('material_id'));
        var materialRecord = Ext.StoreMgr.get('Materials').getAt(materialKey);

        if(button.hasCls('increase-repair-quantity')){
            record.set('quantity', record.get('quantity')+1);
            repairTypeInt = 1;
        }
        else if(button.hasCls('decrease-repair-quantity')){

            if(record.data.quantity*1 > 0){
                record.set('quantity', record.get('quantity')-1);
            }
            repairTypeInt = -1;
        }

        Bancha.log([record.get('quantity'),'qty']);

        if(record.get('quantity') === 0){
            Ext.StoreMgr.get('RepairActuals').remove(record);
            record.destroy();
        }

        this.incrementRepair(record, repairTypeInt, materialRecord.get('repair_type_id'));
    },

    incrementAppliedRepair: function(appliedRepairStore, materialRecord) {
        var id = appliedRepairStore.find('material_id',materialRecord.get('id'));

        // Existing Material++, Repair++
        if(id >= 0){
            var r = appliedRepairStore.getAt(id);
            if(r){
                r.set('quantity', r.get('quantity')+1);
                this.incrementRepair(r, 1, materialRecord.get('repair_type_id'));
            }
            materialRecord.set();
        }
        // Add New Material, Repair++
        else{
            var newRecord = appliedRepairStore.add({
                material_id: materialRecord.get('id'),
                name: materialRecord.get('name'),
                repair_type_id: materialRecord.get('repair_type_id'),
                quantity: 1,
                casing_id: 1
            });

            this.incrementRepair(newRecord, 1, materialRecord.get('repair_type_id'));
            materialRecord.set();
        }
    },

    incrementRepair: function(repairRecord, repairTypeInt, repair_type_id) {
        var repairListStore = Ext.StoreMgr.get("RepairsList") || Ext.create('ShopFloor.store.RepairsList');

        if(repairListStore.getCount() === 0) {
            repairListStore.load();
        }

        var key = repairListStore.find('id',repair_type_id);
        var key2 = repairListStore.find('id',-1);
        var key3 = repairListStore.find('id',-2);

        var total,
            life;
        if(key >= 0){
            var record = repairListStore.getAt(key);
            if( record.get('repairs') >= 0 ){

                var newvalue = (record.get('repairs')*1)+repairTypeInt;
                record.set('repairs', newvalue);

                total = repairListStore.getAt(key2);
                if(total){
                    total.set('repairs', (total.get('repairs')*1)+repairTypeInt);
                }

                life = repairListStore.getAt(key3);
                if(life){
                    life.set('repairs', (life.get('repairs')*1)+repairTypeInt);
                }
            }
            else{
                record.set('repairs',1);

                total = repairListStore.getAt(key2);
                if(total){
                    total.set('repairs', 1);
                }

                life = repairListStore.getAt(key3);
                if(life){
                    life.set('repairs', 1);
                }
            }
        }
    },

    onRepairCheckpointLoad: function() {
        var casingStore = Ext.StoreManager.get('Casing')  || Ext.create('ShopFloor.store.Casing');

        if(casingStore.getCount() === 0){
            casingStore.load();
        }

        var casingRecord = casingStore.getAt(0);

        var repairActuals = Ext.StoreManager.get('RepairActuals')  || Ext.create('ShopFloor.store.RepairActuals');

        if(casingRecord === false || casingRecord === undefined){
            return false;
        }

        var materialStore = Ext.StoreManager.get('Materials') || Ext.create('ShopFloor.store.Materials');

        if(materialStore.getCount() === 0) {
            materialStore.load();
        }

        var repairListStore = Ext.StoreMgr.get('RepairsList') || Ext.create('ShopFloor.store.RepairsList');

        if(repairListStore.getCount() === 0) {
            repairListStore.load();
        }

        var me = this;

        repairActuals.load(function(){

            this.filter('casing_id', casingRecord.get('id'));

            this.each(function(r){

                var materialKey = materialStore.find('id', r.get('material_id'));
                var materialRecord = materialStore.getAt(materialKey);

                var key = repairListStore.find('id',materialRecord.get('repair_type_id'));

                if(key >= 0 && repairListStore.getAt(key).get('repairs') <= 0){
                    me.incrementRepair(r,r.get('quantity'),materialRecord.get('repair_type_id'));
                }
            });
        });

//        Bancha.getStub('Preference').getCustomerRepairPrefs(casingRecord.get('customer_id'), function(result, response) {
//
//            //var repairListStore = Ext.StoreMgr.get('RepairTypes') || Ext.create('ShopFloor.store.RepairTypes');
//            var repairListStore = Ext.StoreMgr.get('RepairsList') || Ext.create('ShopFloor.store.RepairsList');
//
//            if(repairListStore.getCount() === 0) {
//                repairListStore.load();
//            }
//
//            var repairs = 0;
//
//            if(repairListStore.getCount() === 0) {
//                repairListStore.load(function(){
//                    repairListStore.each(function(r){
//                        repairs+= parseInt(r.get('repairs'));
//                    })
//                });
//            }
//            else{
//                repairListStore.each(function(r){
//                    repairs+= parseInt(r.get('repairs'));
//                })
//            }
//
//            var len = result.data.length;
//            var key = 0;
//            var repair_type_id = 0;
//
//            for(var i= 0; i < len; i++){
//
//                repair_type_id = result.data[i].name.replace('repairs.session.','');
//                key = repairListStore.find('id',repair_type_id);
//
//                if(key >= 0){
//                    repairListStore.getAt(key).set('allowed',result.data[i].value);
//                }
//                else if(result.data[i].name === 'repairs.maxAllowed'){
//                    if(repairListStore.find('id',-1) < 0){
//                        repairListStore.add({
//                            id: -1,
//                            name: 'Repairs Allowed',
//                            allowed: result.data[i].value,
//                            repairs: repairs
//                        });
//                    }
//                }
//                else if(result.data[i].name === 'repairs.maxLife'){
//                    if(repairListStore.find('id',-2) < 0){
//                        repairListStore.add({
//                            id: -2,
//                            name: 'Repairs Total',
//                            allowed: result.data[i].value,
//                            repairs: repairs
//                        });
//                    }
//                }
//            }
//        });

        Bancha.getStub('RepairEstimate').getCasingRepairEstimates(casingRecord.get('id'), function(result, response) {

            //var repairListStore = Ext.StoreMgr.get('RepairTypes') || Ext.create('ShopFloor.store.RepairTypes');
            var repairListStore = Ext.StoreMgr.get('RepairsList') || Ext.create('ShopFloor.store.RepairsList');

            if(repairListStore.getCount() === 0) {
                repairListStore.load();
            }

            var len = result.data.length;
            var key = 0;

            for(var i= 0; i < len; i++){

                key = repairListStore.find('id',result.data[i].repair_type_id);
                if(key >= 0){
                    repairListStore.getAt(key).set('estimated',result.data[i]['new']);
                }
            }
        });
    },

    onCasingloaded: function(casingRecord) {

        var store = Ext.StoreManager.get('Casing');

        if(store.getCount() === 0){
            store.load();
        }

        store.add({
            id: casingRecord.get('id'),
            customer_id: casingRecord.get('customer_id')
        });
        this.onRepairCheckpointLoad();
    },

    onRepairCheckPointSaveData: function() {
        if(this.getMainRight().getActiveItem()._itemId === 'ext-checkpointpanel3-1'){
            Ext.StoreMgr.get('RepairActuals').sync();
        }
    },

    init: function(application) {

        application.on([
        { event: 'validatedata', fn: this.onValidatedata, scope: this },
        { event: 'casingloaded', fn: this.onCasingloaded, scope: this },
        { event: 'savedata', fn: this.onRepairCheckPointSaveData, scope: this }
        ]);
    }

});