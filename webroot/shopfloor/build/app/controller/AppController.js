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
/*global Ext:false, Bancha:false, ShopFloor:true, localActions:true, window:false */

Ext.define('ShopFloor.controller.AppController', {
    extend: 'Ext.app.Controller',

    mixins: {
        viewController: 'ShopFloor.controller.mixin.ViewController'
    },

    config: {
        views: [
            'Header',
            'MainPanel',
            'Footer'
        ],

        refs: {
            header: 'header',
            footer: 'footer',
            main: 'main',
            mainRight: '#mainrightpanel'
        },

        control: {
            "button[action=showproduction]": {
                tap: 'onShowProductionClick'
            },
            "button[action=support]": {
                tap: 'onShowSupportWin'
            },
            "button[action=print]": {
                tap: 'onPrintClick'
            },
            "button[action=pass]": {
                tap: 'onPassClick'
            },
            "button[action=cancel]": {
                tap: 'onCancelClick'
            }
        }
    },

    onShowProductionClick: function(button, e, options) {
        var me = this;

        this.disable('Viewport', Bancha.t('Loading Data...'));

        Bancha.getStub('User').getStats(function(result,response) {
            if(result && result.success) {
                Ext.Msg.alert(
                    Bancha.t('Stats'),
                    result.message,
                    function() {
                        me.enable('Viewport');
                    }
                );
            } else {
                Ext.Msg.alert(
                    Bancha.t('Error'),
                    result.message || Bancha.t('Could not load %s data from server, please try again!').replace(/%s/g,Bancha.t('Stats')),
                    function() {
                        me.enable('Viewport');
                    }
                );
            }
        });
    },

    onPrintClick: function(button, e, options) {

        // get the active casing
        var casing = this.getApplication().getController('Casing').getActiveRecord();

        // mask for user
        Ext.Viewport.mask({
            xtype: 'loadmask',
            message: Bancha.t('Printing...')
        });

        // load the label for the active casing
        Bancha.getStub('Casing').getLabel(casing.get('barcode'), function(result, response) {

            // as soon as it is loaded, print it
            localActions.printLabel64(result.string);

            // unmask ui
            Ext.Viewport.setMasked(false);
        });
    },

    onPassClick: function(button, e, options) {
        if(button.getDisabled()) {
            return;
        }

        // get the active casing
        var me = this,
            casing = this.getApplication().getController('Casing').getActiveRecord();

        Bancha.getStub('CasingLog').write_log(casing.get('barcode'), this.active_checkpoint_id || null, 2);

        this.saveData(Ext.Viewport, function() {

            // after the data is saved, prompt for new casing
            me.promptForCasingBarcode('casing');
        });
    },

    onCancelClick: function(button, e, options) {
        if(button.getDisabled()) {
            return;
        }

        this.promptForCasingBarcode('casing');
    },
    
    onCasingLoaded: function(casingRecord) {
        var me=this;        
        if(casingRecord.raw.length != 0 && casingRecord.get('customer_id') != null) {
            //get our existing counter value from our DotSerial controller
            var counter = 4;
            //set the updated counter value (needs to be updated after second casing barcode)
            //me.getApplication().getController('DotSerial').setCounter(counter);
            //if pertinent records are null, reduce counter by 1 and do not fire load event for subsequent model
            if (casingRecord.get('tire_size_id') === null) {
                counter--;
            } else {
                me.getApplication().fireEvent('loadtiresize', casingRecord);
            }
            if (casingRecord.get('manufacturer_plant_id') === null) {
                counter--;
            } else {
                me.getApplication().fireEvent('loadmanufacturerplant', casingRecord);
            }
            if (casingRecord.get('manufacturer_product_line_id') === null) {
                counter--;
            } else {
                me.getApplication().fireEvent('loadmanufacturerproductline', casingRecord);
            }
            //set the updated counter value
            me.getApplication().getController('DotSerial').setCounter(counter);
            //fire the post load event to load remaining models
            me.getApplication().fireEvent('loadpostcasingmodels', casingRecord);
        } else {
            //bad barcode
            me.getApplication().fireEvent('forcecasingselection', 'casing');
        }
        
    },
    
    onTreadDesignLoaded: function(record) {
        if (this.active_checkpoint_id == 4) {
            if (record.get('cure_type') == 'mold') {
                //since the cure_type is mold we need to process two more bar codes
                this.getApplication().fireEvent('forcecasingselection', 'bead');
            }
        }
    },

    onLoadPostCasingModels: function(casingRecord) {
        //populate casing data into the necessary views
        //this.getApplication().getController('Casing').pushPanelData(Ext.getCmp('header_left_column'), casingRecord);
        //this.getApplication().getController('Casing').pushPanelData(Ext.getCmp('initialinspectioncheckpointleftscreen'), casingRecord);

        //set current customer id for reference
        this.casingCustomerId = casingRecord.data.customer_id;

        //now get the requested by name and populate the field
        var cStore = Ext.StoreManager.get('CustomerContacts') || Ext.create('ShopFloor.store.CustomerContacts');
        cStore.filter('ref_table', 'customers');
        cStore.filter('ref_id', this.casingCustomerId);
        cStore.on('load', function(store, records, successful, operation, eOpts ) {
            //get the contact's name from the first entry
            var contactName = records[0] ? records[0].get('name') : '';

            //set the field value
            Ext.Viewport.down('field[name=requester_name]').setValue(contactName || Bancha.t('NA'));
         }, this, { single: true});
         cStore.load();
    },

    promptForCasingBarcode: function(type) {
        var me = this, msgTitle;
        var emptyLabel = type.charAt(0).toUpperCase() + type.slice(1);
        this.barCodeType=type;
        if (type === 'casing') {
            msgTitle = 'Barcode Needed';
        } else if (type === 'bead') {
            msgTitle = 'Barcode Needed for Bead';
        } else if (type === 'mold') {
            msgTitle = 'Barcode Needed for Mold';
        }

        // clear all data from old casing
        if (type == 'casing') {
            this.clearData(this.getHeader());
            this.clearData(this.getMain());
        }
        
        this.barcodeWin = Ext.Viewport.add({
            xtype:'panel',
            hidden:true,
            modal:true,
            hideOnMaskTap:false,
            centered:true,
            scrollable:false,
            width:450,
            height:150,
            layout: 'vbox',
            cls:'barcode',
            items:[{
                xtype:'panel',
                flex:1,
                padding:10,
                cls:'barcodeDescription',
                html:'Please enter a barcode or use the barcode scanner.'
            },{
                xtype:'panel',
                cls:'barcodeField',
                items:[{
                    xtype:'textfield',
                    cls:'barcodeFieldInput',
                    name:'barcode',
                    keyboard:'number',
                    placeHolder: 'Enter '+emptyLabel+' Barcode...',
                    listeners: {
                        painted: function(field, eOpts) {
                            field.setPlaceHolder('Enter '+emptyLabel+' Barcode...');
                            field.focus();
                        },
                        keyup: function (field, e, eOpts) {
                            if (e.browserEvent.keyCode == 13) {
                                var value = field.getValue();
                                field.setValue('');
                                //close keyboard
                                //Ext.Viewport.fireEvent('closekeyboards');
                                me.getApplication().fireEvent(type+'selected', value);
                                this.disable('Viewport', Bancha.t('Loading data...'));
                            }
                        }
                    }
                }]
            },{
                xtype:'toolbar',
                docked:'bottom',
                items:[{
                    xtype:'spacer'
                },{
                    xtype:'button',
                    text:'OK',
                    minWidth:80,
                    ui:'confirm',
                    listeners: {
                        tap: function(button, e, eOpts) {
                            var panel = button.up('panel');
                            var field = panel.down('textfield');
                            panel.hide();
                            var value = field.getValue();
                            field.setValue('');
                            me.getApplication().fireEvent(type+'selected', value);
                            this.disable('Viewport', Bancha.t('Loading data...'));
                        },
                        painted: function(button, eOpts) {
                            button.enable();
                        }
                    }
                }]
            }]
        });    
        this.barcodeWin.show();
    },
    
    closeBarcodeWindow: function() {
        this.barcodeWin.hide();
    },

    onLoggedIn: function(userRecord) {
        var me = this;

        // load translations
        Bancha.Localizer.currentLang = userRecord.get('lang');

        // load the checkpoint name
        Bancha.getModel('Checkpoint').load(userRecord.get('shop_checkpoint_pref_id'), {
            failure: function() {
                Ext.Msg.alert(
                    Bancha.t('Error'),
                    Bancha.t('Could not load Checkpoint name'));
            },
            success: function(record, operation) {
                me.setCheckpointTitle(Bancha.t(record.get('name')));
            }
        });

        // load the header and footer panels
        Ext.Viewport.add([
            this.createPanel('widget.main'),
            this.createPanel('widget.footer')
        ]);

        // fire the checkpoint selected to render the checkpoint
        this.getApplication().fireEvent('checkpointselected', parseInt(userRecord.get('shop_checkpoint_pref_id'),10) || 1);

        // force casing selection
        this.promptForCasingBarcode('casing');
    },
    
    onInitialLoadingCompleted: function() {
        this.enable('Viewport');
    },

    onCasingSelected: function() {
        this.barcodeWin.hide();
        this.disable('Viewport', Bancha.t('Loading Data...'));
    },

    onForceCasingSelection: function(type) {
        this.promptForCasingBarcode(type);
        this.enable('Viewport');
    },

    onCheckpointSelected: function(checkpointId) {
        this.active_checkpoint_id = checkpointId;
    },
    
    onShowSupportWin: function(button, e, eOpts) {
        if (!this.supportWin) {            
            var details;
            if (typeof localActions.support === 'function') {
                //For CoreConsole
                details = localActions.support();
            } else {
                //For browser
                details = '{"externalIP": "166.70.206.46", "eth0": {"localIP": "10.1.10.115", "mac": "ac:16:2d:52:84:6d"}}';
            }
            
            //decode response and create final object wrapper
            var detailsObj = Ext.JSON.decode(details), finalWrapper = [];
            
            //function to get object size
            Object.size = function(obj) {
                var size = 0, key;
                for (key in obj) {
                    if (obj.hasOwnProperty(key)) size++;
                }
                return size;
            };
            
            //dynamically build support window items 2 levels deep
            var tempObj, subObj, subWrapper;
            for (var key in detailsObj) {
                if (Object.size(detailsObj[key]) > 0 && detailsObj[key].length == undefined) {
                    subWrapper = [];
                    for (var sKey in detailsObj[key]) {
                        subObj = {
                            xtype:'textfield',
                            readOnly:true,
                            label: Bancha.t(sKey+':'),
                            labelWidth:'40%',
                            value:detailsObj[key][sKey]
                        };
                        subWrapper.push(subObj);
                    }
                    tempObj = {
                        xtype:'fieldset',
                        title:Bancha.t(key),
                        items:subWrapper
                    };
                } else {
                    tempObj = {
                        xtype:'textfield',
                        readOnly:true,
                        label: Bancha.t(key+':'),
                        labelWidth:'40%',
                        style:'border-bottom:1px solid #DDD;',
                        value:detailsObj[key]
                    };
                }
                finalWrapper.push(tempObj);
            }
            
            //push toolbar and close button
            finalWrapper.push({
                docked:'top',
                xtype:'toolbar',
                title: Bancha.t('Support Information')
            },{
                docked:'bottom',
                xtype:'toolbar',
                items:[{
                    xtype: 'spacer'
                },{
                    xtype:'button',
                    text: Bancha.t('Close'),
                    listeners:{
                        tap: function(button, e, eOpts) {
                            button.up('panel').hide();
                        }
                    }
                }]
            });
            
            this.supportWin = Ext.Viewport.add({
                xtype:'panel',
                modal:true,
                hidden:true,
                hideOnMaskTap:true,
                showAnimation: {
                    type:'popIn',
                    duration:300,
                    easing:'ease-out'
                },
                hideAnimation: {
                    type:'popOut',
                    duration:300,
                    easing:'ease-out'
                },
                centered:true,
                scrollable:false,
                width:400,
                items:finalWrapper
            });
        }
        this.supportWin.show();
    },
    
    /**
     * Prompts should by default close on an enter press
     */
    launch: function() {
        
        Ext.Msg.on('show', function(cmp) {

            if(Ext.Msg.getPrompt() === null){
                return; // there is a config object this time
            }

            // every time there os a new prompt config, apply listener

            Ext.Msg.getPrompt().on('keyup', function(field, e) {
                if(e.browserEvent.keyCode===13) {
                    e.stopEvent();

                    // fake a on-button press
                    Ext.Msg.onClick(Ext.Msg.buttonsToolbar.getItems().getByKey('ok'));
                }
            });
        });


        // if there is no global localActions fake it, so the system also runs on desktop browsers
        if(!window.localActions) {
            // this is a fake stub
            localActions = {
                printLabel64: function(str) {
                    Bancha.log.info(['The local action printLabel64 was triggered with following content:',str]);
                }
            };
        }
    },
    
    init: function(application) {
        application.on([
            { event: 'casingloaded', fn: this.onCasingLoaded, scope: this },
            { event: 'treaddesignloaded', fn: this.onTreadDesignLoaded, scope: this },
            { event: 'loadpostcasingmodels', fn: this.onLoadPostCasingModels, scope: this },
            { event: 'loggedin', fn: this.onLoggedIn, scope: this },
            { event: 'casingselected', fn: this.onCasingSelected, scope: this },
            { event: 'forcecasingselection', fn: this.onForceCasingSelection, scope: this },
            { event: 'checkpointselected', fn: this.onCheckpointSelected, scope: this },
            { event: 'initialloadingcompleted', fn: this.onInitialLoadingCompleted, scope: this },
            { event: 'closebarcodewindow', fn: this.closeBarcodeWindow, scope: this }
        ]);
    }
});