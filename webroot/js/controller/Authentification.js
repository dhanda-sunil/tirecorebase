/*jslint browser: true, vars: true, undef: true, nomen: true, eqeq: false, plusplus: true, bitwise: true, regexp: true, newcap: true, sloppy: true, white: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false */
/*global Ext, Bancha, ShopFloor */

Ext.define('ShopFloor.controller.Authentification', {
    extend: 'Ext.app.Controller',




    /****** For Sencha Touch 2.0 use this *********
    config: {
        refs: {
            loginWindow: '#loginwindow',
            loginForm: 'loginwindow formpanel'
        },
        control: {
            "loginwindow button[action=login]": {
                release: 'onLoginClick',
                click: 'onLoginClick'
            },
            "button[action=logout]": {
                release: 'onLogoutClick'
            }
        }
    }, */
    /****** For ExtJS 4.1 use this ********* */
    refs: [
        {
            ref: 'loginWindow',
            selector: 'loginwindow'
        }, {
            ref: 'loginForm',
            selector: 'loginwindow form'
        }
    ],
    init: function(/* in ExtJS */app) {
        // ExtJS control setup
        this.control({
            "loginwindow button[action=login]": {
                click: this.onLoginClick
            },
            "button[action=logout]": {
                click: this.onLogoutClick
            }
        });
    },
    // make ExtJS also support the application getter
    getApplication: function() {
        return this.application;
    },
    /****** End of ExtJS/Touch specific code ********* */



    maskLoginWindow: function(win, /* false to unmask */msg) {
        // a small abstraction layer for Sencha Touch and ExtJS
        if(Ext.versions.extjs) {
            win.setLoading(msg);
        } else if(msg === false) {
            win.setMasked(false);
        } else {
            win.mask({
                xtype: 'loadmask',
                message: msg
            });
        }
    },

    onLoginClick: function(button, e, options) {

        var me = this, // keep reference to controller and window through scope
            win = me.getLoginWindow(),
            values = me.getLoginForm().getValues();

        // mask while asking the server
        this.maskLoginWindow(win, 'Logging in...');

        // login through the banchaRemotable method UsersController->login
        Bancha.getStub('User').login(values, function(result,response) {

            if(result && result.success===true) {
                // we are logged in, so hide login window
                win.hide();

                // tell application about login
                var user = Ext.create(Bancha.getModel('User').getName(), result.data);
                me.getApplication().fireEvent('loggedin', user);

                // error handling
            } else if(result && result.success===false) {
                Ext.Msg.alert('Login Failed!', 'Username and password don\'t match!');
                me.maskLoginWindow(win, false);
            } else {
                Ext.Msg.alert('Warning!', 'Authentication server is unreachable or returned with an error');
                me.maskLoginWindow(win, false);
            }
        });

    },

    onLogoutClick: function(button, e, options) {

        // mask for user
        this.maskLoginWindow(Ext.Viewport, 'logging out...');

        // logout
        Bancha.getStub('User').logout(function() {
            // user is logged out
            window.location.reload();
        });
    },

    // in ExtJS this is called onLaunch
    onLaunch: function() {
        return this.launch.apply(this,arguments);
    },
    // ... in Sencha Touch launch
    launch: function() {
        var win = this.getLoginWindow(),
            me = this;

        // mask while asking the server
        this.maskLoginWindow(win, 'Loading...');

        // ask server if already logged in
        var app = this.getApplication();
        Bancha.getStub('User').login({}, function(result,response) {
            if(result && result.success) {
                // we are logged in, so hide login window
                win.hide();

                var user = Ext.create(Bancha.getModel('User').getName(), result.data);
                app.fireEvent('loggedin', user);
            } else {
                me.maskLoginWindow(win, false);
            }
        });

        // otherwise the user will be forced to login
    }

});