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

Ext.define('ShopFloor.controller.DotSerial', {
    extend: 'Ext.app.Controller',
    counter:4,
    mixins: {
        recordController: 'ShopFloor.controller.mixin.RecordController'
    },
    config: {
    },
    setCounter: function(value) {
        this.counter = value;
    },
    getCounter: function() {
        return this.counter;
    },
    init: function(application) {
        var me = this;

        // this record is only used for reading, but never for saving
        // use the modelField property for that
        Ext.define('Bancha.model.DotSerial', {
            extend: 'Ext.data.Model',
            config: {
                idProperty:'id',
                fields:[
                {
                    name:'id',
                    type:'int'
                },{
                    name:'name',
                    type:'string'
                },{
                    name:'manufacturer_plant_code',
                    type:'string'
                },{
                    name:'tire_size_code',
                    type:'string'
                },{
                    name:'manufacturer_product_line_code',
                    type:'string'
                },{
                    name:'production_week',
                    type:'int'
                }
                ]
            }
        });

        var data = {
            id: 1
        };

        this.setupModel({
            modelName: 'DotSerial',
            load: {
                event: 'loadpostcasingmodels',
                stubLoadFn: function(casingRecord, callback) {
                    data.production_week = casingRecord.get('production_week');

                    var counter = {
                        counter: me.getCounter(),
                        loadedRecord: function() {
                            counter.counter--;
                            if (counter.counter===1) {
                                Bancha.getStub('ManufacturerPlant').getSizeCode(data.manufacturer_plant_id, data.tire_size_id, function(result) {
                                    data.size_code = result.data.records;
                                    counter.loadedRecord();
                                });
                            } else if(counter.counter===0) {
                                // build name field
                                data.name = [
                                data.manufacturer_plant_code || '--',
                                data.size_code || '--',
                                data.manufacturer_product_line_code || '----',
                                data.production_week ? Ext.String.leftPad(data.production_week, 4, '0') : '----'
                                ].join('');
                                
                                // trigger loaded event
                                callback({
                                    success: true,
                                    data: data
                                });
                                
                                //trigger final loading event
                                me.getApplication().fireEvent('initialloadingcompleted');
                            }
                        }
                    };

                    me.getApplication().on('manufacturerplantloaded', function(manufacturerPlantRecord) {
                        data.manufacturer_plant_code = manufacturerPlantRecord.get('code');
                        data.manufacturer_plant_id = manufacturerPlantRecord.get('id');
                        counter.loadedRecord();
                    });

                    me.getApplication().on('tiresizeloaded', function(tireSizeRecord) {
                        data.tire_size_id = tireSizeRecord.get('id');
                        me.getApplication().getController('AppController').casingTireSizeId = data.tire_size_id;
                        counter.loadedRecord();
                    });

                    me.getApplication().on('manufacturerproductlineloaded', function(manufacturerProductLineRecord) {
                        data.manufacturer_product_line_code = manufacturerProductLineRecord ? manufacturerProductLineRecord.get('dot_code') : "";
                        counter.loadedRecord();
                    });
                }
            },
            renderable: true,
            saveable: false
        });
    }
});