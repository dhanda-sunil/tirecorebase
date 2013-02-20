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

Ext.define('WorkOrder.store.Customers', {
    extend: 'Ext.data.Store',
    
    requires: [
        'Bancha.Main',
        'Bancha.REMOTE_API'
    ],

    config: {
        model: Bancha.getModel('Customer'),
        autoLoad: false,
        storeId: 'Customers',
        proxy: {
            type: 'direct',
            directFn: Bancha.getStub('Customer').search,
            reader: {
                type: 'json',
                messageProperty: 'message',
                rootProperty: 'data'
            }
        }
    },

    constructor: function() {
        var me = this;
        me.callParent(arguments);
        me.getProxy().on([{
            fn: 'onDirectProxyException',
            event: 'exception',
            scope: me
        }]);
    },

    onDirectProxyException: function(server, response, operation, options) {
        var fn = Bancha.onRemoteException || Ext.emptyFn;

        return fn.apply(this, arguments);
    }

});