Ext.define('ShopFloor.view.keyboard.Number', {
    extend: 'Ext.Panel',
    xtype: 'numberkeyboard',
    config: {
        cls:'keyboard',
        zIndex:999,
        centered:true,
        width:174,
        height:218,
        layout: 'fit',
        items:[{
            xtype:'container',
            layout:'vbox',
            items:[{
                //ROW 1
                xtype:'container',
                layout:'hbox',
                items:[{
                    xtype:'button',
                    text:'7',
                    baseCls:'keyboard-btn'
                },{
                    xtype:'button',
                    text:'8',
                    baseCls:'keyboard-btn'
                },{
                    xtype:'button',
                    text:'9',
                    baseCls:'keyboard-btn'
                }]
            },{
                //ROW 2
                xtype:'container',
                layout:'hbox',
                items:[{
                    xtype:'button',
                    text:'4',
                    baseCls:'keyboard-btn'
                },{
                    xtype:'button',
                    text:'5',
                    baseCls:'keyboard-btn'
                },{
                    xtype:'button',
                    text:'6',
                    baseCls:'keyboard-btn'
                }]
            },{
                //ROW 3
                xtype:'container',
                layout:'hbox',
                items:[{
                    xtype:'button',
                    text:'1',
                    baseCls:'keyboard-btn'
                },{
                    xtype:'button',
                    text:'2',
                    baseCls:'keyboard-btn'
                },{
                    xtype:'button',
                    text:'3',
                    baseCls:'keyboard-btn'
                }]
            },{
                //ROW 4
                xtype:'container',
                layout:'hbox',
                items:[{
                    xtype:'button',
                    text:'0',
                    baseCls:'keyboard-btn'
                },{
                    xtype:'button',
                    text:'.',
                    baseCls:'keyboard-btn'
                },{
                    xtype:'button',
                    text:'C',
                    baseCls:'keyboard-btn',
                    cls:'cancelbtn'
                }]
            }]
        }]
    }
});