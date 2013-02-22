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

Ext.define('WorkOrder.controller.WorkOrderItems', {
    extend: 'Ext.app.Controller',

    mixins: {
        convenience: 'WorkOrder.controller.mixin.Convenience'
    },

    config: {
        refs: {
            coCasingItemsGrid: 'workorderitems #cocasingitemsgrid',
            coServiceItemsGrid: 'workorderitems #coserviceitemsgrid'
        },

        control: {
            "workorderitems #cocasingitemsgrid": {
                itemsingletap: 'onCoCasingItemsGridItemTap'
            },
            "workorderitems #cocasingitemspanel button": {
                tap: 'onCoCasingItemCreateTap'
            },
            "workorderitems #coserviceitemspanel button": {
                tap: 'onCoServiceItemCreateTap'
            },
            "workorderitems #coserviceitemsgrid": {
                itemsingletap: 'onCoServiceItemsGridItemTap'
            },
            'button[action=saveAdditionalColumns]': {
                tap: 'saveAdditionalColumns'
            }
        }
    },

    onCoCasingItemCreateTap: function(button, e, options) {
        var grid = this.getCoCasingItemsGrid(),
            store = grid.getStore();

        // add the new entry
        var record = store.add({
            line_number: this.nextLineNumber(),
            barcode: this.nextBarcode()
        })[0];

        // start editing of the entry
        grid.openFieldEditor(record, 'barcode');
    },

    onCoServiceItemCreateTap: function(button, e, options) {
        var grid = this.getCoServiceItemsGrid(),
            record = grid.getStore().add({})[0];

        // start editing of the entry
        grid.openFieldEditor(record, 'co_item_type_id');
    },

    onCoCasingItemsGridItemTap: function(dataview, index, target, record, e, options) {
        var button = Ext.get(e.getTarget('div.x-button'));
        this.activeRowIndex = index;
        this.activeDataView = dataview;
        if(button === null) {
            return; // this click wasn't a button
        }

        //make button action
        if(button.hasCls('duplicate')) {
            this.duplicateCoCasingItem(record);
        } else if(button.hasCls('destroy')) {
            this.getCoCasingItemsGrid().getStore().remove(record);
        } else if(button.hasCls('more')) {
            this.showMoreCoCasingColumns(record);
        } else {
            Ext.Msg.alert(
                Bancha.t('Error'),
                Bancha.t('Could not recognize the clicked button'));
        }
    },

    onCoServiceItemsGridItemTap: function(dataview, index, target, record, e, options) {
        var button = Ext.get(e.getTarget('div.x-button'));

        if(button === null) {
            return; // this click wasn't a button
        }

        //make button action
        if(button.hasCls('destroy')) {
            this.getCoServiceItemsGrid().getStore().remove(record);
        } else {
            Ext.Msg.alert(
                Bancha.t('Error'),
                Bancha.t('Could not recognize the clicked button'));
        }
    },

    /**
    * Load the current customer order data
    */
    onCustomerOrderLoaded: function(coRecord) {
        var casingGrid = this.getCoCasingItemsGrid(),
            store;

        // each time create a new store to avoid deletion of old records
        // Background: If you load new records the old ones are marked as
        //             removed and will be destroyed on next store.sync()


        store = Ext.create('WorkOrder.store.CoCasingItems');
        store.filter('co_id', coRecord.get('id'));
        casingGrid.setStore(store);
        store.load();


        var serviceGrid = this.getCoServiceItemsGrid();

        store = Ext.create('WorkOrder.store.CoServiceItems');
        store.filter('co_id', coRecord.get('id'));
        serviceGrid.setStore(store);
        store.load();

        // now also load the co item types and tread designs for the grid select editor
        var counter = 4,
        reloadDefered = function() {
            counter--;
            if(counter === 0) {
                casingGrid.refresh();
            }
        };

        this.loadStoreData('CoItemCasingTypes', reloadDefered);
        this.loadStoreData('TreadDesigns', reloadDefered);
        this.loadStoreData('Manufacturers', reloadDefered);
        this.loadStoreData('TireSizes', reloadDefered);


        // now also load the co item types for the grid select editor
        this.loadStoreData('CoItemServiceTypes', function() {
            serviceGrid.refresh();
        });
    },

    nextLineNumber: function() {
        // In the Workorder stage, the line numbers will always be numeric

        var store = this.getCoCasingItemsGrid().getStore(),
        max = 0;
        store.each(function(item) {
            var line_number = parseInt(item.get('line_number'),10);
            max = Math.max(max, line_number ? line_number : 0);
        });
        return max + 1;

    },

    nextBarcode: function() {
        // In the Workorder stage, the line numbers will always be numeric

        var store = this.getCoCasingItemsGrid().getStore(),
        max = 0;
        store.each(function(item) {
            var barcode = parseInt(item.get('barcode'),10);
            max = Math.max(max, barcode ? barcode : 0);
        });
        return max === 0 ? "" : max + 1;

    },

    duplicateCoCasingItem: function(record) {

        // clone the data
        var data = Ext.apply({}, {
            line_number: this.nextLineNumber(),
            barcode : this.nextBarcode()
        }, record.data);
        delete data.id;

        // add the new data as record to the store
        var grid = this.getCoCasingItemsGrid(),
            newRec = grid.getStore().add(data)[0];

        // start editing of the entry
        grid.openFieldEditor(newRec, 'dot_code');
    },
    
    showMoreCoCasingColumns: function(record) {
        this.activeCasingId = record.data.id;
        if (!this.moreDataWin) {
            this.moreDataWin = Ext.Viewport.add({
                xtype:'formpanel',
                modal:true,
                hideOnMaskTap:false,
                showAnimation: {
                    type:'popIn',
                    duration:300,
                    easing:'ease-out'
                },
                hideAnimation: {
                    type:'popOut',
                    duration:300,
                    easing:'ease-out'
                },
                centered:true,
                scrollable:false,
                width:500,
                height:295,
                items:[{
                    docked:'top',
                    xtype:'toolbar',
                    title: Bancha.t('More Information')
                },{
                    docked:'bottom',
                    xtype:'toolbar',
                    items:[{
                        xtype: 'spacer'
                    },{
                        xtype:'button',
                        text: Bancha.t('Done'),
                        action:'saveAdditionalColumns'
                    }]
                },{
                    xtype:'fieldset',
                    items:[{
                        xtype:'numberfield',
                        name:'remaining_tread',
                        label: Bancha.t('Remaining Tread'),
                        labelWidth:'50%',
                        value:record.data.remaining_tread
                    },{
                        xtype:'textfield',
                        name:'vehicle_number',
                        label: Bancha.t('Vehicle Number'),
                        labelWidth:'50%',
                        value:record.data.vehicle_number
                    },{
                        xtype:'textfield',
                        name:'brand_number',
                        label: Bancha.t('Brand Number'),
                        labelWidth:'50%',
                        value:record.data.brand_number
                    },{
                        xtype:'numberfield',
                        name:'number_of_times_capped',
                        label: Bancha.t('Number of Times Capped'),
                        labelWidth:'50%',
                        value:record.data.number_of_times_capped
                    }]
                }]
            });
        } else {
            this.moreDataWin.down('field[name=remaining_tread]').setValue(record.data.remaining_tread);
            this.moreDataWin.down('field[name=vehicle_number]').setValue(record.data.vehicle_number);
            this.moreDataWin.down('field[name=brand_number]').setValue(record.data.brand_number);
            this.moreDataWin.down('field[name=number_of_times_capped]').setValue(record.data.number_of_times_capped);
            this.moreDataWin.show();
        }
    },
    
    saveAdditionalColumns: function(button, e, eOpts) {
        //get the store and record direct from the store
        var CoCasingItemsStore = Ext.StoreMgr.get('CoCasingItems');
        var record = CoCasingItemsStore.getById(this.activeCasingId);
        
        //get additional field values
        var remaining_tread = button.up('formpanel').down('field[name=remaining_tread]'),
        vehicle_number = button.up('formpanel').down('field[name=vehicle_number]'),
        brand_number = button.up('formpanel').down('field[name=brand_number]'),
        number_of_times_capped = button.up('formpanel').down('field[name=number_of_times_capped]');
        
        //set the new record values
        record.set('remaining_tread',remaining_tread.getValue());
        record.set('vehicle_number',vehicle_number.getValue());
        record.set('brand_number',brand_number.getValue());
        record.set('number_of_times_capped',number_of_times_capped.getValue());
        
        //mark this record dirty
        record.setDirty();
        
        //hide the modal window
        button.up('formpanel').hide();
    },
    
    onDotFieldChange: function(textfield, newData, eOpts) {
        var me=this;
        
        //get the grid
        var grid = Ext.getCmp('cocasingitemsgrid');
        
        //mask the grid
        grid.setMasked(true);
        
        //Grab initial values
        var value = '', 
            newValue = textfield.getValue(), 
            oldValue = textfield.originalValue;

        // convert to upper case
        newValue = (newValue+'').toUpperCase();
        
        // get the record before the textfield gets destroyed
        var rec = textfield.getRecord();

        // load the other data from the server to set all those values
        Bancha.getStub('CoItem').getDisplayDataFromDot(newValue, function(result) {    
            if(result.success) {
                rec.set('dot_code', result.data.dot_code);
                rec.set('tire_size_name', result.data.tire_size_name);
                rec.set('tire_size_id', result.data.tire_size_id);
                rec.set('manufacturer_name', result.data.manufacturer_name);
                rec.set('manufacturer_id', result.data.manufacturer_id);
                rec.set('manufacturer_product_line_id', result.data.manufacturer_product_line_id);

                //if we have a tire_size_id then let's look up the customer's pref
                if (result.data.tire_size_id) {
                    var customerId = me.getApplication().getController('AccountSelection').customerId;
                    Bancha.getStub('Preference').getPreferredTreadDesign(customerId, result.data.tire_size_id, function(result) {
                        if (result && result.success !== false) {
                            rec.set('tread_design_id', result);
                        } else {
                            Ext.Error.raise((result ? result.message : false) || Bancha.t('Error when loading Preferences'));
                        }
                    });
                }
            } else {
                // reset all, something went wrong
                rec.set('dot_code', '');
                rec.set('tire_size_name', '');
                rec.set('tire_size_id', '');
                rec.set('manufacturer_name', '');
                rec.set('manufacturer_id', '');
                rec.set('manufacturer_product_line_id', '');
            }
            
            // unmask the grid
            grid.setMasked(false);
        });
    },
    
    onTireSizeFocus: function(textfield, record, e, eOpts) {
        this.tireSizeField = textfield;
        this.tireSizeRecord = record;
        //call the blur method to prevent focus
        textfield.blur();
        //create our search window and show it
        if (!this.tireSizeSearchWin) {
            this.tireSizeSearchWin = Ext.Viewport.add({
                xtype:'panel',
                modal:true,
                hideOnMaskTap:true,
                showAnimation: {
                    type:'popIn',
                    duration:300,
                    easing:'ease-out'
                },
                hideAnimation: {
                    type:'popOut',
                    duration:300,
                    easing:'ease-out'
                },
                centered:true,
                scrollable:false,
                width:600,
                height:400,
                layout: 'fit',
                items:[{
                    xtype: 'list',
                    ui: 'round',
                    pinHeaders: false,
                    itemTpl: '<div><strong>{name}</strong></div>',
                    store: this.getTireSizeStore(),
                    grouped: false,
                    emptyText: '<div style="margin-top: 20px; text-align: center">'+Bancha.t('No Matching Items')+'</div>',
                    listeners: {
                        scope: this,
                        select: this.tireSizeItemSelect
                    },
                    items: [{
                        xtype: 'toolbar',
                        docked: 'top',
                        items: [{
                            xtype: 'spacer'
                        },{
                            xtype: 'searchfield',
                            placeHolder: Bancha.t('Search...'),
                            listeners: {
                                scope: this,
                                clearicontap: this.tireSizeClearIconTap,
                                keyup: this.tireSizeKeyUp,
                                painted: function(searchfield, eOpts) {
                                    searchfield.focus();
                                }
                            }
                        },{
                            xtype: 'spacer'
                        }]
                    }]
                }]
            });
        } else {
            this.tireSizeSearchWin.show();
        }
    },
    getTireSizeStore: function() {
        //check if a store has already been set
        if (!this.tireSizeStore) {
            this.tireSizeStore = Ext.StoreMgr.get('TireSizes');
        }
        //return the store instance
        return this.tireSizeStore;
    },
    tireSizeItemSelect: function(list, record, eOpts) {
        var panel = list.up('panel');
        this.tireSizeRecord.set('tire_size_name', record.data.name);
        this.tireSizeRecord.set('tire_size_id', record.data.id);
        panel.down('searchfield').setValue('');
        panel.hide();
    },
    tireSizeKeyUp: function(field) {
        //get the store and the value of the field
        var value = field.getValue(),
            store = this.getTireSizeStore();
        //first clear any current filters on thes tore
        store.clearFilter();

        //check if a value is set first, if it isnt we dont have to do anything
        if (value) {
            //the user could have entered spaces, so we must split them so we can loop through them all
            var searches = value.split(' '),
                regexps = [],
                i;

            //loop them all
            for (i = 0; i < searches.length; i++) {
                //if it is nothing, continue
                if (!searches[i]) { continue; }

                //if found, create a new regular expression which is case insenstive
                regexps.push(new RegExp(searches[i], 'i'));
            }

            //now filter the store by passing a method
            //the passed method will be called for each record in the store
            store.filter(function(record) {
                var matched = [];

                //loop through each of the regular expressions
                for (i = 0; i < regexps.length; i++) {
                    var search = regexps[i],
                        didMatch = record.get('name').match(search);

                    //if it matched the first or last name, push it into the matches array
                    matched.push(didMatch);
                }

                //if nothing was found, return false (dont so in the store)
                if (regexps.length > 1 && matched.indexOf(false) !== -1) {
                    return false;
                } else {
                    //else true true (show in the store)
                    return matched[0];
                }
            });
        }
    },
    tireSizeClearIconTap: function() {
        //call the clearFilter method on the store instance
        this.getTireSizeStore().clearFilter();
    },

    onManufacturersFocus: function(textfield, record, e, eOpts) {
        this.manufacturersField = textfield;
        this.manufacturersRecord = record;
        //call the blur method to prevent focus
        textfield.blur();
        //create our search window and show it
        if (!this.manufacturersSearchWin) {
            this.manufacturersSearchWin = Ext.Viewport.add({
                xtype:'panel',
                modal:true,
                hideOnMaskTap:true,
                showAnimation: {
                    type:'popIn',
                    duration:300,
                    easing:'ease-out'
                },
                hideAnimation: {
                    type:'popOut',
                    duration:300,
                    easing:'ease-out'
                },
                centered:true,
                scrollable:false,
                width:600,
                height:400,
                layout: 'fit',
                items:[{
                    xtype: 'list',
                    ui: 'round',
                    pinHeaders: false,
                    itemTpl: '<div><strong>{name}</strong></div>',
                    store: this.getManStore(),
                    grouped: false,
                    emptyText: '<div style="margin-top: 20px; text-align: center">'+Bancha.t('No Matching Items')+'</div>',
                    listeners: {
                        scope: this,
                        select: this.manItemSelect
                    },
                    items: [{
                        xtype: 'toolbar',
                        docked: 'top',
                        items: [{
                            xtype: 'spacer'
                        },{
                            xtype: 'searchfield',
                            placeHolder: Bancha.t('Search...'),
                            listeners: {
                                scope: this,
                                clearicontap: this.manufacturersClearIconTap,
                                keyup: this.manfucaturersKeyUp,
                                painted: function(searchfield, eOpts) {
                                    searchfield.focus();
                                }
                            }
                        },{
                            xtype: 'spacer'
                        }]
                    }]
                }]
            });
        } else {
            this.manufacturersSearchWin.show();
        }
    },
    getManStore: function() {
        //check if a store has already been set
        if (!this.manStore) {
            this.manStore = Ext.StoreMgr.get('Manufacturers');
        }
        //return the store instance
        return this.manStore;
    },
    manItemSelect: function(list, record, eOpts) {
        var panel = list.up('panel');
        this.manufacturersRecord.set('manufacturer_name', record.data.name);
        this.manufacturersRecord.set('manufacturer_id', record.data.id);
        panel.down('searchfield').setValue('');
        panel.hide();
    },
    manfucaturersKeyUp: function(field) {
        //get the store and the value of the field
        var value = field.getValue(),
            store = this.getManStore();
        //first clear any current filters on thes tore
        store.clearFilter();

        //check if a value is set first, if it isnt we dont have to do anything
        if (value) {
            //the user could have entered spaces, so we must split them so we can loop through them all
            var searches = value.split(' '),
                regexps = [],
                i;

            //loop them all
            for (i = 0; i < searches.length; i++) {
                //if it is nothing, continue
                if (!searches[i]) { continue; }

                //if found, create a new regular expression which is case insenstive
                regexps.push(new RegExp(searches[i], 'i'));
            }

            //now filter the store by passing a method
            //the passed method will be called for each record in the store
            store.filter(function(record) {
                var matched = [];

                //loop through each of the regular expressions
                for (i = 0; i < regexps.length; i++) {
                    var search = regexps[i],
                        didMatch = record.get('name').match(search);

                    //if it matched the first or last name, push it into the matches array
                    matched.push(didMatch);
                }

                //if nothing was found, return false (dont so in the store)
                if (regexps.length > 1 && matched.indexOf(false) !== -1) {
                    return false;
                } else {
                    //else true true (show in the store)
                    return matched[0];
                }
            });
        }
    },
    manufacturersClearIconTap: function() {
        //call the clearFilter method on the store instance
        this.getManStore().clearFilter();
    },
    
    onTreadDesignFocus: function(textfield, record, e, eOpts) {
        this.treadDesignField = textfield;
        this.treadDesignRecord = record;
        //call the blur method to prevent focus
        textfield.blur();
        //create our search window and show it
        if (!this.treadDesignSearchWin) {
            this.treadDesignSearchWin = Ext.Viewport.add({
                xtype:'panel',
                modal:true,
                hideOnMaskTap:true,
                showAnimation: {
                    type:'popIn',
                    duration:300,
                    easing:'ease-out'
                },
                hideAnimation: {
                    type:'popOut',
                    duration:300,
                    easing:'ease-out'
                },
                centered:true,
                scrollable:false,
                width:600,
                height:400,
                layout: 'fit',
                items:[{
                    xtype: 'list',
                    ui: 'round',
                    pinHeaders: false,
                    itemTpl: '<div><strong>{name}</strong></div>',
                    store: this.getTreadDesignStore(),
                    grouped: false,
                    emptyText: '<div style="margin-top: 20px; text-align: center">'+Bancha.t('No Matching Items')+'</div>',
                    listeners: {
                        scope: this,
                        select: this.treadDesignItemSelect
                    },
                    items: [{
                        xtype: 'toolbar',
                        docked: 'top',
                        items: [{
                            xtype: 'spacer'
                        },{
                            xtype: 'searchfield',
                            placeHolder: Bancha.t('Search...'),
                            listeners: {
                                scope: this,
                                clearicontap: this.treadDesignClearIconTap,
                                keyup: this.treadDesignKeyUp,
                                painted: function(searchfield, eOpts) {
                                    searchfield.focus();
                                }
                            }
                        },{
                            xtype: 'spacer'
                        }]
                    }]
                }]
            });
        } else {
            this.treadDesignSearchWin.show();
        }
    },
    getTreadDesignStore: function() {
        //check if a store has already been set
        if (!this.treadDesignStore) {
            this.treadDesignStore = Ext.StoreMgr.get('TreadDesigns');
        }
        //return the store instance
        return this.treadDesignStore;
    },
    treadDesignItemSelect: function(list, record, eOpts) {
        var panel = list.up('panel');
        this.treadDesignRecord.set('tread_design_id', record.data.id);
        panel.down('searchfield').setValue('');
        panel.hide();
    },
    treadDesignKeyUp: function(field) {
        //get the store and the value of the field
        var value = field.getValue(),
            store = this.getTreadDesignStore();
        //first clear any current filters on thes tore
        store.clearFilter();

        //check if a value is set first, if it isnt we dont have to do anything
        if (value) {
            //the user could have entered spaces, so we must split them so we can loop through them all
            var searches = value.split(' '),
                regexps = [],
                i;

            //loop them all
            for (i = 0; i < searches.length; i++) {
                //if it is nothing, continue
                if (!searches[i]) { continue; }

                //if found, create a new regular expression which is case insenstive
                regexps.push(new RegExp(searches[i], 'i'));
            }

            //now filter the store by passing a method
            //the passed method will be called for each record in the store
            store.filter(function(record) {
                var matched = [];

                //loop through each of the regular expressions
                for (i = 0; i < regexps.length; i++) {
                    var search = regexps[i],
                        didMatch = record.get('name').match(search);

                    //if it matched the first or last name, push it into the matches array
                    matched.push(didMatch);
                }

                //if nothing was found, return false (dont so in the store)
                if (regexps.length > 1 && matched.indexOf(false) !== -1) {
                    return false;
                } else {
                    //else true true (show in the store)
                    return matched[0];
                }
            });
        }
    },
    treadDesignClearIconTap: function() {
        //call the clearFilter method on the store instance
        this.getTreadDesignStore().clearFilter();
    },

    init: function(application) {
        application.on([
            { event: 'coloaded', fn: this.onCustomerOrderLoaded, scope: this}]);
        Ext.Viewport.on([
            { event: 'tiresizefocus', fn: this.onTireSizeFocus, scope: this },
            { event: 'dotfieldchange', fn: this.onDotFieldChange, scope: this },
            { event: 'manufacturersfocus', fn: this.onManufacturersFocus, scope: this },
            { event: 'treaddesignfocus', fn: this.onTreadDesignFocus, scope: this}
        ]);
    }
});