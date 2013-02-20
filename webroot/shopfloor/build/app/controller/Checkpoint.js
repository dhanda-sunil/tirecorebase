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

Ext.define('ShopFloor.controller.Checkpoint', {
    extend: 'Ext.app.Controller',

    mixins: {
        viewController: 'ShopFloor.controller.mixin.ViewController'
    },

    config: {
        refs: {
            mainRight: '#mainrightpanel'
        },

        control: {
            "button[action=changecheckpoint]": {
                tap: 'onChangeCheckpointClick'
            }
        }
    },

    onChangeCheckpointClick: function(button, e, options) {

        if(!this.store) {
            this.store = Ext.create('Ext.data.Store',{
                model: Bancha.getModel('Checkpoint'),
                autoLoad: true
            });
        }

        Ext.Msg.prompt(
            Bancha.t('Choose Checkpoint'),
            Bancha.t('Please choose a new checkpoint from below:'),
            function(buttonId, value, displayField) {

                if(buttonId==='cancel') {
                    this.enable('Viewport');
                    return;
                }

                this.active_id = value;
                this.getApplication().fireEvent('checkpointselected', parseInt(value,10));

                var key = this.store.find('id',value);
                var checkpoint = this.store.getAt(key);

                Ext.ComponentQuery.query('#header_left_column')[0].setTitle(checkpoint.get('name'));
            },
            this, //scope
            false, //multiLine,
            this.active_id, //value
            {
                xtype: 'selectfield',
                store: this.store,
                valueField:'id',
                displayField:'name'
            }
        );
    },

    onCheckpointSelected: function(checkpointId) {
        var panel = this.getMainRight().down('checkpointpanel'+checkpointId);
        if(panel === null) {
            // checkpoint is not yet created
            panel = this.createPanel('widget.checkpointpanel'+checkpointId);
            // add to main panel
            this.getMainRight().add(panel);
        }
        if (checkpointId === 1) {
            this.getApplication().getController('Gestures').manualLeftPanelCollapse(false);
        } else  if (checkpointId === 2) {
            this.getApplication().getController('Gestures').manualLeftPanelCollapse(false);
        } else  if (checkpointId === 3) {
            //repair screen - set load mask
            this.disable('Viewport', Bancha.t('Loading Repair Screen...'));
            //collapse the left panel
            this.getApplication().getController('Gestures').manualLeftPanelCollapse(true);
        } else  if (checkpointId === 4) {
            this.getApplication().getController('Gestures').manualLeftPanelCollapse(false);            
            var record = this.getApplication().getController('TreadDesign').getActiveRecord();
            if (record.get('cure_type') == 'mold') {
                //since the cure_type is mold we need to process two more bar codes
                this.getApplication().fireEvent('forcecasingselection', 'bead');
            }
        } else  if (checkpointId === 5) {
            this.getApplication().getController('Gestures').manualLeftPanelCollapse(false);
        }
        this.getMainRight().setActiveItem(panel);
    },

    onLoggedIn: function(userRecord) {

        this.active_id = userRecord.get('shop_checkpoint_pref_id');
    },

    init: function(application) {
        application.on([
            { event: 'checkpointselected', fn: this.onCheckpointSelected, scope: this },
            { event: 'loggedin', fn: this.onLoggedIn, scope: this }
        ]);
    }
});