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

Ext.define('ShopFloor.controller.Authentication', {
    extend: 'Ext.app.Controller',

    mixins: {
        viewController: 'ShopFloor.controller.mixin.ViewController'
    },

    config: {
        refs: {
            loginWindow: 'loginwindow',
            loginForm: 'loginwindow formpanel'
        },

        control: {
            "loginwindow textfield": {
                keyup: 'onLoginInputEnter'
            },
            "loginwindow button[action=login]": {
                release: 'onLoginClick'
            },
            "button[action=logout]": {
                release: 'onLogoutClick'
            }
        }
    },
    
    /**
     * When the user presses enter this should be handled like a login click
     */
    onLoginInputEnter: function(textfield, e, options) {

        if(e.browserEvent.keyCode===13) {
            // user pressed enter
            e.stopEvent();
            this.onLoginClick();
        }
    },

    onLoginClick: function(button, e, options) {

        var me = this, // keep reference to controller and window through scope
        win = me.getLoginWindow(), 
        values = me.getLoginForm().getValues();

        // mask while asking hte server
        win.mask({
            xtype: 'loadmask',
            message: Bancha.t('Logging in...')
        });

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
                Ext.Msg.alert(
                    Bancha.t('Login Failed!'),
                    Bancha.t('Username and password don\'t match!'));
                win.setMasked(false);
            } else {
                Ext.Msg.alert(
                    Bancha.t('Warning!'),
                    Bancha.t('Authentication server is unreachable or returned with an error'));
                win.setMasked(false);
            }
        });

    },

    onLogoutClick: function(button, e, options) {

        // mask for user
        Ext.Viewport.mask({
            xtype: 'loadmask',
            message: Bancha.t('Logging out...')
        });

        // logout
        Bancha.getStub('User').logout(function() {
            // user is logged out
            window.location.reload();
        });
    },

    onLoggedin: function(userRecord) {

        // remove the login window
        Ext.Viewport.remove(this.getLoginWindow());
    },

    launch: function() {

        var me = this,
            win = this.getLoginWindow();

        // mask while asking the server
        win.mask({
            xtype: 'loadmask',
            message: Bancha.t('Loading...')
        });

        // ask server if already logged in
        Bancha.getStub('User').login({}, function(result,response) {
            if(result && result.success) {
                // we are logged in, so hide login window
                win.hide();

                var user = Ext.create(Bancha.getModel('User').getName(), result.data);
                me.getApplication().fireEvent('loggedin', user);
            } else {
                win.setMasked(false);
            }
        });
    },

    init: function(application) {
        application.on([
            { event: 'loggedin', fn: this.onLoggedin, scope: this }
        ]);
    }

});