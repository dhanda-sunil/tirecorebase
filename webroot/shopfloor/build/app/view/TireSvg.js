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

Ext.define('ShopFloor.view.TireSvg', {
    extend: 'Ext.Component',
    xtype: 'tiresvg',
    template: [{
        reference: 'svg',
        tag: 'object',
        data:'img/tireCutOut.svg',
        id:'objRepairTire',
        style:'min-width:300px; min-height:150px;',
        classList: [Ext.baseCSSPrefix + 'svg']
    }]
});