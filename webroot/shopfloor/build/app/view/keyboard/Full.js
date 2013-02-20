Ext.define('ShopFloor.view.keyboard.Full', {
    extend: 'Ext.Panel',
    xtype: 'fullkeyboard',
    config: {
        cls:'keyboard',
        zIndex:99999999,
        centered:true,
        width:790,
        height:270,
        layout: 'fit',
        items:[{
            xtype:'container',
            layout:'vbox',
            items:[{
                //ROW 1
                xtype:'container',
                layout:'hbox',
                listeners: {
                    painted: function(container, eOpts) {
                        var me=this;
                        var keyConfig = [['`','~'],['1','!'],['2','@'],['3','#'],['4','$'],['5','%'],['6','^'],['7','&'],['8','*'],['9','('],['0',')'],['-','_'],['=','+'],'BKSP'], output = new Array, btn;
                        for (var i=0,len=keyConfig.length; i<len; i++) {
                            if (keyConfig[i] == 'BKSP') {
                                btn = {
                                    xtype:'button',
                                    text:keyConfig[i],
                                    baseCls:'keyboard-btn'
                                }
                            } else {
                                btn = {
                                    xtype:'button',
                                    text:keyConfig[i][0],
                                    altText:keyConfig[i][1],
                                    baseCls:'keyboard-btn',
                                    listeners: { painted: ShopFloor.getButtonPainted }
                                }
                            }
                            output.push(btn);
                        }
                        Ext.getCmp(container.id).add(output);
                        container.clearListeners();
                    }
                }
            },{
                //ROW 2
                xtype:'container',
                layout:'hbox',
                padding:'0 0 0 6',
                listeners: {
                    painted: function(container, eOpts) {
                        var me=this;
                        var keyConfig = ['TAB',['q','Q'],['w','W'],['e','E'],['r','R'],['t','T'],['y','Y'],['u','U'],['i','I'],['o','O'],['p','P'],['[','{'],[']','}'],['\\','|']], output = new Array, btn;
                        for (var i=0,len=keyConfig.length; i<len; i++) {
                            if (keyConfig[i] == 'TAB') {
                                btn = {
                                    xtype:'button',
                                    text:keyConfig[i],
                                    baseCls:'keyboard-btn'
                                }
                            } else {
                                btn = {
                                    xtype:'button',
                                    text:keyConfig[i][0],
                                    altText:keyConfig[i][1],
                                    baseCls:'keyboard-btn',
                                    listeners: { painted: ShopFloor.getButtonPainted }
                                }
                            }
                            output.push(btn);
                        }
                        Ext.getCmp(container.id).add(output);
                        container.clearListeners();
                    }
                }
            },{
                //ROW 3
                xtype:'container',
                layout:'hbox',
                padding:'0 0 0 46',
                listeners: {
                    painted: function(container, eOpts) {
                        var me=this;
                        var keyConfig = [['a','A'],['s','S'],['d','D'],['f','F'],['g','G'],['h','H'],['j','J'],['k','K'],['l','L'],[';',':'],['\'','"'],'ENTER'], output = new Array, btn;
                        for (var i=0,len=keyConfig.length; i<len; i++) {
                            if (keyConfig[i] == 'ENTER') {
                                btn = {
                                    xtype:'button',
                                    text:keyConfig[i],
                                    baseCls:'keyboard-btn'
                                }
                            } else {
                                btn = {
                                    xtype:'button',
                                    text:keyConfig[i][0],
                                    altText:keyConfig[i][1],
                                    baseCls:'keyboard-btn',
                                    listeners: { painted: ShopFloor.getButtonPainted }
                                }
                            }
                            output.push(btn);
                        }
                        Ext.getCmp(container.id).add(output);
                        container.clearListeners();
                    }
                }
            },{
                //ROW 4
                xtype:'container',
                layout:'hbox',
                padding:'0 0 0 36',
                listeners: {
                    painted: function(container, eOpts) {
                        var me=this;
                        var keyConfig = ['SHIFT',['z','Z'],['x','X'],['c','C'],['v','V'],['b','B'],['n','N'],['m','M'],[',','<'],['.','>'],['/','?'],'SHIFT'], output = new Array, btn;
                        for (var i=0,len=keyConfig.length; i<len; i++) {
                            if (keyConfig[i] == 'SHIFT') {
                                btn = {
                                    xtype:'button',
                                    text:keyConfig[i],
                                    baseCls:'keyboard-btn'
                                }
                            } else {
                                btn = {
                                    xtype:'button',
                                    text:keyConfig[i][0],
                                    altText:keyConfig[i][1],
                                    baseCls:'keyboard-btn',
                                    listeners: { painted: ShopFloor.getButtonPainted }
                                }
                            }
                            output.push(btn);
                        }
                        Ext.getCmp(container.id).add(output);
                        container.clearListeners();
                    }
                }
            },{
                //ROW 5
                xtype:'container',
                layout:'hbox',
                padding:'0 0 0 26',
                items:[{
                    xtype:'button',
                    text:'CANCEL',
                    baseCls:'keyboard-btn',
                    cls:'cancelbtn'
                },{
                    xtype:'button',
                    text:' ',
                    baseCls:'keyboard-btn',
                    cls:'spacebar'
                },{
                    xtype:'button',
                    text:'OK',
                    baseCls:'keyboard-btn',
                    cls:'okbtn'
                }]
            }]
        }]
    }
});