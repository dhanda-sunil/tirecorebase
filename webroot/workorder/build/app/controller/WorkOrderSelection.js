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

Ext.define('WorkOrder.controller.WorkOrderSelection', {
    extend: 'Ext.app.Controller',

    mixins: {
        convenience: 'WorkOrder.controller.mixin.Convenience'
    },

    config: {
        refs: {
            grid: 'workorderselection touchgridpanel',
            searchField: 'workorderselection searchfield'
        },

        control: {
            "workorderselection touchgridpanel": {
                select: 'onWorkOrderSelected'
            },
            "button[action=createWorkOrder]": {
                tap: 'onCreateWorkOrder'
            },
            "workorderselection searchfield": {
                clearicontap: 'onSearchfieldClearIconTap',
                keyup: 'onSearchfieldInput'
            }
        }
    },

    onWorkOrderSelected: function(dataview, record, options) {

        // tell the Co model controller about the selection
        this.getApplication().fireEvent('coselected', record.get('id'));

        // if there is already a customer selected, tell customer model controller about it
        if(record.get('customer_id')) {
            this.getApplication().fireEvent('customerselected', record.get('customer_id'));
        }

        // same as above
        if(record.get('account_id')) {
            this.getApplication().fireEvent('accountselected', record.get('account_id'));
        }
        if(record.get('customer_location_id')) {
            this.getApplication().fireEvent('customerlocationselected', record.get('customer_location_id'));
        }

        // display the next step (account selection)
        this.jumpScreens(2);
    },

    onCreateWorkOrder: function(button, e, options) {

        // tell the Co model controller about the selection
        this.getApplication().fireEvent('newcoselected');

        // display the next step (customer selection)
        this.showNextScreen();

    },

    onSearchfieldClearIconTap: function(text, e, options) {
        // clear all old filters by loading another time
        this.searchFor(this.getGrid(),'');
    },

    onSearchfieldInput: function(textfield, e, options) {
        var value = textfield.getValue();

        // we need either a number or at least three chars
        // we also except searching for '' which clears it out again
        if(!Ext.isNumeric(value) && value.length<3 && value.length!==0) {
            return;
        }

        // ask the server for new data
        this.searchFor(this.getGrid(),value);









        /** ********* we sort remotly ************
        //first clear any current filters on the store
        store.clearFilter();

        //check if a value is set first, as if it isnt we dont have to do anything
        if (!value) {
            return;
        }

        //the user could have entered spaces, so we must split them so we can loop through them all
        var searches = value.split(' '),
        regexps = [],
        i;

        //loop them all
        for (i = 0; i < searches.length; i++) {
            //if are less then 3 chars, continue
            if (searches[i].length<3) continue;

            //if found, create a new regular expression which is case insenstive
            regexps.push(new RegExp(searches[i], 'i'));
        }


        //now filter the store by passing a method
        //the passed method will be called for each record in the store
        store.filter(function(record) {
            var matched = [];

            //loop through each of the regular expressions
            // each regex must fit to one of the fields
            for (i = 0; i < regexps.length; i++) {
                var search = regexps[i],
                cId    = record.get('customer_id'),
                cRec   = customersStore.getById(cId),
                clRec  = customerLocationsStore.find('customer_id',cId),
                didMatchCo      = record.get('ref_id').match(search),
                didMatchAccount = (clRec && clRec!==-1) ? clRec.get('account').match(search) : false,
                didMatchCompany = (cRec && cRec!==-1) ? cRec.get('company_name').match(search) : false,
                didMatchContact = (cRec && cRec!==-1) ? (cRec.get('first_name').match(search) || cRec.get('last_name').match(search)) : false;

                //if it didn't match anyone, exclude record
                if(!didMatchCo && !didMatchAccount && !didMatchCompany && !didMatchContact) {
                    return false;
                }
            }

            // every regex fitted, so keep this record
            return true;
        });
        */
    },

    onShow: function() {

        /**
        * Clear all data from fields
        */


        // reset the search field
        this.getSearchField().reset();
        this.getGrid().refresh(); // remvoe all highlighting

        // clean store
        this.getGrid().getStore().loadPage(1);

        // unselect work order (without fireing an event)
        this.getGrid().deselectAll();
    },

    onFirstShow: function() {

        // on first time load the store, otherwise see shopworkorderselection application listener
        this.getGrid().getStore().loadPage(1);
    },

    init: function(application) {
        application.on([
            { event: 'showworkorderselection', fn: this.onShow, scope: this },
            { event: 'loggedin', fn: this.onFirstShow, scope: this }
        ]);
    }

});