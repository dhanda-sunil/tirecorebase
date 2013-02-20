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

Ext.define('ShopFloor.controller.Manufacturer', {
    extend: 'Ext.app.Controller',

    mixins: {
        recordController: 'ShopFloor.controller.mixin.RecordController'
    },

    config: {
    },

    init: function(application) {

        this.setupModel({
            modelName: 'Manufacturer',
            load: {
                event: 'loadpostcasingmodels',
                stubLoadFn: function(casingRecord, callback) {
                    Bancha.getStub('Manufacturer').getByManufacturererPlantId(casingRecord.get('manufacturer_plant_id'), callback);
                }
            },
            renderable: true,
            saveable: true
        });
    }

});