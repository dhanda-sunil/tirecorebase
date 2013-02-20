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

Ext.define('ShopFloor.controller.Customer', {
    extend: 'Ext.app.Controller',

    mixins: {
        recordController: 'ShopFloor.controller.mixin.RecordController'
    },

    config: {
        control: {
            "component[action=showcustomerdetails]": {
                release: 'onShowCustomerDetailsClick'
            }
        }
    },

    onShowCustomerDetailsClick: function(button, e, options) {
        if(button.getDisabled()) {
            return;
        }

        Ext.Msg.alert(
            Bancha.t('Error'),
            Bancha.t('Not yet implemented'));
    },

    init: function(application) {

        this.setupModel({
            modelName: 'Customer',
            load: {
                event: 'loadpostcasingmodels'
            },
            renderable: true,
            saveable: true
        });
    }

});