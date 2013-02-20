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

Ext.Loader.setConfig({
    enabled: true,
    paths: {
        'Ext.ux.touch.grid': 'plugins/Ext.ux.touch.grid/Ext.ux.touch.grid', // for production see the .sencha/app/sencha.cfg class pathes
        'Bancha.Main': '/Bancha/js/Bancha-dev.js', 
        'Bancha.REMOTE_API': '/bancha-api-class/models/all.js' // this will only be used in the debug version, the production version will be shipped packaged version
    }
});

Ext.application({
    requires: [
        'Bancha.Main',
        'Bancha.REMOTE_API',
        'WorkOrder.SenchaFixes',
        'WorkOrder.ErrorHandler',
        'WorkOrder.field.override.Select'
    ],
    models: [
        'CustomerOrdersSearch',
        'CoCasingItem',
        'CoServiceItem'
    ],
    stores: [
        'Customers',
        'CustomerOrders',
        'CustomerLocations',
        'CoItems',
        'CustomerOrdersSearch',
        'AccountShippingAddresses',
        'Accounts',
        'AccountBillingAddresses',
        'AccountPhoneNumbers',
        'CoCasingItems',
        'CoItemCasingTypes',
        'TreadDesigns',
        'CoServiceItems',
        'Cos',
        'CoItemServiceTypes',
        'CustomerContacts',
        'Manufacturers',
        'TireSizes'
    ],
    views: [
        'LoginWindow',
        'DotSerialField',
        'DotTextField',
        'GridView',
        'Header',
        'CustomerSelection',
        'WorkOrderItems',
        'Confirmation',
        'MainPanel'
    ],
    name: 'WorkOrder',
    controllers: [
        'Authentication',
        'AppController',
        'User',
        'Casing',
        'CustomerAlert',
        'DotSerial',
        'Customer',
        'AccountSelection',
        'WorkOrderSelection',
        'Co',
        'Account',
        'CustomerSelection',
        'WorkOrderItems',
        'Confirmation'
    ],

    launch: function() {
        Ext.create('WorkOrder.view.LoginWindow', {fullscreen: true});
    }

});
