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

Ext.define('ShopFloor.controller.Casing', {
    extend: 'Ext.app.Controller',

    mixins: {
        recordController: 'ShopFloor.controller.mixin.RecordController',
        viewController: 'ShopFloor.controller.mixin.ViewController'
    },

    config: {
    },

    init: function(application) {
        var me = this;
        this.setupModel({
            modelName: 'Casing',
            load: {
                event: 'casingselected',
                stubLoadFn: function(barcode, callback) {
                    // Send the current checkpint id as second parameter to the server for logging
                    Bancha.getStub('Casing').getByBarcode(barcode, me.active_checkpoint_id || null, callback);
                }
            },
            renderable: true,
            saveable: true
        });
        
        application.on([
            { event: 'checkpointselected', fn: this.onCheckpointSelected, scope: this }
        ]);
    },

    /**
    * Always keep the currently selected checkpoint id to send logging data to the server
    */
    onCheckpointSelected: function(checkpointId) {
        this.active_checkpoint_id = checkpointId;
    }

});