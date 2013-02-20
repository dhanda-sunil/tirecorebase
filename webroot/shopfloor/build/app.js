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
    enabled: true,
    paths: {
        'Bancha.Main': '/Bancha/js/Bancha-dev.js', 
        'Bancha.REMOTE_API': '/bancha-api-class/models/all.js' // this will only be used in the debug version, the production version will be shipped packaged version
    }
});

Ext.application({
    requires: [
        'Bancha.Main',
        'Bancha.REMOTE_API',
        'ShopFloor.ErrorHandler',
        'ShopFloor.field.override.Select'
    ],
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
