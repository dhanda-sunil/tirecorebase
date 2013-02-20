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
/*global Ext:false, jQuery:false, Bancha:false, WorkOrder:true, localActions:false, window:false */

Ext.define('WorkOrder.controller.Customer', {
    extend: 'Ext.app.Controller',

    mixins: {
        recordController: 'WorkOrder.controller.mixin.RecordController',
        convenience: 'WorkOrder.controller.mixin.Convenience'
    },

    config: {
    },

    init: function(application) {

        this.setupModel({
            modelName: 'Customer',
            load: {
                event: 'customerselected'
            },
            renderable: true,
            saveable: true
        });
        application.on([
        { event: 'customerloaded', fn: this.onCustomerLoaded, scope: this }
        ]);
    },

    onCustomerLoaded: function(customerRecord) {

        // filter customer locations accordingly
        var locations = this.loadStoreData('CustomerLocations');

        locations.clearFilter();
        locations.filter('customer_id', customerRecord.get('id'));
        // always make sure there's an undefined record
        if(!locations.getById(0)) {
            locations.add({
                name: '',
                company_id: customerRecord.get('id')
            });
        }
    }

});