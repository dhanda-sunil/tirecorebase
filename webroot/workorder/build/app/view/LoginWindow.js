/*!
 *
 * WorkOrder Application
 * Copyright 2012 TCS
 *
 * @package       WorkOrder
 * @copyright     Copyright 2012 TCS
 * @author        Roland Schuetz <mail@rolandschuetz.at>
 * @author        Chris Nizzardini <cnizzardini@gmail.com>
 * @author        Jeff Wooden <jeff@morointeractive.com>
 */
/*jslint browser: true, vars: true, plusplus: true, white: true, sloppy: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false, strict:false */
/*global Ext:false, jQuery:false, Bancha:false, ShopFloor:true, localActions:false, window:false */

Ext.define('WorkOrder.view.LoginWindow', {
    extend: 'Ext.Panel',
    alias: 'widget.loginwindow',

    config: {
        centered: true,
        height: 270,
        id: 'loginwindow',
        ui: '',
        width: 470,
        layout: {
            type: 'fit'
        },
        modal: true,
        items: [
            {
                xtype: 'toolbar',
                docked: 'top',
                title: Bancha.t('Login')
            },
            {
                xtype: 'formpanel',
                id: 'loginform',
                ui: 'dark',
                items: [
                    {
                        xtype: 'fieldset',
                        items: [
                            {
                                xtype: 'textfield',
                                label: Bancha.t('User name'),
                                name: 'username',
                                autoCapitalize: false,
                                autoComplete: false,
                                autoCorrect: false
                            },
                            {
                                xtype: 'passwordfield',
                                label: Bancha.t('Password'),
                                name: 'password'
                            }
                        ]
                    },
                    {
                        xtype: 'button',
                        action: 'login',
                        text: Bancha.t('login')
                    }
                ]
            }
        ]
    }

});