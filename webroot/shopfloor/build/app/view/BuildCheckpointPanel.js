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

Ext.define('ShopFloor.view.BuildCheckpointPanel', {
    extend: 'Ext.Panel',
    alias: 'widget.checkpointpanel4',

    config: {
        items: [
            {
                xtype: 'fieldset',
                margin: '0 15px 0 15px',
                padding: '0 2px 2px 2px',
                items: [
                    {
                        xtype: 'selectfield',
                        modelField: 'Casing.tread_design_id',
                        id: 'TreadDesignBuild',
                        label: Bancha.t('Tread Design'),
                        displayField: 'name',
                        store: 'TreadDesigns',
                        valueField: 'id'
                    },
                    {
                        xtype: 'selectfield',
                        modelField: 'Casing.tread_width_id',
                        id: 'TreadWidthBuild',
                        label: Bancha.t('Tread Width'),
                        displayField: 'tread_width',
                        store: 'TreadWidths',
                        valueField: 'id'
                    },
                    {
                        xtype: 'image',
                        height: 201,
                        id: 'TreadDesignImageBuild',
                        margin: '10px auto 5px auto',
                        width: '200px',
                        src: '/img/tread_default.jpg'
                    }
                ]
            }
        ]
    }

});