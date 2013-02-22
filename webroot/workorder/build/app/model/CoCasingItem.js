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

Ext.define('WorkOrder.model.CoCasingItem', {
    extend: 'Ext.data.Model',

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
                name: 'line_number',
                type: 'string'
            },
            {
                name: 'casing_id',
                type: 'int'
            },
            {
                name: 'co_item_type_id',
                type: 'int'
            },
            {
                name: 'barcode',
                type: 'string'
            },
            {
                name: 'tread_design_id',
                type: 'int'
            },
            {
                name: 'remaining_tread',
                type: 'int'
            },
            {
                name: 'vehicle_number',
                type: 'string'
            },
            {
                name: 'brand_number',
                type: 'string'
            },
            {
                name: 'number_of_times_capped',
                type: 'int'
            },
            {
                name: 'dot_code',
                type: 'string'
            },
            {
                name: 'tire_size_name',
                type: 'string'
            },
            {
                name: 'manufacturer_name',
                type: 'string'
            },
            {
                name: 'manufacturer_id',
                type: 'int'
            },
            {
                name: 'tire_size_id',
                type: 'int'
            },
            {
                name: 'manufacturer_product_line_id',
                type: 'int'
            },
            {
                name: 'customer_id',
                type: 'int'
            }
        ],
        proxy: {
            type: 'direct',
            batchActions: false,
            api: {
                read: Bancha.getStub('CoItem').getCoCasingItems,
                create: Bancha.getStub('CoItem').createCoCasingItem,
                update: Bancha.getStub('CoItem').updateCoCasingItem,
                destroy: Bancha.getStub('CoItem').destroy
            },
            directFn: Bancha.getStub('CoItem').getCoCasingItems,
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