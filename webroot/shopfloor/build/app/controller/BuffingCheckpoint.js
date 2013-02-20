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

Ext.define('ShopFloor.controller.BuffingCheckpoint', {
    extend: 'Ext.app.Controller',
    alias: 'controller.checkpoint2',

    config: {
        refs: {
            treadWidthSelect: 'checkpointpanel2 selectfield[modelField=Casing.tread_width_id]',
            treadDesignImageBuff: '#TreadDesignImageBuff'
        },

        control: {
            "#TreadDesignBuff": {
                change: 'onSelectfieldChange'
            },
            "#buff_specs_panel": {
                painted: 'getBuffSpecs'
            }
        }
    },

    onSelectfieldChange: function(selectfield, newValue, oldValue, options) {
        var me = this;

        this.getTreadDesignImageBuff().setSrc('/TreadDesigns/viewimage/'+newValue+'.jpg');
        this.getTreadDesignImageBuff().setWidth(300);
        this.getTreadDesignImageBuff().setHeight(300);

        Bancha.getStub('TreadDesignTreadWidth').getPreferredWiths(newValue, function(result, response) {

            if(result.success){
                //console.log(response);
                var preferedIds = Ext.Array.pluck(result.data, 'tread_width_id');
                //console.log(preferedIds);
                Ext.StoreMgr.get("TreadWidths").each(function(rec) {
                    //console.log(preferedIds.indexOf(rec.get('id'))!==-1);
                    rec.set('preferred', preferedIds.indexOf(rec.get('id'))!==-1);
                });
            } else {
                Ext.Msg.alert(
                    Bancha.t('Server Error'),
                    Bancha.t('An unknown error occured. Please reload the App'));
            }
        });
    },

    onLoggedin: function() {
        var store = Ext.StoreMgr.get("TreadDesigns") || Ext.create('ShopFloor.store.TreadDesigns');
        if(store.getCount() === 0) {
            store.load();
        }

        store = Ext.StoreMgr.get("TreadWidths") || Ext.create('ShopFloor.store.TreadWidths');
        if(store.getCount() === 0) {
            store.load();
        }
    },
    
    getBuffSpecs: function(panel, eOpts)  {
        
        var me=this, customerId = this.getApplication().getController('AppController').casingCustomerId, tireSizeId = this.getApplication().getController('AppController').casingTireSizeId;
        Bancha.getStub('BuffSpec').getPreferred(customerId, tireSizeId, function(result){
            me.loadBuffSpecs(result.data[0], result.data[1], result.data[2]);
        });
    },
    
    loadBuffSpecs: function(buff1, buff2, buff3) {
        //grab the BuffSpecs store
        var store = Ext.StoreMgr.get("BuffSpecs");
        //define our event listener
        store.on('load', function(store, record, successful, operation, eOpts) {
            if (record.length > 0) {
                var buffRec1 = record[0].data;
                var buffRec2 = record[1].data;
                var buffRec3 = record[2].data;
                Ext.getCmp('buff_specs_panel').setHtml([
                    '<table width="100%" border="0" cellspacing="1" cellpadding="8" style="border:1px solid #BBBBBB;">',
                    '    <tr>',
                    '        <td bgcolor="#125f95"><strong style="color:#FFF">'+Bancha.t('BUFF')+'</strong></td>',
                    '        <td bgcolor="#125f95"><strong style="color:#FFF">'+Bancha.t('REC')+'</strong></td>',
                    '        <td bgcolor="#125f95"><strong style="color:#FFF">'+Bancha.t('ALT 1')+'</strong></td>',
                    '        <td bgcolor="#125f95"><strong style="color:#FFF">'+Bancha.t('ALT 2')+'</strong></td>',
                    '    </tr><tr>',
                    '        <td bgcolor="#ffffff"><strong>'+Bancha.t('Diameter')+'</strong></td>',
                    '        <td bgcolor="#ffffff">'+buffRec1.diameter+'</td>',
                    '        <td bgcolor="#ffffff">'+buffRec2.diameter+'</td>',
                    '        <td bgcolor="#ffffff">'+buffRec3.diameter+'</td>',
                    '    </tr><tr>',
                    '        <td bgcolor="#e1e1e1"><strong>'+Bancha.t('Crown Width')+'</strong></td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec1.crown_width+'</td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec2.crown_width+'</td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec3.crown_width+'</td>',
                    '    </tr><tr>',
                    '        <td bgcolor="#ffffff"><strong>'+Bancha.t('Radius')+'</strong></td>',
                    '        <td bgcolor="#ffffff">'+buffRec1.radius+'</td>',
                    '        <td bgcolor="#ffffff">'+buffRec2.radius+'</td>',
                    '        <td bgcolor="#ffffff">'+buffRec3.radius+'</td>',
                    '    </tr><tr>',
                    '        <td bgcolor="#e1e1e1"><strong>'+Bancha.t('Machine Setting')+'</strong></td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec1.machine_setting+'</td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec2.machine_setting+'</td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec3.machine_setting+'</td>',
                    '    </tr><tr>',
                    '        <td bgcolor="#ffffff"><strong>'+Bancha.t('Shoulder Radius')+'</strong></td>',
                    '        <td bgcolor="#ffffff">'+buffRec1.shoulder_radius+'</td>',
                    '        <td bgcolor="#ffffff">'+buffRec2.shoulder_radius+'</td>',
                    '        <td bgcolor="#ffffff">'+buffRec3.shoulder_radius+'</td>',
                    '    </tr><tr>',
                    '        <td bgcolor="#e1e1e1"><strong>'+Bancha.t('Shoulder Length')+'</strong></td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec1.shoulder_length+'</td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec2.shoulder_length+'</td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec3.shoulder_length+'</td>',
                    '    </tr><tr>',
                    '        <td bgcolor="#ffffff"><strong>'+Bancha.t('Shoulder Angle')+'</strong></td>',
                    '        <td bgcolor="#ffffff">'+buffRec1.shoulder_angle+'</td>',
                    '        <td bgcolor="#ffffff">'+buffRec2.shoulder_angle+'</td>',
                    '        <td bgcolor="#ffffff">'+buffRec3.shoulder_angle+'</td>',
                    '    </tr><tr>',
                    '        <td bgcolor="#e1e1e1"><strong>'+Bancha.t('Steel Belt')+'</strong></td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec1.steel_belt+'</td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec2.steel_belt+'</td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec3.steel_belt+'</td>',
                    '    </tr><tr><td bgcolor="#ffffff"><strong>'+Bancha.t('Shoulder Brushing')+'</strong></td>',
                    '        <td bgcolor="#ffffff">'+buffRec1.shoulder_brushing+'</td>',
                    '        <td bgcolor="#ffffff">'+buffRec2.shoulder_brushing+'</td>',
                    '        <td bgcolor="#ffffff">'+buffRec3.shoulder_brushing+'</td>',
                    '    </tr><tr><td bgcolor="#e1e1e1"><strong>'+Bancha.t('Bead Width')+'</strong></td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec1.bead_width+'</td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec2.bead_width+'</td>',
                    '        <td bgcolor="#e1e1e1">'+buffRec3.bead_width+'</td>',
                    '    </tr>',
                    '</table>'
                ].join(''));
            }
            //remove mask from display panel
            Ext.getCmp('buff_specs_panel').setMasked(false);
        }, this, { single: true});    
        //mask the panel before initiating the store load    
        Ext.getCmp('buff_specs_panel').setMasked(true);
        //create array containing our 3 buff specs
        var buffArr = [];
        //push the 3 buff spec ids
        buffArr.push(buff1);
        buffArr.push(buff2);
        buffArr.push(buff3);
        //set remote filtering for our 3 id values
        store.filter('id',buffArr);
        store.load();
    },

    init: function(application) {
        application.on([
            { event: 'loggedin', fn: this.onLoggedin, scope: this }
        ]);
    }

});