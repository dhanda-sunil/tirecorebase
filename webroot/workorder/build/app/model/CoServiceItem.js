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

Ext.define('WorkOrder.model.CoServiceItem', {
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
                name: 'co_id',
                type: 'int'
            },
            {
                name: 'co_item_type_id',
                type: 'int'
            },
            {
                name: 'desc',
                type: 'string'
            }
        ],
        proxy: {
            type: 'direct',
            batchActions: false,
            api: {
                read: Bancha.getStub('CoItem').getCoServiceItems,
                create: Bancha.getStub('CoItem').create,
                update: Bancha.getStub('CoItem').update,
                destroy: Bancha.getStub('CoItem').destroy
            },
            directFn: Bancha.getStub('CoItem').getCoServiceItems,
            reader: {
                type: 'json',
                idProperty: 'id',
                messageProperty: 'message',
                rootProperty: 'data'
            },
            writer: {
                type: 'json',
                rootProperty: 'data'
            }
        }
    }
});