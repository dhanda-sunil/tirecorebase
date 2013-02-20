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

Ext.define('WorkOrder.model.CustomerOrdersSearch', {
    extend: 'Ext.data.Model',
    
    requires: [
        'Bancha.Main',
        'Bancha.REMOTE_API'
    ],

    config: {
        fields: [
            {
                name: 'id',
                type: 'int'
            },
            {
                name: 'account_id',
                type: 'int'
            },
            {
                name: 'customer_location_id',
                type: 'int'
            },
            {
                name: 'customer_id',
                type: 'int'
            },
            {
                name: 'ref',
                defaultValue: 84267246,
                type: 'string'
            },
            {
                name: 'account_number',
                type: 'string'
            },
            {
                name: 'company_name',
                type: 'string'
            },
            {
                name: 'contact_name',
                type: 'string'
            }
        ],
        proxy: {
            type: 'direct',
            directFn: Bancha.getStub('Co').search,
            reader: {
                type: 'json',
                messageProperty: 'message',
                rootProperty: 'data'
            }
        }
    },

    onDirectProxyException: function(server, response, operation, options) {
        var fn = Bancha.onRemoteException || Ext.emptyFn;

        return fn.apply(this, arguments);
    }

});