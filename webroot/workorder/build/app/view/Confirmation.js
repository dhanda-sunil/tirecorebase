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

Ext.define('WorkOrder.view.Confirmation', {
    extend: 'Ext.Container',
    alias: 'widget.confirmation',

    config: {
        styleHtmlContent: true,
        tpl: Ext.create('Ext.XTemplate', 
            '<h1>'+Bancha.t('Work Order Details')+'</h1>',
            '<table>',
            '    <tr>',
            '        <td class="wo_details_heading">'+Bancha.t('Customer:')+' </td>',
            '        <td>{Customer.data.company_name}</td>',
            '        <td class="wo_details_heading">'+Bancha.t('Account:')+' </td>',
            '        <td>{Account.data.number}</td>',
            '    </tr>',
            '',
            '    <tr>',
            '        <td class="wo_details_heading">'+Bancha.t('Work Order Number:')+' </td>',
            '        <td>{Co.data.ref}</td>',
            '        <td class="wo_details_heading">'+Bancha.t('PO Number:')+' </td>',
            '        <td>{Co.data.po_number}</td>',
            '    </tr>',
            '    <tr>',
            '        <td class="wo_details_heading">'+Bancha.t('Pick Up Date:')+' </td>',
            '        <td>{[values.Co.data.pickup_date ? values.Co.data.pickup_date.toLocaleDateString() : \'\']}</td>',
            '        <td class="wo_details_heading">'+Bancha.t('Requested by:')+' </td>',
            '        <td>{[Ext.StoreMgr.get(\'CustomerContacts\').getById(values.Co.data.requester_id) ? Ext.StoreMgr.get(\'CustomerContacts\').getById(values.Co.data.requester_id).get(\'name\') : \'\']}</td>',
            '    </tr>',
            '</table>',
            '',
            '',
            '<h2>'+Bancha.t('Order Items')+'</h2>',
            '<dl>',
            '    <!-- count for each type the number of items and display it, if more then zero -->',
            '    <tpl for="CoItemCasingTypes.data.all">',
            '        <tpl if="this.countItems(\'Casing\',values.data.id) &gt; 0">',
            '            <dt>{[this.countItems(\'Casing\',values.data.id)]}x {[values.data.name]}</dt>',
            '        </tpl>',
            '    </tpl>',
            '    <tpl for="CoItemServiceTypes.data.all">',
            '        <tpl if="this.countItems(\'Service\', values.data.id) &gt; 0">',
            '            <dt>{[this.countItems(\'Service\', values.data.id)]}x {[values.data.name]}</dt>',
            '        </tpl>',
            '    </tpl>',
            '</dl>',
            '',
            '<h2>{["'+Bancha.t('Total Items: {count}')+'".replace("{count}", Ext.StoreMgr.get(\'CoCasingItems\').getCount()+Ext.StoreMgr.get(\'CoServiceItems\').getCount())]}</h2>',
            {
                countItems: function(item_type, category_type_id) {
                    var count = 0;

                    Ext.StoreMgr.get('Co'+item_type+'Items').each(function(rec) {
                        if(rec.get('co_item_type_id') === parseInt(category_type_id,10)) {
                            count++;
                        }
                    });

                    return count;
                }
            }
        )
    }

});