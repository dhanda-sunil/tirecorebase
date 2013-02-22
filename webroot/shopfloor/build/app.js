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


Ext.Loader.setConfig({
    enabled: true
});

Ext.application({
    stores: [
        'RepairEstimates',
        'RepairTypes',
        'TreadDesigns',
        'TreadWidths',
        'Materials',
        'RepairActuals',
        'RepairsList',
        'FinishedGoods',
        'CoItems',
        'CustomerContacts',
        'BuffSpecs'
    ],
    views: [
        'LoginWindow',
        'BuffingCheckpointPanel',
        'InitialInspectionCheckpointPanel',
        'MainLeftEditPanel',
        'TireFailScreen',
        'FailReadonButton',
        'ComponentListView',
        'DotSerialField',
        'DotTextField',
        'RepairCheckpointPanel',
        'BuildCheckpointPanel',
        'FinalInspectionCheckpointPanel'
    ],
    name: 'ShopFloor',
    controllers: [
        'keyboard.Controller',
        'Authentication',
        'AppController',
        'User',
        'Casing',
        'Manufacturer',
        'Customer',
        'Location',
        'Checkpoint',
        'TireSize',
        'TreadDesign',
        'MoldType',
        'BuffSpec',
        'CoItem',
        'Co',
        'MainLeftSidePanel',
        'CustomerAlert',
        'FailProcess',
        'InitialInspection',
        'DotSerial',
        'ManufacturerPlant',
        'ManufacturerProductLine',
        'BuffingCheckpoint',
        'RepairCheckpoint',
        'BuildCheckpoint',
        'FinalInspection',
        'Gestures'
    ],

    launch: function() {
        Ext.Viewport.add(Ext.create('ShopFloor.view.LoginWindow'));
    }

});
