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

Ext.define('WorkOrder.controller.Confirmation', {
    extend: 'Ext.app.Controller',

    mixins: {
        convenience: 'WorkOrder.controller.mixin.Convenience',
        viewController: 'WorkOrder.controller.mixin.ViewController',
        recordController: 'WorkOrder.controller.mixin.RecordController'
    },

    config: {
        refs: {
            panel: 'confirmation'
        },

        control: {
            "toolbar[role=footer] button[action=navigationsave]": {
                tap: 'onSave'
            }
        }
    },

    onSave: function(button, e, options) {
        // callback
        var me = this,
            counter = 2,
            defer = function() {
                counter--;
                //console.info('defer');
                if(counter===0) {
                    // todo fix this correctly
                }
            };

        me.getPanel().mask({
            xtype: 'loadmask',
            message: Bancha.t('Saving...')
        });

        // save the Co record
        this.saveData(Ext.Viewport, function() {
            // save the stores
            var co_id = me.savingData.Co.get('id'),
                customer_id = me.savingData.Customer.get('id'),
            store = Ext.StoreMgr.get('CoCasingItems');
            store.each(function(record) {
                record.set('customer_id', customer_id);
                if(record.dirty) {
                    record.set('co_id', co_id);
                    record.set('customer_id', customer_id);
                }
            });
            store.sync();
            store.on('write', defer);

            store = Ext.StoreMgr.get('CoServiceItems');
            store.each(function(record) {
                if(record.dirty) {
                    record.set('co_id', co_id);
                }
            });
            store.sync();
            store.on('write', defer);


            // all saving is done
            Ext.Msg.alert(Bancha.t('Success'), Bancha.t('Successfully saved customer order'));
            me.getPanel().setMasked(false);
            me.showNextScreen();
        });


        // not needed
        /*
        console.info('saving');
        if(this.savingData.Account.dirty) {
        if(!this.savingData.Account.isValid()) {
        Ext.Msg.alert(Bancha.t('Unknown Error'), Bancha.t('Something went wrong, please reload the page!'));
        return;
        }
        counter++;
        this.savingData.Account.save({callback: defer});
        console.info('save Account');
        }
        if(this.savingData.Co.dirty) {
        if(!this.savingData.Co.isValid()) {
        Ext.Msg.alert(Bancha.t('Unknown Error'), Bancha.t('Something went wrong, please reload the page!'));
        return;
        }
        counter++;
        this.savingData.Co.save({callback: defer});
        console.info('save Co');
        }
        if(this.savingData.Customer.dirty) {
        if(!this.savingData.Customer.isValid()) {
        Ext.Msg.alert(Bancha.t('Unknown Error'), Bancha.t('Something went wrong, please reload the page!'));
        return;
        }
        counter++;
        this.savingData.Customer.save({callback: defer});
        console.info('save Customer');
        }*/

    },

    onShow: function() {

        /**
        * The accountselection show event triggers at the wrong time,
        * for that we have a workaround with an application event
        */


        // collect all the changes
        this.collectRecordData(this.savingData.Co, Ext.Viewport);

        // add the stores to iterate through
        this.savingData.CoItemCasingTypes = Ext.StoreMgr.get('CoItemCasingTypes');
        this.savingData.CoItemServiceTypes = Ext.StoreMgr.get('CoItemServiceTypes');

        // render template
        this.getPanel().setData(this.savingData);
    },

    onCoLoaded: function(record) {
        // collect all data in this object
        this.savingData = this.savingData || {};
        this.savingData.Co = record;
    },

    onCustomerLoaded: function(record) {
        // collect all data in this object
        this.savingData = this.savingData || {};
        this.savingData.Customer = record;
    },

    onAccountLoaded: function(record) {
        // collect all data in this object
        this.savingData = this.savingData || {};
        this.savingData.Account = record;
    },

    onUserLoaded: function(record) {
        // collect all data in this object
        this.savingData = this.savingData || {};
        this.savingData.User = record;
    },

    init: function(application) {
        application.on([
            { event: 'showconfirmation', fn: this.onShow, scope: this },
            { event: 'coloaded', fn: this.onCoLoaded, scope: this },
            { event: 'customerloaded', fn: this.onCustomerLoaded, scope: this },
            { event: 'accountloaded', fn: this.onAccountLoaded, scope: this },
            { event: 'userloaded', fn: this.onUserLoaded, scope: this }
        ]);
    }

});