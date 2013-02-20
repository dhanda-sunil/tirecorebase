Ext.define('ShopFloor.controller.keyboard.Controller', {
    extend: 'Ext.app.Controller',
    requires: [
        'ShopFloor.view.keyboard.Field',
        'ShopFloor.view.keyboard.Full',
        'ShopFloor.view.keyboard.Number'
    ],
    config: {
        control: {
            "fullkeyboard button": {
                tap: 'onButtonPressFull'
            },
            "numberkeyboard button": {
                tap: 'onButtonPressNumber'
            }
        }
    },
    init: function() {
        var me=this;
        document.onclick = function check(e) {
            Ext.Viewport.fireEvent('documentclick',e);
        }
        Ext.Viewport.on([
            { event: 'registerbuttons', fn: this.onRegisterButtons, scope: this },
            { event: 'documentclick', fn: this.onDocumentClick, scope: this },
            { event: 'launchfullkeyboard', fn: this.launchFullKeyboard, scope: this },
            { event: 'launchnumberkeyboard', fn: this.launchNumberKeyboard, scope: this }         
        ]);
        this.keyRegistry = new Array();
        //set global listener function for buttons
        ShopFloor.getButtonPainted = function(button, eOpts) {
            var btnObj = Ext.getCmp(button.id);
            Ext.Viewport.fireEvent('registerbuttons', btnObj, btnObj.config.altText);
            button.removeListener('painted', ShopFloor.getButtonPainted);
        }
    },
    onRegisterButtons: function(button, shiftKey) {
        var tempArr = new Array(), active=0;
        tempArr.push(button);
        tempArr.push(button.getText());
        tempArr.push(shiftKey);
        this.keyRegistry.push(tempArr);
    },
    onDocumentClick: function(e) {
        if (this.activeKeyboard) {
            var target = (e && e.target) || (event && event.srcElement), objMatch = false;
            //first check if click was directly on keyboard container
            if (target == this.activeKeyboard.element.dom) {
                objMatch = true;
            } else {
                //could not find a match so check target's parents for match
                var testObj = target;
                while(testObj != null) {
                    if (testObj == this.activeKeyboard.element.dom) {
                        objMatch = true;
                        break;
                    }
                    testObj = testObj.parentNode;
                }
            }
            //make sure the target wasn't the element that instantiated the keyboard
            if (target == this.activeField.getComponent().input.dom) {
                objMatch = true;
            }
            //if we couldn't find a match the click was off of the keyboard
            if (!objMatch) {
                this.activeKeyboard.hide();
            }
        }
    },
    onButtonPressFull: function(button, e, eOpts) {
        var key = button.getText();
        switch(key) {
            case 'BKSP':
                this.doBackspaceKey(key);
            break;
            case 'TAB':
                this.doTabKey(key);
            break;
            case 'ENTER':
                this.doEnterKey(key);
            break;
            case 'SHIFT':
                this.doShiftKey(key);
            break;
            case 'CANCEL':
                this.doCancelKey(key);
            break;
            case 'OK':
                this.doOkKey(key);
            break;
            default:
                this.doTextKey(key);
        }
    },
    onButtonPressNumber: function(button, e, eOpts) {
        var key = button.getText();
        switch(key) {
            case 'C':
                this.doClearKey(key);
            break;
            default:
                this.doTextKey(key);
        }
    },
    doBackspaceKey: function(key) {
        var curVal = this.activeField.getValue();
        if (curVal.length > 0) {
            var output = curVal.substr(0, curVal.length - 1);
        }
        this.activeField.setValue(output);
    },
    doTabKey: function(key) {
        var tabIndex = this.activeField.getTabIndex();
        if (tabIndex != null) {
            var parent = this.activeField.up('formpanel'), child;
            if (parent) {
                //first check for textfield
                child = parent.down('textfield[tabIndex=' + parseInt(tabIndex + 1) + ']');
                if (!child) {
                    //check for numberfield
                    child = parent.down('numberfield[tabIndex=' + parseInt(tabIndex + 1) + ']');
                    if (!child) {
                        //check for textareafield
                        child = parent.down('textareafield[tabIndex=' + parseInt(tabIndex + 1) + ']');
                        if (child) {
                            child.focus();
                        }
                    } else {
                        child.focus();
                    }
                } else {
                    child.focus();
                }
            }
        }
    },
    doEnterKey: function(key) {
        this.setFieldValue('\n');
    },
    doShiftKey: function(key) {
        //get both shift keys
        var shiftKeys = Ext.ComponentQuery.query('button[text="SHIFT"]');
        //change shift key cls
        var aCls = shiftKeys[0].getCls();
        if (aCls == null) {
            shiftKeys[0].addCls('shifton');
            shiftKeys[1].addCls('shifton');
        } else {
            shiftKeys[0].removeCls('shifton');
            shiftKeys[1].removeCls('shifton');
        }
        //change the button keys
        this.changeKeys();
    },
    changeKeys: function() {
        var O = this.keyRegistry, btn, key1, key2;
        for (var i=0,len=O.length; i<len; i++) {
            btn = O[i][0], key1 = O[i][1], key2 = O[i][2];
            if (btn.getText() == key1) {
                btn.setText(key2);
            } else {
                btn.setText(key1);
            }
        }
    },
    doCancelKey: function(key) {
        this.activeField.setValue(this.fieldValueB4Launch);
        this.activeKeyboard.hide();
    },
    doOkKey: function(key) {
        this.activeKeyboard.hide();
    },
    doClearKey: function(key) {
        this.activeField.setValue('');
    },
    doTextKey: function(key) {
        this.setFieldValue(key);
    },
    setFieldValue: function(value) {
        var curVal = this.activeField.getValue();
        this.activeField.setValue(curVal+value);
    },
    launchFullKeyboard: function(field) {
        var me=this;
        //first check and hide number keyboard if visible
        this.hideKeyboards();
        this.fullKeyboard = Ext.create('ShopFloor.view.keyboard.Full',{
            listeners: {
                hide: function(keyboard, eOpts) {
                    if (me.activeField) {
                        me.activeField.removeCls('active-field');
                    }
                }
            }
        });
        //Ext.Viewport.add(this.fullKeyboard);
        
        this.fullKeyboard.showBy(field);
        if (this.activeField) {
            this.activeField.removeCls('active-field');
        }
        this.activeField = field;
        this.fieldValueB4Launch = field.getValue();
        field.addCls('active-field');
        this.activeKeyboard = this.fullKeyboard;
    },
    launchNumberKeyboard: function(field) {
        var me=this;
        //first check and hide full keyboard if visible
        this.hideKeyboards();
        this.numberKeyboard = Ext.create('ShopFloor.view.keyboard.Number',{
            listeners: {
                hide: function(keyboard, eOpts) {
                    if (me.activeField) {
                        me.activeField.removeCls('active-field');
                    }
                }
            }
        });
        //Ext.Viewport.add(this.numberKeyboard);
        this.numberKeyboard.showBy(field);
        if (this.activeField) {
            this.activeField.removeCls('active-field');
        }
        this.activeField = field;
        field.addCls('active-field');
        this.activeKeyboard = this.numberKeyboard;
        
        //manage caret position
        //var selStart = document.getElementsByName(field.config.name)[0].selectionStart,
        //selEnd = document.getElementsByName(field.config.name)[0].selectionEnd;
    },
    hideKeyboards: function() {
        if (this.fullKeyboard) {
            if (!this.fullKeyboard.getHidden()) {
                this.fullKeyboard.hide();
            }
        }
        if (this.numberKeyboard) {
            if (!this.numberKeyboard.getHidden()) {
                this.numberKeyboard.hide();
            }
        }
    }
});