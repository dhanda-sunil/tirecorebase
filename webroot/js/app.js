/*jslint browser: true, vars: true, undef: true, nomen: true, eqeq: false, plusplus: true, bitwise: true, regexp: true, newcap: true, sloppy: true, white: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false */
/*global Ext, Bancha, ShopFloor */


Ext.Loader.setConfig({
    enabled: true
});

Ext.application({
    name: 'ShopFloor',
    appFolder: 'js',

    requires: [
        'ShopFloor.view.LoginWindow' // the view config is broken in ExtJS 4.1.1
    ],
    controllers: [
        'Authentification',
        'ManagementPanel'
    ],

    launch: function() {
        // remote api is already loaded, now init
        Bancha.init();

        // create a new viewport
        Ext.create('Ext.container.Viewport', {
            layout: 'border',
            items: [{
                region: 'north',
                ui: 'dark',
                cls: 'x-panel-header',
                html: '<img src="http://www.tcstire.com/images/tcs-logo.gif" width="362" height="57" alt="Tire Power Software by TCS" style="margin-top: 24px;">',
                border: false,
                margins: '0 0 5 0',
                height: 100
            }, {
                region: 'south',
                ui: 'dark',
                html: '<div class="x-panel-footer" style="text-align:right;">&copy; 2012 TirePower. Icons by <a href="http://www.famfamfam.com/lab/icons/silk/" target="_blank">FamFamFam</a>.</div>',
                border: false,
                margins: '5 5 5 5',
                height: 30
            }]
        });
        Ext.widget('loginwindow').show();
    }
});