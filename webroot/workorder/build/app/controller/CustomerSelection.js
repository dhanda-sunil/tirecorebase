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

Ext.define('WorkOrder.controller.CustomerSelection', {
    extend: 'Ext.app.Controller',

    mixins: {
        convenience: 'WorkOrder.controller.mixin.Convenience'
    },

    config: {
        refs: {
            customerSelection: 'customerselection',
            searchField: 'customerselection searchfield',
            grid: 'customerselection touchgridpanel'
        },

        control: {
            "customerselection searchfield": {
                clearicontap: 'onSearchfieldClearicontap',
                keyup: 'onSearchfieldInput'
            },
            "customerselection touchgridpanel": {
                select: 'onCustomerSelected'
            }
        }
    },

    onSearchfieldClearicontap: function(text, e, options) {
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

    },

    onCustomerSelected: function(dataview, record, options) {

        // tell the Customer model controller about the selection (trigger this before jumping to next screen)
        this.getApplication().fireEvent('customerselected', record.get('id'));

        // display the next step (account selection)
        this.showNextScreen();
    },

    onCustomerselected: function(id) {

        /**
        * Users can't change the customer id of exsiting orders anymore, so this is not needed
        *

        // allways keep the current co
        this.active_customer_id = id;

        var grid = this.getGrid(),
        store = grid.getStore();


        // preselect the current customer
        if(this.active_customer_id) {
            // go to first page
            store.loadPage(1);

            // search for record
            this.getSearchField().setValue(this.active_customer_id);
            this.searchFor(grid, this.active_customer_id);

            // unselect work order (without fireing an event)
            grid.deselectAll();
        }


        */
    },

    onReset: function() {
        this.active_customer_id = undefined;
    },

    onShow: function() {

        /**
        * Reset search field
        */
        var grid = this.getGrid(),
        store = grid.getStore();


        // go to first page
        store.loadPage(1);

        // preselect the current customer
        this.getSearchField().setValue(this.active_customer_id || '');
        this.searchFor(grid, this.active_customer_id || '');

        // reset the search field
        this.getSearchField().reset();

        // unselect work order (without fireing an event)
        grid.deselectAll();

    },

    init: function(application) {
        application.on([
            { event: 'customerselected', fn: this.onCustomerselected, scope: this },
            { event: 'reset', fn: this.onReset, scope: this },
            { event: 'showcustomerselection', fn: this.onShow, scope: this }
        ]);
    }

});