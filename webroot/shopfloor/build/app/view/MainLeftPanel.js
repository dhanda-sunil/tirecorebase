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

Ext.define('ShopFloor.view.MainLeftPanel', {
    extend: 'Ext.Panel',
    alias: 'widget.mainleftpanel',
    config: {
        flex:1,
        layout: {
            type: 'card'
        },
        scrollable: false,
        items: [{
            xtype: 'panel',
            styleHtmlContent: true,
            scrollable: true,
            showAnimation: {
                type:'slideIn',
                duration:300,
                easing:'ease-out'
            },
            hideAnimation: {
                type:'slideOut',
                duration:300,
                easing:'ease-out'
            },
            items: [{
                xtype: 'component',
                models: 'TireSize,Manufacturer,TreadDesign,Casing,MoldType,BuffSpec,DotSerial',
                html: Bancha.t('Loading Casing Data...'),
                id: 'initialinspectioncheckpointleftscreen',
                style: 'background-color:white;',
                styleHtmlContent: true,
                tpl: new Ext.XTemplate(
                    '<div style="font-weight:bold;font-size: 25px;"><tpl if="TireSize.width">{TireSize.width}/</tpl>{TireSize.name} {Manufacturer.name} => {TreadDesign.name}</div>',
                    '<table>',
                    '    <tr>',
                    '        <td>'+Bancha.t('Tread Design:')+' {TreadDesign.name}</td>',
                    '        <td>'+Bancha.t('Mold Profile:')+' {MoldType.description}</td>',
                    '    </tr><tr>',
                    '        <td>'+Bancha.t('Tread Width:')+' {Casing.tread_width}</td>',
                    '        <td>'+Bancha.t('Bead Plate:')+' ????</td>',
                    '    </tr><tr>',
                    '        <td>'+Bancha.t('Casing Age:')+' {Casing.production_week:this.parseAge}</td>',
                    '        <td>'+Bancha.t('Tag Number:')+' {Casing.customer_tag}</td>',
                    '    </tr><tr>',
                    '        <td>'+Bancha.t('Casing Grade:')+' {Casing.grade}</td>',
                    '        <td>'+Bancha.t('Recommended Buff:')+' {BuffSpec.name}</td>',
                    '    </tr><tr>',
                    '        <td>'+Bancha.t('Weather Checking:')+'  {Casing.checking}</td>',
                    '        <td>'+Bancha.t('DOT:')+' {DotSerial.name}</td>',
                    '    </tr>',
                    '</table>',
                {
                    parseAge: function(production_week) {
                        if (production_week == undefined) {
                            return Bancha.t('NA');
                        } else if (production_week) {
                            //turn the production_week into a string so we can properly manipulate
                            var pwString = production_week.toString();
                            //get the year and weeks
                            var year = parseInt('20'+pwString.substring(0,2), 10), weeks = parseInt(pwString.substring(2,4), 10);
                            //find the total days from weeks
                            var days = weeks*7;
                            //set comparison vars    
                            var dateYear = new Date(year, 0);
                            var dateProduced = new Date(dateYear.setDate(days));
                            var today = new Date();
                            //find the time difference between today and the production date
                            var diff = today - dateProduced;
                            //get the total age in days
                            var diffDays = Math.round(diff / 1000 / (60*60*24));
                            //get the age in years
                            var oYears = diffDays/365.25;
                            //now grab the remaining time
                            var remainingTime = oYears % 1;
                            //set oYears to just the years
                            oYears = Math.floor(oYears);
                            //reconvert remaining time to days
                            var remainingDays = Math.round(remainingTime*365.25);
                            //now get the total months
                            var oMonths = Math.floor(remainingDays/30);
                            //now get the total days left
                            var oDays = remainingDays-(oMonths*30);
                            //create the labels
                            var yLabel, mLabel, dLabel;
                            if (oYears === 1) {
                                yLabel = 'Year';
                            } else {
                                yLabel = 'Years';
                            }
                            if (oMonths === 1) {
                                mLabel = 'Month';
                            } else {
                                mLabel = 'Months';
                            }
                            if (oDays === 1) {
                                dLabel = 'Day';
                            } else {
                                dLabel = 'Days';
                            }
                            //now build the output string
                            var oString = oYears+' '+yLabel+', '+oMonths+' '+mLabel+', '+oDays+' '+dLabel;
                            return oString;
                        } else {
                            return Bancha.t('NA');
                        }
                    }
                }) //eo tpl
            },{
                xtype: 'fieldset',
                title: Bancha.t('Special Instructions'),
                items: [{
                    xtype: 'textareafield',
                    modelField: 'Co.notes',
                    disabled: true,
                    clearIcon: false
                }]
            },{
                xtype: 'button',
                action: 'editleftside',
                right: 15,
                style: 'cursor:pointer; display:none',
                ui: 'plain',
                width: 80,
                iconAlign: 'right',
                iconCls: 'compose',
                iconMask: true,
                text: Bancha.t('edit')
            },{
                xtype: 'spacer',
                height: 30
            }]
        }]
    }
});