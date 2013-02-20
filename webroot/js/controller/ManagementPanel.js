/*jslint browser: true, vars: true, undef: true, nomen: true, eqeq: false, plusplus: true, bitwise: true, regexp: true, newcap: true, sloppy: true, white: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false */
/*global Ext, Bancha, ShopFloor */

Ext.define('ShopFloor.controller.ManagementPanel', {
    extend: 'Ext.app.Controller',

    onLoggedIn: function(userRecord) {

        var viewport = Ext.ComponentQuery.query("viewport")[0],
            remotableModels = [],
            tabitems = [],
            tabitem,
            stubs = Bancha.getStubsNamespace();

        // find all exposed models with read capability
        Ext.Object.each(stubs, function(key, val) {
            if(val.read) { // add, if read is exposed
                remotableModels.push(key);
            }
        });

        viewport.setLoading({
            xtype: 'loadmask',
            message: 'Logging in...'
        });

        // wait till the are ready
        Bancha.onModelReady(remotableModels, function(models) {

            // flatten to array
            var namespacedRemotableModels = [];
            Ext.Object.each(models, function(key,value) {
                namespacedRemotableModels.push(value);
            });

            // build viewport
            viewport.add({
                region: 'center',
                xtype: 'managementpanel', // ManagementPanel itself has no title
                models: namespacedRemotableModels,
                scaffoldDefaults: {
                    exclude: ['created', 'modified', 'deleted', 'deleted_by']
                },
                bodyBorder: true,
                frame: true
            });

            viewport.setLoading(false);
            
        }); //eo on model ready
    },

    init: function(/* in ExtJS 4.1 */app) {
        app.on('loggedin', this.onLoggedIn, this);
    }

});