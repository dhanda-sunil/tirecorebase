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
        control: {
            "#initial_inspecion_right_column": {
                show: 'onPanelLoaded'
            },
            "inspectiongrid": {
                painted: 'inspectionGridPainted'
            }
        }
    },
    
    inspectionGridPainted: function(grid, eOpts) {
        Bancha.log.info('inspectionGridPainted');
    },

    onPanelLoaded: function(component, options) {
        var casingStore = Ext.StoreManager.get('Casing')  || Ext.create('ShopFloor.store.Casing');

        if(casingStore.getCount() === 0){
            casingStore.load();
        }

        if(casingStore.getAt(0) !== false && casingStore.getAt(0) !== undefined){
            this.drawRepairEstimatesTable(casingStore.getAt(0));
            this.getMaxRepairs(casingStore.getAt(0));
        }
    },

    onValidateData: function(panel, errorsCollection) {

        var sumFields = Ext.ComponentQuery.query('#initial_inspection_repair_sum_field'),
        allowedFields = Ext.ComponentQuery.query('#initial_inspecial_allowed_repairs'),
        allowed = allowedFields.length ? parseInt(allowedFields[0].getValue(),10) : 0;

        if(sumFields.length && parseInt(sumFields[0].getValue(),10)>allowed) {
            errorsCollection.valid = false;
            errorsCollection.errors['Repair Estimates'] = {
                each: function(fn) {
                    fn({
                        _field: '',
                        _message: Bancha.t('The estimates repairs are more then allowed repairs')
                    });
                }
            }; //yes, very hacky, but there is no public api for errors :-/
        }
    },

    onCasingLoadedDrawRepairEstimates: function(casingRecord) {
        //this.drawRepairEstimatesTable(casingRecord);
        //this.getMaxRepairs(casingRecord);
    },

    onRepairEstimateSaveData: function(panel, counter) {
        // search for all components which represent this data
        var components = panel.query('[storeTpl=RepairType]');

        if(!components.length) {
            return;
        }

        var tpl = components[0];
        var container = tpl.getParent();

        var estimates = Ext.StoreMgr.get('RepairEstimates');

        // setup a data saving function for all records
        // data is always valid, so don't worry about that
        // collect for each row
        Ext.each(container.getItems().items, function(item) {
            if(Ext.isDefined(item.config.recordId)) {
                var rec = estimates.getById(item.config.recordId);
                if(rec) {
                    rec.set('existing', item.getItems().items[1].getValue());
                    rec.set('new',      item.getItems().items[2].getValue());
                }
            }
        });

        if(!estimates.getNewRecords().length && !estimates.getUpdatedRecords().length) {
            return;
        }

        // save data to the server
        counter.inc();

        estimates.sync();
        estimates.on('write', function() {
            counter.dec();
        }, this, {
            single: true
        });

    },

    drawRepairEstimatesTable: function(casingRecord) {
        var me = this;

        var onLoaded = function() {

            // search for all components which represent this data
            var components = Ext.ComponentQuery.query('[storeTpl=RepairType]');

            if(!components.length) {
                return;
            }

            var tpl = components[0];
            var container = tpl.getParent();

            // trigger rendering only once
            var elements = [];

            var estimates = Ext.StoreMgr.get('RepairEstimates') || Ext.create('RepairEstimates');
            if(estimates.getCount() === 0){
                estimates.load();
            }
            estimates.filter('casing_id', casingRecord.get('id'));

            // maybe this is a re-rendering
            container.getItems().each(function(item) {
                if(item && item.config && Ext.isDefined(item.config.recordId)) {
                    container.remove(item);
                }
            });

            // draw new rows
            Ext.StoreMgr.get('RepairTypes').each(function(record) {

                var i = record.get('id');
                var estimate = estimates.find('repair_type_id',i);

                if(estimate !== -1) {
                    estimate = estimates.getAt(estimate);
                } else {
                    estimate = Ext.create('Bancha.model.RepairEstimate', {
                        'repair_type_id': i,
                        'casing_id': casingRecord.get('id')
                    });
                    estimates.add(estimate);
                }

                elements.push({
                    xtype: 'panel',
                    recordId: estimate.get('id'),
                    layout: {
                        type: 'hbox'
                    },
                    items: [{
                        xtype: 'component',
                        style:'border-right:1px solid #DDD; border-bottom:1px solid #DDD; padding: 10px 0 0 10px;',
                        html: record.get('name'),
                        width:'50%',
                        ui: 'light'

                    },
                    {
                        xtype: 'spinnerfield',
                        maxValue: 20,
                        minValue: 0,
                        increment: 1,
                        style:'border-right:1px solid #DDD; border-bottom:1px solid #DDD;',
                        width:'25%',
                        value: estimate.get('existing')
                        // width:180
                    },
                    {
                        xtype: 'spinnerfield',
                        maxValue: 20,
                        minValue: 0,
                        increment: 1,
                        style:'border-bottom:1px solid #DDD;',
                        width:'25%',
                        //   width:180
                        value: estimate.get('new')
                    }]
                });
            });
            container.setHtml('');
            container.add(elements);
            estimates.clearFilter();


            // set up the change listener
            var fields = container.query('spinnerfield'),
                sum = 0,
                sumField = Ext.ComponentQuery.query('#initial_inspection_repair_sum_field')[0],
                onchange = function(cmp,newValue, oldValue, eOpts) {
                    sum = sum - parseInt(oldValue,10) + parseInt(newValue,10);
                    sumField.setValue(sum);
                };
            
            Ext.each(fields, function(field) {
                sum += field.getValue();
                field.on('change', onchange);
            });
            sumField.setValue(sum);
        };

        var deferOnce = (function() {
            var counter = 2;

            return function() {
                counter--;
                if(!counter) {
                    onLoaded();
                }
            };
        }());


        // later this should load data with a correct filter, right now we just load all data
        if(Ext.StoreMgr.get('RepairTypes').getCount() === 0) {
            Ext.StoreMgr.get('RepairTypes').load(deferOnce);
        } else {
            deferOnce();
        }
        if(Ext.StoreMgr.get('RepairEstimates').getCount() === 0) {
            Ext.StoreMgr.get('RepairEstimates').load(deferOnce);
        } else {
            deferOnce();
        }
    },

    getMaxRepairs: function(casingRecord) {
        // setup allowednumber of repair fields (not editable)
        var field = Ext.ComponentQuery.query('#initial_inspecial_allowed_repairs');

        if(!field.length) {
            return;
        }

        Bancha.getStub('Preference').getCustomerPref(casingRecord.get('customer_id'), 'repairs.maxAllowed', function(result, response) {
            var value = Bancha.t('Value not available');

            if(result.success) {
                value = result.data[0].value;
            }
            field[0].setValue(value);
        });
    },

    init: function(application) {

        application.on([
        { event: 'validatedata', fn: this.onValidateData, scope: this },
        { event: 'casingloaded', fn: this.onCasingLoadedDrawRepairEstimates, scope: this },
        { event: 'savedata', fn: this.onRepairEstimateSaveData, scope: this }
        ]);
    }
});