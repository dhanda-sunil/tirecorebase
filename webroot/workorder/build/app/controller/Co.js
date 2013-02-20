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

Ext.define('WorkOrder.controller.Co', {
    extend: 'Ext.app.Controller',

    mixins: {
        recordController: 'WorkOrder.controller.mixin.RecordController'
    },

    config: {
    },

    onNewCoSelected: function() {
        var config =  {
            modelName: 'Co'
        };

        // if there is an old one, revert all changes
        if(this.active_record) {
            this.active_record.reject();
        }

        // create a new record to use
        var rec = Ext.create('Bancha.model.Co', {});
        //var r = Ext.StoreMgr.get('Co').find('id','');

        rec.set('ref', '<new>');
        rec.set('created', new Date());
        rec.set('pickup_date', new Date());
        rec.set('user_id', this.user_record.get('id'));

        // tell application
        this.onRecordLoadedSuccessfull(config, rec);

        // tell the application that we don't have a Account yet
        this.getApplication().fireEvent('accountloaded',0);
    },

    onCoSelected: function(loadRecId) {
        var me = this;

        var config =  {
            modelName: 'Co'
        };

        // if there is an old one, revert all changes
        if(this.active_record) {
            this.active_record.reject();
        }

        // load the recordcontroller mixin to load the data
        Bancha.getModel('Co').load(loadRecId, {
            scope: this,
            success: function(record, operation) {
                this.onRecordLoadedSuccessfull(config, record);

                record.set('user_id', me.user_record.get('id'));

                if(config.success) {
                    config.success.call(this, record);
                }
            },
            failue: function(record, operation) {
                this.onRecordLoadingFailed(config, operation);
            }
        });
    },

    init: function(application) {

        this.setupModel({
            modelName: 'Co',
            load: {
                event: 'corecordselected', // see onCoSelected and onNewCoSelected
                loaded: true
            },
            renderable: true,
            saveable: true
        });

        application.on([
            { event: 'newcoselected', fn: this.onNewCoSelected, scope: this },
            { event: 'coselected', fn: this.onCoSelected, scope: this },
            { event: 'customerselected', fn: this.onCustomerSelected, scope: this },
            { event: 'accountloaded', fn: this.onAccountLoaded, scope: this },
            { event: 'userloaded', fn: this.onUserLoaded, scope: this }
        ]);
    },

    onCustomerSelected: function(id) {
        // a new customer got selected
        if(this.active_record) { //it's posssible that the customer is selcted before the model is ready, but this only happens if the customer_id is already set corectelly
            this.active_record.set('customer_id',id);
        }
    },

    onAccountLoaded: function(record) {
        // a new account got selected
        if(this.active_record) { //it's posssible that the customer is selcted before the model is ready, but this only happens if the account_id is already set corectelly
            this.active_record.set('account_id', record ? record.get('id') : 0);
        }
    },

    onUserLoaded: function(record) {
        this.user_record = record; // keep the record to set the user id on cos
    }

});