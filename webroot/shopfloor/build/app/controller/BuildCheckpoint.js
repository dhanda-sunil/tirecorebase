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

Ext.define('ShopFloor.controller.BuildCheckpoint', {
    extend: 'Ext.app.Controller',
    alias: 'controller.checkpoint4',

    config: {
        refs: {
            treadWidthSelect: 'checkpointpanel2 selectfield[modelField=Casing.tread_width_id]',
            TreadDesignImageBuild: '#TreadDesignImageBuild'
        },

        control: {
            "#TreadDesignBuild": {
                change: 'onSelectfieldChange'
            }
        }
    },

    onSelectfieldChange: function(selectfield, newValue, oldValue, options) {
        var me = this;

        this.getTreadDesignImageBuild().setSrc('/TreadDesigns/viewimage/'+newValue);
        this.getTreadDesignImageBuild().setWidth(300);
        this.getTreadDesignImageBuild().setHeight(300);

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

    init: function(application) {
        application.on([
            { event: 'loggedin', fn: this.onLoggedin, scope: this }
        ]);
    }

});