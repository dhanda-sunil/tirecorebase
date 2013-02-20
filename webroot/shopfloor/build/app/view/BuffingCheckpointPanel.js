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

Ext.define('ShopFloor.view.BuffingCheckpointPanel', {
    extend: 'Ext.Panel',
    alias: 'widget.checkpointpanel2',
    config: {
        html: '',
        scrollable: 'vertical',
        items: [{
            xtype: 'panel',
            padding:10,
            title: Bancha.t('Buff Specs'),
            id:'buff_specs_panel',
            html: [
                '<table width="100%" border="0" cellspacing="1" cellpadding="8" style="border:1px solid #BBBBBB;">',
                '    <tr>',
                '        <td bgcolor="#125f95"><strong style="color:#FFF">'+Bancha.t('BUFF')+'</strong></td>',
                '        <td bgcolor="#125f95"><strong style="color:#FFF">'+Bancha.t('REC')+'</strong></td>',
                '        <td bgcolor="#125f95"><strong style="color:#FFF">'+Bancha.t('ALT 1')+'</strong></td>',
                '        <td bgcolor="#125f95"><strong style="color:#FFF">'+Bancha.t('ALT 2')+'</strong></td>',
                '    </tr><tr>',
                '        <td bgcolor="#ffffff"><strong>'+Bancha.t('Diameter')+'</strong></td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '    </tr><tr>',
                '        <td bgcolor="#e1e1e1"><strong>'+Bancha.t('Crown Width')+'</strong></td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '    </tr><tr>',
                '        <td bgcolor="#ffffff"><strong>'+Bancha.t('Radius')+'</strong></td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '    </tr><tr>',
                '        <td bgcolor="#e1e1e1"><strong>'+Bancha.t('Machine Setting')+'</strong></td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '    </tr><tr>',
                '        <td bgcolor="#ffffff"><strong>'+Bancha.t('Shoulder Radius')+'</strong></td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '    </tr><tr>',
                '        <td bgcolor="#e1e1e1"><strong>'+Bancha.t('Shoulder Length')+'</strong></td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '    </tr><tr>',
                '        <td bgcolor="#ffffff"><strong>'+Bancha.t('Shoulder Angle')+'</strong></td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '    </tr><tr>',
                '        <td bgcolor="#e1e1e1"><strong>'+Bancha.t('Steel Belt')+'</strong></td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '    </tr><tr>',
                '        <td bgcolor="#ffffff"><strong>'+Bancha.t('Shoulder Brushing')+'</strong></td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '        <td bgcolor="#ffffff">&nbsp;</td>',
                '    </tr><tr>',
                '        <td bgcolor="#e1e1e1"><strong>'+Bancha.t('Bead Width')+'</strong></td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '        <td bgcolor="#e1e1e1">&nbsp;</td>',
                '    </tr>',
                '</table>'
            ].join('')
        },{
            xtype: 'fieldset',
            margin: '0 15px 0 15px',
            padding: '0 2px 2px 2px',
            title: '',
            items: [{
                xtype: 'selectfield',
                modelField: 'Casing.tread_design_id',
                id: 'TreadDesignBuff',
                label: Bancha.t('Tread Design'),
                displayField: 'name',
                store: 'TreadDesigns',
                valueField: 'id'
            },{
                xtype: 'selectfield',
                modelField: 'Casing.tread_width_id',
                id: 'TreadWidthBuff',
                label: Bancha.t('Tread Width'),
                displayField: 'tread_width',
                store: 'TreadWidths',
                valueField: 'id'
            },{
                xtype: 'image',
                height: 201,
                id: 'TreadDesignImageBuff',
                margin: '10px auto 5px auto',
                width: '200px',
                src: '/img/tread_default.jpg'
            }]
        }]
    }
});