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

Ext.define('WorkOrder.controller.CustomerAlert', {
    extend: 'Ext.app.Controller',

    mixins: {
        recordController: 'ShopFloor.controller.mixin.RecordController'
    },

    config: {
    },

    init: function(application) {
        var me = this;

        this.setupModel({
            modelName: 'Alert',
            load: {
                event: 'casingloaded',
                stubLoadFn: function(customerRecord, callback) {

                    // load the store
                    var store = Ext.create('Ext.data.Store', {
                        model: Bancha.getModel('Alert'),
                        autoLoad: true,
                        remoteFilter: false, // TODO this hsould use the (not yet implemented) Bancha remote sorting feature
                        filters: [{
                            property: 'is_active',
                            value: true
                        }, {
                            property: 'table_name',
                            value: 'customers'
                        }, {
                            property: 'row_id',
                            value: 1
                        }],
                        listeners: {
                            load: function() {

                                // don't call the callback, because this tries to create a record, instead directly fire rendering


                                var text = '\n';
                                store.each(function(rec) {
                                    text += rec.get('desc')+'\n';
                                });
                                var alertData = {
                                    present: store.getCount()>0,
                                    text: text
                                };
                                var modelName = 'CustomerAlert';

                                // search for all components which use this data along with other data
                                var components = Ext.Viewport.query('[models]');

                                // since Sencha Architect doesn't allow custom configurations of type object,
                                // we have to transform the string to an object and then filter
                                Ext.each(components, function(component) {
                                    if(Ext.isString(component.config.models)) {
                                        component.config.models = component.config.models.split(',');
                                    }
                                    if(component.config.models.indexOf(modelName)!==-1) {

                                        // get the current data
                                        var data = component.getData();

                                        // to prevent XTemplate errors
                                        if(!data) {
                                            data = {};
                                            Ext.each(component.config.models, function(templateModelName) {
                                                data[templateModelName] = {};
                                            });
                                        }
                                        // add the data to current data set
                                        data[modelName] = alertData;
                                        component.setData(data);
                                    }
                                });
                            }
                        } //eo listener
                    });
                } //eo loadStubFn
            },
            renderable: true,
            saveable: false
        });
    }

});