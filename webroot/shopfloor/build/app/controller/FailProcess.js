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

Ext.define('ShopFloor.controller.FailProcess', {
    extend: 'Ext.app.Controller',

    mixins: {
        viewController: 'ShopFloor.controller.mixin.ViewController'
    },

    config: {
        refs: {
            failScreen: 'failscreen',
            failScreenCardContainer: '#failscreen-card-container'
        },

        control: {
            "button[action=cancelfailscreen]": {
                tap: 'onCancelClick'
            },
            "button[action=fail]": {
                tap: 'onFailClick'
            },
            "button[action=failscreendown]": {
                tap: 'onDownClick'
            },
            "button[action=failscreenup]": {
                tap: 'onUpClick'
            },
            "failscreen list": {
                itemsingletap: 'onNrtCodeSelected'
            },
            "button[action=failscreencasinghandling]": {
                tap: 'onCasingHandlingSelected'
            }
        }
    },

    onCancelClick: function(button, e, options) {

        this.getFailScreen().destroy();
    },

    onFailClick: function(button, e, options) {
        if(button.getDisabled()) {
            return;
        }

        var me = this;

        var nrtCodesStore = Ext.StoreManager.get('NrtCodes') || Ext.create('ShopFloor.store.NrtCodes');
        nrtCodesStore.sort([
            {property: 'ordering', direction: 'ASC'},
            {property: 'name', direction: 'ASC'}
        ]);

        // on first time load the store
        if(nrtCodesStore.getCount() === 0) {
            nrtCodesStore.load();
        }

        Ext.Viewport.add(this.createPanel('ShopFloor.view.TireFailScreen'));
        Ext.getCmp('NrtCodeList').getScrollable().getScroller().scrollTo(0,300);
    },

    onDownClick: function(button, e, options) {
        var scroll = Ext.getCmp('NrtCodeList').getScrollable().getScroller();
        scroll.scrollTo(0,scroll.position.y+300,true);
    },

    onUpClick: function(button, e, options) {
        var scroll = Ext.getCmp('NrtCodeList').getScrollable().getScroller();
        scroll.scrollTo(0,scroll.position.y-300,true);
    },

    onNrtCodeSelected: function(dataview, index, target, record, e, options) {

        // get the current casing entry
        var casing = this.getApplication().getController('Casing').getActiveRecord();
        
        // save the selected code
        casing.set('nrt_code_id', record.get('id'));
        casing.save();

        // show new one
        this.getFailScreen().getItems().getAt(0).setTitle(Bancha.t('Please select what to do with the casing'));
        this.getFailScreenCardContainer().setActiveItem(1);
    },

    onCasingHandlingSelected: function(button, e, options) {
        var me = this;

        this.getFailScreen().mask({
            xtype: 'loadmask',
            message: Bancha.t('Saving data...')
        });

        // get the active co item
        var coItem = this.getApplication().getController('CoItem').getActiveRecord();

        if(button.getText() === Bancha.t('Return as Received')) {
            coItem.set('co_item_status_id',3);
        }
        else if(button.getText() === Bancha.t('Scrap')) {
            coItem.set('co_item_status_id',4);
        } else {
            Ext.Error.raise({msg: 'Could not recognize Item Status: '+button.getText()});
        }
        // save will be triggered below from this.saveData(...)


        // get the active casing
        var casing = this.getApplication().getController('Casing').getActiveRecord();

        // log the event
        Bancha.getStub('CasingLog').write_log(casing.get('barcode'), me.active_checkpoint_id || null, 3);
        
        // mask for user
        Ext.Viewport.mask({
            xtype: 'loadmask',
            message: Bancha.t('Printing...')
        });

        // print the label
        Bancha.getStub('Casing').getFailLabel(casing.get('barcode'), function(result, response) {

            // as soon as it is loaded, print it
            localActions.printLabel64(result.string);

            // unmask ui
            Ext.Viewport.setMasked(false);
        });

        this.saveData(Ext.Viewport, function() {
            me.getFailScreen().destroy();
            // after the data is saved, prompt for new casing
            Ext.Msg.alert(
                Bancha.t('Successfully Saved'),
                Bancha.t('Saved all changes.'),
                function() {
                    me.getApplication().fireEvent('forcecasingselection', 'casing');
                }
            );
        });
    },

    addButtons: function() {
        /*
        var buttons = Ext.ComponentQuery.query('#FailButtons1')
        var x = 1;

        Ext.StoreManager.get('NrtCodes').each(function(r){

        if(r.get('is_most_common') == true){

        var button = Ext.create('Ext.Button', {
        text: r.get('name')
        });

        if(x ==3){
        buttons = Ext.ComponentQuery.query('#FailButtons2')
        }

        buttons[0].add({items:[button]});

        x++;
        }
        })
        */
    }

});