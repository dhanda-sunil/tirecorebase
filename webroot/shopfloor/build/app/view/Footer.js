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

Ext.define('ShopFloor.view.Footer', {
    extend: 'Ext.Toolbar',
    alias: 'widget.footer',

    config: {
        associatedModels:['User'],
        docked: 'bottom',
        height: 90,
        id: 'footer',
        scrollable: false,
        items: [
            {
                xtype: 'label',
                model: 'User',
                docked: 'top',
                html: Bancha.t('Logging in...'),
                left: 10,
                top: 5,
                tpl: [
                    '<p style="font-size:14px;color:#000;">'+Bancha.t('You are currently logged in as:<br />{first_name} {last_name}')+'<p>'
                ]
            },
            {
                xtype: 'button',
                action: 'logout',
                bottom: 10,
                left: 5,
                text: Bancha.t('Logout')
            },
            {
                xtype: 'button',
                action: 'support',
                bottom: 10,
                left: 90,
                text: Bancha.t('Support')
            },
            {
                xtype: 'button',
                action: 'showproduction',
                bottom: 10,
                left: 180,
                style: 'display:none;',
                text: Bancha.t('Production')
            },
            {
                xtype: 'button',
                action: 'changecheckpoint',
                bottom: 10,
                left: 290,
                text: Bancha.t('Change Checkpoint')
            },
            {
                xtype: 'spacer'
            },
            {
                xtype: 'button',
                action: 'print',
                height: '50px',
                hidden: true,
                style: 'font-size:25px;-webkit-border-radius: 0px;',
                width: '100px',
                text: Bancha.t('Print')
            },
            {
                xtype: 'button',
                action: 'cancel',
                height: '50px',
                id: 'Cancel_btn',
                style: 'font-size:25px;-webkit-border-radius: 0px;',
                width: '100px',
                text: Bancha.t('Cancel')
            },
            {
                xtype: 'button',
                action: 'fail',
                height: '50px',
                id: 'Fail_btn',
                style: 'font-size:25px;-webkit-border-radius: 0px;',
                ui: 'decline',
                width: '100px',
                text: Bancha.t('Fail')
            },
            {
                xtype: 'button',
                action: 'pass',
                height: '50px',
                id: 'Pass_btn',
                style: 'font-size:25px;-webkit-border-radius: 0px;',
                ui: 'confirm',
                width: '100px',
                text: Bancha.t('Pass')
            }
        ]
    }

});