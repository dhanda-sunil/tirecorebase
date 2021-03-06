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

Ext.define('WorkOrder.store.CustomerOrdersSearch', {
    extend: 'Ext.data.Store',

    requires: [
        'WorkOrder.model.CustomerOrdersSearch'
    ],

    config: {
        autoLoad: false,
        destroyRemovedRecords: false,
        model: 'WorkOrder.model.CustomerOrdersSearch',
        pageSize: 20,
        remoteSort: true,
        storeId: 'CustomerOrdersSearch'
    }
});