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

Ext.define('WorkOrder.controller.AccountSelection', {
    extend: 'Ext.app.Controller',

    mixins: {
        convenience: 'WorkOrder.controller.mixin.Convenience'
    },

    config: {
        refs: {
            accountSelect: 'accountselection selectfield[modelField=Co.account_id]',
            addressSelection: '#addressselection',
            requesterSelect: 'selectfield[modelField=Co.requester_id]',
            shippingAddressSelect: 'accountselection selectfield[modelField=Co.ship_address_id]',
            billingAddressSelect: 'accountselection selectfield[modelField=Co.bill_address_id]',
            phoneNumbersList: 'list[role=accountphonenumbers]',
            nextButton: 'toolbar[role=footer] button[action=navigationnext]',
            contentCardPanel: '#mainrightpanel'
        },

        control: {
            "accountselection selectfield[modelField=Co.account_id]": {
                change: 'onAccountSelected'
            },
            "accountselection selectfield[modelField=Co.ship_address_id]": {
                change: 'onShippingAddressChanged'
            },
            "accountselection selectfield[modelField=Co.bill_address_id]": {
                change: 'onBillingAddressChanged'
            },
            "button[action=createPhoneNumber]": {
                tap: 'onCreatePhoneNumber'
            },
            "list[role=accountphonenumbers]": {
                selectionchange: 'onPhoneNumberSelected'
            },
            "selectfield[modelField=Co.requester_id]": {
                change: 'onRequesterSelected'
            }
        }
    },

    onAccountSelected: function(selectfield, newValue, oldValue, options) {
        var rightpanel = this.getAddressSelection();

        if(newValue===oldValue) {
            // nothing to do
            return;
        }

        this.getApplication().fireEvent('accountselected', newValue);



        // setup the default bill and ship adresses if no one is defined yet
        var account = Ext.StoreMgr.get('Accounts').getById(newValue);

        if(this.active_co) {

            // set the shipping address, if not set in co yet, use the default
            this.getShippingAddressSelect().setValue((this.active_co ? this.active_co.get('ship_address_id') : undefined) || (account ? account.get('default_ship_to_id') : undefined));

            // set the shipping address, if not set in co yet, use the default
            this.getBillingAddressSelect().setValue((this.active_co ? this.active_co.get('bill_address_id') : undefined)  || (account ? account.get('default_bill_to_id') : undefined));
        }




        // maybe enable next-button
        this.updateNextButtonStatus();
    },

    onShippingAddressChanged: function(selectfield, newValue, oldValue, options) {
        this.onAddressSelectChanged(selectfield, newValue, oldValue);
    },

    onBillingAddressChanged: function(selectfield, newValue, oldValue, options) {
        this.onAddressSelectChanged(selectfield, newValue, oldValue);
    },

    onCreatePhoneNumber: function(button, e, options) {

        if(!this.active_co) {
            Ext.Msg.alert(Bancha.t('Error'), Bancha.t('Something went wrong'));
        }

        var data = {
                ref_id: this.active_co.get('customer_id'), // todo fix
                ref_table: 'customers'
            },
            showSecondPrompt,
            validations,
            typesList,
            types = [],
            saveRecord;


        // read all the available types from the database type enumeration
        validations = Bancha.getModel('PhoneNumber').getValidations();
        // since this is not an enum anymore, this doesn't work right now
        // read the posibilities from the enum list, also have a fallback
        //typesList = validations.get('type-inclusion') ? validationRule.list : ['Mobile','Work','Home','Pager','Fax','Other'];
        typesList = [
            Bancha.t('Mobile'), // if we translate them individually instead of in the loop the shell tool can collect them
            Bancha.t('Work'), 
            Bancha.t('Home'), 
            Bancha.t('Pager'), 
            Bancha.t('Fax'), 
            Bancha.t('Other')
        ];
        Ext.each(typesList, function(item) {
            types.push({
                value: item,
                display: item
            });
        });

        // ask the user for the type
        Ext.Msg.prompt(
            Bancha.t('Add Phone Number'),
            Bancha.t('Please select a type:'), 
            function(buttonId, value) {
                if(buttonId !== 'ok') {
                    return;
                }
                data.type = value;
                showSecondPrompt();
            },
            null, //scope
            false, //multiline
            types[0].value, // default
            { // prompt config
                xtype: 'selectfield',
                options: types,
                valueField: 'value',
                displayField: 'display'
            }
        );


        showSecondPrompt = function() {

            // ask the user for the number
            Ext.Msg.prompt(
                Bancha.t('Add Phone Number'),
                Bancha.t('Please enter a number:'), 
                function(buttonId, value) {
                    if(buttonId !== 'ok') {
                        return;
                    }
                    data.value = value;
                    saveRecord();
                },
                null, //scope
                false, //multiline
                null, // default
                { // prompt config
                    xtype: 'textfield'
                }
            ); 
        };


        saveRecord = function() {
            var store = Ext.StoreMgr.get('AccountPhoneNumbers');
            store.add(data);
            store.sync();
        };

    },

    /**
     * Every time the requester field is changed,
     * update the phone number below
     */
    onRequesterSelected: function(selectfield, newValue, oldValue, options) {

        if(newValue===oldValue) {
            return; // nothing changed here
        }

        // get the template display container
        var container = Ext.ComponentQuery.query('container[role=showRequestorPhoneNumber]')[0],
            me = this;

        // handle if no contact is selected
        if(newValue===null) {
            container.setHtml(Bancha.t('Please select a requestor'));
            return;
        }

        // first set the field loading (mask looks bad here)
        container.setHtml(Bancha.t('Loading...'));

        // load the number
        Bancha.getStub('PhoneNumber').getSingle('contacts', newValue, function(result) {
            // to prevent race conditions, check is this still the current id
            if(me.getRequesterSelect().getValue() !== newValue) {
                return; // old request, ignore
            }

            if(result.success === false) {
                container.setHtml(Bancha.t('No phone number available.'));
            } else {
                container.setData(result.data);
            }
        });
    },

    onPhoneNumberSelected: function(selectable, records, options) {

        if(records.length) {
            // change the phone number reference on the Co
            this.active_co.set('requester_phone_id', records[0].get('id'));
        }
    },

    onCoLoaded: function(record) {

        this.active_co = record;

        // maybe the right customer accounts are not yet loaded, so keep the reference
        this.selected_account_id = record.get('account_id');

    },

    onAddressSelectChanged: function(selectfield, newValue, oldValue) {

        /**
        *render new template below the select field
        */

        var tplComponent = selectfield.getParent().getAt(1),
        record = selectfield.getStore().getById(newValue);

        tplComponent.setData(record ? record.data : {}); // if there is no such record make sure the tpl is empty


        // maybe enable next-button
        this.updateNextButtonStatus();
    },

    onAccountLoaded: function(record) {

        var id = record ? record.get('id') : 0; // if no record is given this is a new Co

        this.getAccountSelect().setValue(id);

        // maybe the right customer accounts are not yet loaded, so keep the reference
        this.selected_account_id = id;



        // maybe enable next-button
        this.updateNextButtonStatus();
    },

    onCustomerLoaded: function(record) {

        /**
        * Now load all to the customer associated accounts
        *
        * This could sometimes already load when the account is loaded, but then it doesn't 
        * trigger when the Co is new, so keep it here
        */

        var me = this,
        panel = this.getContentCardPanel();
        //set a variable on this controller that we can reuse throughout the application
        //i.e. this.getApplication().getController('AccountSelection').customerId
        this.customerId = record.get('id');

        // load new addresses
        panel.mask({
            xtype: 'loadmask',
            message: Bancha.t('Loading data...')
        });


        var counter = 5,
        executeOnce = function() {
            counter--;
            if(counter===0) {
                panel.setMasked(false);
            }
        };


        // load the accounts store
        var store = Ext.StoreMgr.get('Accounts') || Ext.create('WorkOrder.store.Accounts');
        store.filter('customer_id', this.customerId);
        store.load();
        store.on('load', function() {
            if(me.selected_account_id) { // if the account is ready before this store was loaded
                me.getAccountSelect().setValue(me.selected_account_id);
            }
            executeOnce();
        }, this, {single: true});

        // load the contacts store
            store = me.getRequesterSelect().getStore();
            store.filter('ref_table', 'customers');
            store.filter('ref_id', this.customerId);
            store.on('load', function(record) {
                executeOnce();
            }, this, { single: true});
                store.load();


            // load the shipping addresses
            store = Ext.StoreMgr.get('AccountShippingAddresses') || Ext.create('WorkOrder.store.AccountShippingAddresses');
            store.filter('is_shipping', true);
            store.filter('ref_table', 'customers');
            store.filter('ref_id', this.customerId);
            store.on('load', function() {

                // set the shipping address, if defined
                me.getShippingAddressSelect().setValue(me.active_co.get('ship_address_id') || null);

                executeOnce();
            }, this, { single: true});
                store.load();

                // load the billing addresses
                store = Ext.StoreMgr.get('AccountBillingAddresses') || Ext.create('WorkOrder.store.AccountBillingAddresses');
                store.filter('is_billing', true);
                store.filter('ref_table', 'customers');
                store.filter('ref_id', this.customerId);
                store.on('load', function() {

                    // set the shipping address, if defined
                    me.getBillingAddressSelect().setValue(me.active_co.get('bill_address_id') || null);

                    executeOnce();
                }, this, { single: true});
                    store.load();

                    // load the phone numbers
                    store = Ext.StoreMgr.get('AccountPhoneNumbers') || Ext.create('WorkOrder.store.AccountPhoneNumbers');
                    store.filter('ref_table', 'customers');
                    store.filter('ref_id', this.customerId);
                    store.load();
                    store.on('load', function() {
                        // select the correct phone number
                        me.getPhoneNumbersList().deselectAll(true);
                        if(me.active_co.get('requester_phone_id')) {
                            var recordAtIndex = this.indexOfId(me.active_co.get('requester_phone_id'));
                            me.getPhoneNumbersList().select(recordAtIndex, false, true);
                        }
                        executeOnce();
                    });


                    // load the possible requesters
                    store = Ext.StoreMgr.get('CustomerContacts') || Ext.create('WorkOrder.store.CustomerContacts');
                    store.filter('ref_table', 'customers');
                    store.filter('ref_id', this.customerId);
                    store.load();
                    store.on('load', function() {
                        // select the correct requested by contact
                        me.getRequesterSelect().setValue(me.active_co.get('requester_id') || null);
                    });


    },

    updateNextButtonStatus: function() {
        // check if the user can go to the next screen
        var valid = !!this.getBillingAddressSelect().getValue() && 
        !!this.getShippingAddressSelect().getValue() &&
        !!this.getAccountSelect().getValue();
        this.getNextButton().setDisabled(!valid);
    },

    init: function(application) {

        application.on([
            { event: 'coloaded', fn: this.onCoLoaded, scope: this },
            { event: 'accountloaded', fn: this.onAccountLoaded, scope: this },
            { event: 'customerloaded', fn: this.onCustomerLoaded, scope: this }
        ]);
    }

});