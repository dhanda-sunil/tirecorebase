/*!
 *
 * ShopFloor Application
 * Copyright 2012 TCS
 *
 * @package       ShopFloor
 * @copyright     Copyright 2012 TCS
 * @author        Roland Schuetz <mail@rolandschuetz.at>
 * @author        Chris Nizzardini <cnizzardini@gmail.com>
 * @author        Jeff Wooden <jeff@morointeractive.com>
 */
/*jslint browser: true, vars: true, plusplus: true, white: true, sloppy: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false, strict:false */
/*global Ext:false, Bancha:false, ShopFloor:true, localActions:false, window:false */

Ext.define('ShopFloor.view.InitialInspectionCheckpointPanel', {
    extend: 'Ext.Container',
    alias: 'widget.checkpointpanel1',
    requires: [
        'ShopFloor.view.DotSerialField',
        'ShopFloor.view.InitialInspectionGrid'
    ],
    config: {
        id: 'initial_inspecion_right_column',
        styleHtmlContent: true,
        width: '100%',
        scrollable: 'vertical',
        items: [{
            xtype:'inspectiongrid'
        },{
            xtype: 'fieldset',
            title: 'Station Requirements',
            items: [{
                xtype: 'dotserialfield'
            },{
                xtype: 'textfield',
                modelField: 'Casing.remaining_tread',
                id: 'p_o_num_txt',
                label: Bancha.t('Remaining Tread Depth (32nd)'),
                labelWidth: '35%'
            },{
                xtype: 'textfield',
                modelField: 'Casing.previous_caps',
                id: 'pre_tim_cap',
                label: Bancha.t('Previous Times Capped'),
                labelWidth: '35%'
            }]
        }]
    }
});