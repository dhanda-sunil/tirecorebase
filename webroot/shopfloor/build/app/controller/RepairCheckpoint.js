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

Ext.define('ShopFloor.controller.RepairCheckpoint', {
    extend: 'Ext.app.Controller',
    mixins: {
        viewController: 'ShopFloor.controller.mixin.ViewController'
    },
    config: {
        refs: {
           repairGrid: 'repaircheckpointgrid'
        },
        control: {
            "#objRepairTireWrapper": {
                painted: 'onRepairTirePainted'
            }
        }
    },
    onRepairTirePainted: function(wrapper, eOpts) {
        var me=this;
        this.origDimensions = [300, 283];
        var svg = document.getElementById("objRepairTire");
        svg.addEventListener("load",function(){
            var svgDoc = svg.contentDocument;
            var LayerCrownButton = svgDoc.getElementById("LayerCrownButton");
            var LayerShoulderButton = svgDoc.getElementById("LayerShoulderButton");
            var LayerSidewallButton = svgDoc.getElementById("LayerSidewallButton");
            var LayerBeadButton = svgDoc.getElementById("LayerBeadButton");
            LayerCrownButton.addEventListener("mousedown",function(evt){
                me.crownButtonClick();
            },false);
            LayerShoulderButton.addEventListener("mousedown",function(evt){
                me.shoulderButtonClick();
            },false);
            LayerSidewallButton.addEventListener("mousedown",function(evt){
                me.sidewallButtonClick();
            },false);
            LayerBeadButton.addEventListener("mousedown",function(evt){
                me.beadButtonClick();
            },false);
        },false);
        
        var height = this.getMainHeight();
        var width = this.calcSvgWidth(height);
        
        wrapper.setHeight(height);
        wrapper.setWidth(width);
        svg.setAttribute("height", (height-parseInt(Ext.getCmp('objRepairTireWrapper').getPadding()*2, 10)));
        svg.setAttribute("width", (width-parseInt(Ext.getCmp('objRepairTireWrapper').getPadding()*2, 10)));
        
        this.loadMaterialsStore();
        this.generateLocationWindows();
    },
    loadMaterialsStore: function() {
        var store = Ext.StoreManager.get('Materials');
        store.on('load', function(store, records, successful, operation, eOpts ) {
            this.generateRepairGrid(records);
        }, this, { single: true});
        store.load();
    },
    generateRepairGrid: function(records) {
        if(!this.gridRendered) {
            this.gridRendered=true;
            var component = [],
                subitem,
                border;
            //build grid based on material list
            for (var i=0;i<records.length;i++) {
                if (i === (records.length-1)) {
                    //last row set proper border style
                    border = 'border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;';
                } else {
                    border = 'border-left:1px solid #666; border-top:1px solid #666;';
                }
                //add our header row first
                if (i === 0) {
                    subitem = {
                        xtype:'container',
                        height:24,
                        layout:'hbox',
                        items:[{
                            xtype:'container',
                            flex:1,
                            style:'text-align:center;',
                            html:'<strong>'+Bancha.t('SIZE')+'</strong>'
                        },{
                            xtype:'container',
                            flex:1,
                            style:'text-align:center;',
                            html:'<strong>'+Bancha.t('CROWN')+'</strong>'
                        },{
                            xtype:'container',
                            flex:1,
                            style:'text-align:center;',
                            html:'<strong>'+Bancha.t('SHOULDER')+'</strong>'
                        },{
                            xtype:'container',
                            flex:1,
                            style:'text-align:center;',
                            html:'<strong>'+Bancha.t('SIDEWALL')+'</strong>'
                        },{
                            xtype:'container',
                            flex:1,
                            style:'text-align:center;',
                            html:'<strong>'+Bancha.t('BEAD')+'</strong>'
                        }]
                    };
                    component.push(subitem);
                }
                //dynamic row
                subitem = {
                    xtype:'container',
                    layout:'hbox',
                    height:45,
                    items:[{
                        xtype:'textfield',
                        flex:1,
                        cls:'field-centered-dark',
                        style:border,
                        readOnly:true,
                        name:'size_'+records[i].data.id,
                        value:records[i].data.name
                    },{
                        xtype:'numberfield',
                        flex:1,
                        cls:'field-centered',
                        style:border,
                        readOnly:true,
                        disabled:true,
                        name:'crown_'+records[i].data.id,
                        value:0
                    },{
                        xtype:'numberfield',
                        flex:1,
                        cls:'field-centered',
                        style:border,
                        readOnly:true,
                        disabled:true,
                        name:'shoulder_'+records[i].data.id,
                        value:0
                    },{
                        xtype:'numberfield',
                        flex:1,
                        cls:'field-centered',
                        style:border,
                        readOnly:true,
                        disabled:true,
                        name:'sidewall_'+records[i].data.id,
                        value:0
                    },{
                        xtype:'numberfield',
                        flex:1,
                        cls:'field-centered',
                        style:border+' border-right:1px solid #666;',
                        readOnly:true,
                        disabled:true,
                        name:'bead_'+records[i].data.id,
                        value:0
                    }]
                };
                component.push(subitem);
            }        
            //get the top container
            var topContainer = this.generateTopContainer();
            //add top items
            this.getRepairGrid().add(topContainer);
            //add the dynamic materials list    
            this.getRepairGrid().add(component);
            //generate the bottom items
            var botContainer = this.generateBottomContainer();
            //add bottom items
            this.getRepairGrid().add(botContainer);
            //active allowed materials
            this.activateAllowedItems(records);
            //set previous values from initial inspection screen
            this.setAdditionalValues();
        } else {
            /*
            repairgrid has already been loaded, however, user may have changed values on initial inspection
            that affect this view, so redo the values and now add calcs from the grid
            */
            this.setAdditionalValues();
            this.doColumnCalculations();
        }
        //enable viewport after all processing is completed
        this.enable('Viewport');
    },
    generateTopContainer: function() {
        var subitems = [];
        var subitem1 = {
            //row 1
            xtype:'container',
            height:24,
            layout:'hbox',
            items:[{
                xtype:'container',
                flex:1,
                html:''
            },{
                xtype:'container',
                flex:1,
                style:'text-align:center;',
                html:'<strong>'+Bancha.t('CROWN')+'</strong>'
            },{
                xtype:'container',
                flex:1,
                style:'text-align:center;',
                html:'<strong>'+Bancha.t('SHOULDER')+'</strong>'
            },{
                xtype:'container',
                flex:1,
                style:'text-align:center;',
                html:'<strong>'+Bancha.t('SIDEWALL')+'</strong>'
            },{
                xtype:'container',
                flex:1,
                style:'text-align:center;',
                html:'<strong>'+Bancha.t('BEAD')+'</strong>'
            }]
        };
        subitems.push(subitem1);
        var subitem2 = {
            xtype:'container',
            height:45,
            layout:'hbox',
            items:[{
                xtype:'container',
                flex:1,
                style:'background-color:#f1f1f1; padding-left:6px; border-bottom:1px solid #f1f1f1;',
                html:'<div style="height:45px; line-height:45px; text-algin:right !important;">'+Bancha.t('PREVIOUS')+'</div>'
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'previous_crown_repair',
                    value:0
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'previous_shoulder_repair',
                    value:0
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'previous_sidewall_repair',
                    value:0
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-right:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'previous_bead_repair',
                    value:0
                }]
            }]
        };
        subitems.push(subitem2);
        var subitem3 = {
            xtype:'container',
            height:45,
            layout:'hbox',
            items:[{
                xtype:'container',
                flex:1,
                style:'background-color:#f1f1f1; border-top:1px solid #666; padding-left:6px; border-bottom:1px solid #f1f1f1;',
                html:'<div style="height:45px; line-height:45px; text-algin:right !important;">'+Bancha.t('REQUIRED')+'</div>'
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'required_crown_repair',
                    value:0
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'required_shoulder_repair',
                    value:0
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'required_sidewall_repair',
                    value:0
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-right:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'required_bead_repair',
                    value:0
                }]
            }]
        };
        subitems.push(subitem3);
        var subitem4 = {
            xtype:'container',
            height:45,
            margin:'0 0 10 0',
            layout:'hbox',
            items:[{
                xtype:'container',
                flex:1,
                style:'background-color:#f1f1f1; border-top:1px solid #666; padding-left:6px; border-bottom:1px solid #f1f1f1;',
                html:'<div style="height:45px; line-height:45px; text-algin:right !important;">'+Bancha.t('TOTAL')+'</div>'
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'initial_total_crown_repair',
                    value:0
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'initial_total_shoulder_repair',
                    value:0
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'initial_total_sidewall_repair',
                    value:0
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-right:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'initial_total_bead_repair',
                    value:0
                }]
            }]
        };
        subitems.push(subitem4);
        return subitems;
    },
    generateBottomContainer: function() {
        var subitems = [];
        var subitem1 = {
            xtype:'container',
            margin:'10 0 10 0',
            layout:'hbox',
            height:45,
            items:[{
                xtype:'container',
                flex:1,
                style:'background-color:#f1f1f1; padding-left:6px;',
                html:'<div style="height:45px; line-height:45px; text-algin:right !important;">'+Bancha.t('TOTAL')+'</div>'
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    value:0,
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'total_crown_repair'
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    value:0,
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'total_shoulder_repair'
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    value:0,
                    readOnly:true,
                    cls:'field-centered-dark',
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                    name:'total_sidewall_repair'
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    value:0,
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;  border-right:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'total_bead_repair'
                }]
            }]
        };
        subitems.push(subitem1);
        var subitem2 = {
            xtype:'container',
            layout:'hbox',
            height:45,
            items:[{
                xtype:'container',
                flex:1,
                style:'background-color:#f1f1f1; padding-left:6px;',
                html:'<div style="height:45px; line-height:45px; text-algin:right !important;">'+Bancha.t('LIMITS')+'</div>'
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    value:ShopFloor.customerPrefs.crown.value,
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'profile_crown_repair'
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    value:ShopFloor.customerPrefs.shoulder.value,
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'profile_shoulder_repair'
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    value:ShopFloor.customerPrefs.sidewall.value,
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'profile_sidewall_repair'
                }]
            },{
                xtype:'container',
                flex:1,
                items:[{
                    xtype:'numberfield',
                    value:ShopFloor.customerPrefs.bead.value,
                    readOnly:true,
                    style:'background-color:#FFFFFF; border-left:1px solid #666; border-top:1px solid #666; border-bottom:1px solid #666;  border-right:1px solid #666;',
                    cls:'field-centered-dark',
                    name:'profile_bead_repair'
                }]
            }]
        };
        subitems.push(subitem2);
        return subitems;
    },
    activateAllowedItems: function(materials) {
        var items = ShopFloor.customerPrefs.dynamic;
        //set initial store data values
        var crownPatchData = [],
            shoulderPatchData = [],
            sidewallPatchData = [],
            beadPatchData = [],
            key,
            dataItem;
        var materialStore = Ext.StoreManager.get('Materials');
        for (var i=0;i<items.length;i++) {
            switch(parseInt(items[i].patch_location_id, 10)) {
                case 1:
                    //bead
                    key = materialStore.find('id',items[i].material_id);
                    dataItem = materialStore.getAt(key);
                    beadPatchData.push(dataItem.data);
                    this.getRepairGrid().down('field[name=bead_'+items[i].material_id+']').enable();
                    break;
                case 2:
                    //crown
                    key = materialStore.find('id',items[i].material_id);
                    dataItem = materialStore.getAt(key);
                    crownPatchData.push(dataItem.data);
                    this.getRepairGrid().down('field[name=crown_'+items[i].material_id+']').enable();
                    break;
                case 4:
                    //shoulder
                    key = materialStore.find('id',items[i].material_id);
                    dataItem = materialStore.getAt(key);
                    shoulderPatchData.push(dataItem.data);
                    this.getRepairGrid().down('field[name=shoulder_'+items[i].material_id+']').enable();
                    break;
                case 5:
                    //sidewall
                    key = materialStore.find('id',items[i].material_id);
                    dataItem = materialStore.getAt(key);
                    sidewallPatchData.push(dataItem.data);
                    this.getRepairGrid().down('field[name=sidewall_'+items[i].material_id+']').enable();
                    break;
                default:
                    // just ignore others
                    // Ext.Error.raise({msg: 'Could not recognize material with id '+items[i].patch_location_id});
            }
        }
        //create our stores for each patch item (for canvas buttons)
        this.createCrownPatchStore(crownPatchData);
        this.createShoulderPatchStore(shoulderPatchData);
        this.createSidewallPatchStore(sidewallPatchData);
        this.createBeadPatchStore(beadPatchData);
    },
    createCrownPatchStore: function(data) {
        if (!this.crownPatchStore) {
            this.crownPatchStore = Ext.create('Ext.data.Store', {
                fields: ['id', 'uom_id', 'material_type_id', 'vendor_item_id', 'repair_type_id', 'name', 'part_number', 'manf_part_number', 'tread_width_id', 'tread_width_uom_id', 'dot_code', 'density', 'tread_design_id'],
                sorters: 'name',
                data: data
            });
        }
    },
    createShoulderPatchStore: function(data) {
        if (!this.shoulderPatchStore) {
            this.shoulderPatchStore = Ext.create('Ext.data.Store', {
                fields: ['id', 'uom_id', 'material_type_id', 'vendor_item_id', 'repair_type_id', 'name', 'part_number', 'manf_part_number', 'tread_width_id', 'tread_width_uom_id', 'dot_code', 'density', 'tread_design_id'],
                sorters: 'name',
                data: data
            });
        }
    },
    createSidewallPatchStore: function(data) {
        if (!this.sidewallPatchStore) {
            this.sidewallPatchStore = Ext.create('Ext.data.Store', {
                fields: ['id', 'uom_id', 'material_type_id', 'vendor_item_id', 'repair_type_id', 'name', 'part_number', 'manf_part_number', 'tread_width_id', 'tread_width_uom_id', 'dot_code', 'density', 'tread_design_id'],
                sorters: 'name',
                data: data
            });
        }
    },
    createBeadPatchStore: function(data) {
        if (!this.beadPatchStore) {
            this.beadPatchStore = Ext.create('Ext.data.Store', {
                fields: ['id', 'uom_id', 'material_type_id', 'vendor_item_id', 'repair_type_id', 'name', 'part_number', 'manf_part_number', 'tread_width_id', 'tread_width_uom_id', 'dot_code', 'density', 'tread_design_id'],
                sorters: 'name',
                data: data
            });
        }
    },
    setAdditionalValues: function() {
        //get values from initial inspection screen
        var previous_crown = Ext.ComponentQuery.query('numberfield[name=previous_crown]')[0].getValue();
        var previous_shoulder = Ext.ComponentQuery.query('numberfield[name=previous_shoulder]')[0].getValue();
        var previous_sidewall = Ext.ComponentQuery.query('numberfield[name=previous_sidewall]')[0].getValue();
        var previous_bead = Ext.ComponentQuery.query('numberfield[name=previous_bead]')[0].getValue();
        
        var required_crown = Ext.ComponentQuery.query('numberfield[name=required_crown]')[0].getValue();
        var required_shoulder = Ext.ComponentQuery.query('numberfield[name=required_shoulder]')[0].getValue();
        var required_sidewall = Ext.ComponentQuery.query('numberfield[name=required_sidewall]')[0].getValue();
        var required_bead = Ext.ComponentQuery.query('numberfield[name=required_bead]')[0].getValue();
        
        this.total_crown = Ext.ComponentQuery.query('numberfield[name=total_crown]')[0].getValue();
        this.total_shoulder = Ext.ComponentQuery.query('numberfield[name=total_shoulder]')[0].getValue();
        this.total_sidewall = Ext.ComponentQuery.query('numberfield[name=total_sidewall]')[0].getValue();
        this.total_bead = Ext.ComponentQuery.query('numberfield[name=total_bead]')[0].getValue();
        
        //set values in repair screen
        Ext.ComponentQuery.query('numberfield[name=previous_crown_repair]')[0].setValue(previous_crown);
        Ext.ComponentQuery.query('numberfield[name=previous_shoulder_repair]')[0].setValue(previous_shoulder);
        Ext.ComponentQuery.query('numberfield[name=previous_sidewall_repair]')[0].setValue(previous_sidewall);
        Ext.ComponentQuery.query('numberfield[name=previous_bead_repair]')[0].setValue(previous_bead);
        
        Ext.ComponentQuery.query('numberfield[name=required_crown_repair]')[0].setValue(required_crown);
        Ext.ComponentQuery.query('numberfield[name=required_shoulder_repair]')[0].setValue(required_shoulder);
        Ext.ComponentQuery.query('numberfield[name=required_sidewall_repair]')[0].setValue(required_sidewall);
        Ext.ComponentQuery.query('numberfield[name=required_bead_repair]')[0].setValue(required_bead);
        
        Ext.ComponentQuery.query('numberfield[name=initial_total_crown_repair]')[0].setValue(this.total_crown);
        Ext.ComponentQuery.query('numberfield[name=initial_total_shoulder_repair]')[0].setValue(this.total_shoulder);
        Ext.ComponentQuery.query('numberfield[name=initial_total_sidewall_repair]')[0].setValue(this.total_sidewall);
        Ext.ComponentQuery.query('numberfield[name=initial_total_bead_repair]')[0].setValue(this.total_bead);
        
        var crownTotalField = Ext.ComponentQuery.query('numberfield[name=total_crown_repair]')[0];
        var shoulderTotalField = Ext.ComponentQuery.query('numberfield[name=total_shoulder_repair]')[0];
        var sidewallTotalField = Ext.ComponentQuery.query('numberfield[name=total_sidewall_repair]')[0];
        var beadTotalField = Ext.ComponentQuery.query('numberfield[name=total_bead_repair]')[0];
        
        //set new values based on initial inspection
        crownTotalField.setValue(previous_crown);
        shoulderTotalField.setValue(previous_shoulder);
        sidewallTotalField.setValue(previous_sidewall);
        beadTotalField.setValue(previous_bead);
        
        Ext.Viewport.fireEvent('repairtotalchange', crownTotalField, this.total_crown);
        Ext.Viewport.fireEvent('repairtotalchange', shoulderTotalField, this.total_shoulder);
        Ext.Viewport.fireEvent('repairtotalchange', sidewallTotalField, this.total_sidewall);
        Ext.Viewport.fireEvent('repairtotalchange', beadTotalField, this.total_bead);
    },
    doColumnCalculations: function() {
        var items = ShopFloor.customerPrefs.dynamic, crownVal=0, shoulderVal=0, sidewallVal=0, beadVal=0;
        for (var i=0;i<items.length;i++) {
            if (items[i].patch_location_id == 1) {
                //bead
                beadVal=beadVal+this.getRepairGrid().down('field[name=bead_'+items[i].material_id+']').getValue();
            } else if (items[i].patch_location_id == 2) {
                //crown
                crownVal=crownVal+this.getRepairGrid().down('field[name=crown_'+items[i].material_id+']').getValue();
            } else if (items[i].patch_location_id == 4) {
                //shoulder
                shoulderVal=shoulderVal+this.getRepairGrid().down('field[name=shoulder_'+items[i].material_id+']').getValue();
            } else if (items[i].patch_location_id == 5) {
                //sidewall
                sidewallVal=sidewallVal+this.getRepairGrid().down('field[name=sidewall_'+items[i].material_id+']').getValue();
            }
        }
        //get the total fields
        var crownTotalField = Ext.ComponentQuery.query('numberfield[name=total_crown_repair]')[0];
        var shoulderTotalField = Ext.ComponentQuery.query('numberfield[name=total_shoulder_repair]')[0];
        var sidewallTotalField = Ext.ComponentQuery.query('numberfield[name=total_sidewall_repair]')[0];
        var beadTotalField = Ext.ComponentQuery.query('numberfield[name=total_bead_repair]')[0];
        //set new values based on dynamic components
        crownTotalField.setValue(crownTotalField.getValue()+crownVal);
        shoulderTotalField.setValue(shoulderTotalField.getValue()+shoulderVal);
        sidewallTotalField.setValue(sidewallTotalField.getValue()+sidewallVal);
        beadTotalField.setValue(beadTotalField.getValue()+beadVal);
        
        Ext.Viewport.fireEvent('repairtotalchange', crownTotalField, this.total_crown);
        Ext.Viewport.fireEvent('repairtotalchange', shoulderTotalField, this.total_shoulder);
        Ext.Viewport.fireEvent('repairtotalchange', sidewallTotalField, this.total_sidewall);
        Ext.Viewport.fireEvent('repairtotalchange', beadTotalField, this.total_bead);
    },
    getMainHeight: function() {
        var viewportHeight = window.innerHeight || document.body.clientHeight;
        return viewportHeight-(Ext.Viewport.down('header').getHeight()+Ext.Viewport.down('footer').getHeight());
    },
    calcSvgWidth: function(height) {
        var multiplier = this.origDimensions[0]/this.origDimensions[1];
        return Math.ceil(height*multiplier);
    },
    generateLocationWindows: function() {
        if (!this.crownPatchWin) {
            this.crownPatchWin = Ext.Viewport.add({
                xtype:'panel',
                hidden:true,
                modal:true,
                hideOnMaskTap:true,
                centered:true,
                scrollable:false,
                width:600,
                height:400,
                layout: 'fit'
            });
        }
        if (!this.shoulderPatchWin) {
            this.shoulderPatchWin = Ext.Viewport.add({
                xtype:'panel',
                hidden:true,
                modal:true,
                hideOnMaskTap:true,
                centered:true,
                scrollable:false,
                width:600,
                height:400,
                layout: 'fit'
            });
        }
        if (!this.sidewallPatchWin) {
            this.sidewallPatchWin = Ext.Viewport.add({
                xtype:'panel',
                hidden:true,
                modal:true,
                hideOnMaskTap:true,
                centered:true,
                scrollable:false,
                width:600,
                height:400,
                layout: 'fit'
            });
        }
        if (!this.beadPatchWin) {
            this.beadPatchWin = Ext.Viewport.add({
                xtype:'panel',
                hidden:true,
                modal:true,
                hideOnMaskTap:true,
                centered:true,
                scrollable:false,
                width:600,
                height:400,
                layout: 'fit'
            });
        }
    },
    crownButtonClick: function() {
        if (!this.crownPatchList) {
            this.crownPatchList = {
                xtype: 'list',
                ui: 'round',
                pinHeaders: false,
                itemTpl: '<div><strong>{name}</strong></div>',
                store: this.crownPatchStore,
                grouped: false,
                emptyText: '<div style="margin-top: 20px; text-align: center">'+Bancha.t('No Matching Items')+'</div>',
                listeners: {
                    scope: this,
                    select: this.crownPatchSelect
                },
                items: [{
                    xtype: 'toolbar',
                    docked: 'top',
                    title: Bancha.t('Crown Repair Patches')
                }]
            };
            this.crownPatchWin.add(this.crownPatchList);
        }
        this.crownPatchWin.show();
    },
    crownPatchSelect: function(list, record, eOpts) {
        var panel = list.up('panel');
        var field = this.getRepairGrid().down('field[name=crown_'+record.data.id+']');
        //set the new value on the dynamic field
        field.setValue(field.getValue()+1);
        //get the previous repair value
        var prevVal = Ext.ComponentQuery.query('numberfield[name=previous_crown_repair]')[0].getValue();
        //set the total value
        var totalField = Ext.ComponentQuery.query('numberfield[name=total_crown_repair]')[0];
        totalField.setValue(field.getValue()+prevVal);
        Ext.Viewport.fireEvent('repairtotalchange', totalField, this.total_crown);
        list.deselectAll();
        panel.hide();
    },
    shoulderButtonClick: function() {
        if (!this.shoulderPatchList) {
            this.shoulderPatchList = Ext.Viewport.add({
                xtype: 'list',
                ui: 'round',
                pinHeaders: false,
                itemTpl: '<div><strong>{name}</strong></div>',
                store: this.shoulderPatchStore,
                grouped: false,
                emptyText: '<div style="margin-top: 20px; text-align: center">'+Bancha.t('No Matching Items')+'</div>',
                listeners: {
                    scope: this,
                    select: this.shoulderPatchSelect
                },
                items: [{
                    xtype: 'toolbar',
                    docked: 'top',
                    title: Bancha.t('Shoulder Repair Patches')
                }]
            });
            this.shoulderPatchWin.add(this.shoulderPatchList);
        }
        this.shoulderPatchWin.show();
    },
    shoulderPatchSelect: function(list, record, eOpts) {
        var panel = list.up('panel');
        var field = this.getRepairGrid().down('field[name=shoulder_'+record.data.id+']');
        //set the new value on the dynamic field
        field.setValue(field.getValue()+1);
        //get the previous repair value
        var prevVal = Ext.ComponentQuery.query('numberfield[name=previous_shoulder_repair]')[0].getValue();
        //set the total value
        var totalField = Ext.ComponentQuery.query('numberfield[name=total_shoulder_repair]')[0];
        totalField.setValue(field.getValue()+prevVal);
        Ext.Viewport.fireEvent('repairtotalchange', totalField, this.total_shoulder);
        list.deselectAll();
        panel.hide();
    },
    sidewallButtonClick: function() {
        if (!this.sidewallPatchList) {
            this.sidewallPatchList = Ext.Viewport.add({
                xtype: 'list',
                ui: 'round',
                pinHeaders: false,
                itemTpl: '<div><strong>{name}</strong></div>',
                store: this.sidewallPatchStore,
                grouped: false,
                emptyText: '<div style="margin-top: 20px; text-align: center">'+Bancha.t('No Matching Items')+'</div>',
                listeners: {
                    scope: this,
                    select: this.sidewallPatchSelect
                },
                items: [{
                    xtype: 'toolbar',
                    docked: 'top',
                    title: Bancha.t('Sidewall Repair Patches')
                }]
            });
            this.sidewallPatchWin.add(this.sidewallPatchList);
        }
        this.sidewallPatchWin.show();
    },
    sidewallPatchSelect: function(list, record, eOpts) {
        var panel = list.up('panel');
        var field = this.getRepairGrid().down('field[name=sidewall_'+record.data.id+']');
        //set the new value on the dynamic field
        field.setValue(field.getValue()+1);
        //get the previous repair value
        var prevVal = Ext.ComponentQuery.query('numberfield[name=previous_sidewall_repair]')[0].getValue();
        //set the total value
        var totalField = Ext.ComponentQuery.query('numberfield[name=total_sidewall_repair]')[0];
        totalField.setValue(field.getValue()+prevVal);
        Ext.Viewport.fireEvent('repairtotalchange', totalField, this.total_sidewall);
        list.deselectAll();
        panel.hide();    
    },
    beadButtonClick: function() {
        if (!this.beadPatchList) {
            this.beadPatchList = Ext.Viewport.add({
                xtype: 'list',
                ui: 'round',
                pinHeaders: false,
                itemTpl: '<div><strong>{name}</strong></div>',
                store: this.beadPatchStore,
                grouped: false,
                emptyText: '<div style="margin-top: 20px; text-align: center">'+Bancha.t('No Matching Items')+'</div>',
                listeners: {
                    scope: this,
                    select: this.beadPatchSelect
                },
                items: [{
                    xtype: 'toolbar',
                    docked: 'top',
                    title: Bancha.t('Bead Repair Patches')
                }]
            });
            this.beadPatchWin.add(this.beadPatchList);
        }
        this.beadPatchWin.show();
    },
    beadPatchSelect: function(list, record, eOpts) {
        var panel = list.up('panel');
        var field = this.getRepairGrid().down('field[name=bead_'+record.data.id+']');
        //set the new value on the dynamic field
        field.setValue(field.getValue()+1);
        //get the previous repair value
        var prevVal = Ext.ComponentQuery.query('numberfield[name=previous_bead_repair]')[0].getValue();
        //set the total value
        var totalField = Ext.ComponentQuery.query('numberfield[name=total_bead_repair]')[0];
        totalField.setValue(field.getValue()+prevVal);
        Ext.Viewport.fireEvent('repairtotalchange', totalField, this.total_bead);
        list.deselectAll();
        panel.hide();    
    },
    onRepairTotalChange: function(field, reqVal) {
        var crownVal = parseInt(ShopFloor.customerPrefs.crown.value, 10),
            shoulderVal = parseInt(ShopFloor.customerPrefs.shoulder.value, 10),
            sidewallVal = parseInt(ShopFloor.customerPrefs.sidewall.value, 10),
            beadVal = parseInt(ShopFloor.customerPrefs.bead.value, 10);
        
        if (field.getName() === 'total_crown_repair') {
            if (field.getValue() == reqVal) {
                field.addCls('green-cell');
                field.removeCls('yellow-cell');
                field.removeCls('red-cell');
            } else if (field.getValue() > crownVal) {
                field.addCls('red-cell');
                field.removeCls('yellow-cell');
                field.removeCls('green-cell');
            } else if (field.getValue() < reqVal) {
                field.addCls('yellow-cell');
                field.removeCls('green-cell');
                field.removeCls('red-cell');
            }
        }
        if (field.getName() === 'total_shoulder_repair') {
            if (field.getValue() == reqVal) {
                field.addCls('green-cell');
                field.removeCls('yellow-cell');
                field.removeCls('red-cell');
            } else if (field.getValue() > shoulderVal) {
                field.addCls('red-cell');
                field.removeCls('yellow-cell');
                field.removeCls('green-cell');
            } else if (field.getValue() < reqVal) {
                field.addCls('yellow-cell');
                field.removeCls('green-cell');
                field.removeCls('red-cell');
            }
        }
        if (field.getName() === 'total_sidewall_repair') {
            if (field.getValue() == reqVal) {
                field.addCls('green-cell');
                field.removeCls('yellow-cell');
                field.removeCls('red-cell');
            } else if (field.getValue() > sidewallVal) {
                field.addCls('red-cell');
                field.removeCls('yellow-cell');
                field.removeCls('green-cell');
            } else if (field.getValue() < reqVal) {
                field.addCls('yellow-cell');
                field.removeCls('green-cell');
                field.removeCls('red-cell');
            }
        }
        if (field.getName() === 'total_bead_repair') {
            if (field.getValue() == reqVal) {
                field.addCls('green-cell');
                field.removeCls('yellow-cell');
                field.removeCls('red-cell');
            } else if (field.getValue() > beadVal) {
                field.addCls('red-cell');
                field.removeCls('yellow-cell');
                field.removeCls('green-cell');
            } else if (field.getValue() < reqVal) {
                field.addCls('yellow-cell');
                field.removeCls('green-cell');
                field.removeCls('red-cell');
            }
        }
    },
    init: function(app) {
        Ext.Viewport.on([
            { event: 'repairtotalchange', fn: this.onRepairTotalChange, scope: this }
        ]);
    }
});