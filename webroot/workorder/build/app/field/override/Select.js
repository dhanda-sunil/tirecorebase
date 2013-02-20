/*jslint browser: true, vars: true, undef: true, nomen: true, eqeq: false, plusplus: true, bitwise: true, regexp: true, newcap: true, sloppy: true, white: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false */
/*global Ext, Bancha */

/**
 * Extend the Ext.field.Select to:
 * - support allowBlank see {@link onStoreDataChanged}
 * - allow custom item tablet picker templates (@use)
 */
Ext.define('WorkOrder.field.override.Select', {
    override: 'Ext.field.Select',
    
    /**
     * Called when the internal {@link #store}'s data has changed
     */
    onStoreDataChanged: function(store) {
        var initialConfig = this.getInitialConfig(),
            value = this.getValue();

        if (Ext.isDefined(value)) {
            this.updateValue(this.applyValue(value));
        }

        if (this.getValue() === null) {
            if (initialConfig.hasOwnProperty('value')) {
                this.setValue(initialConfig.value);
            }
            if (this.getValue() === null) {
                if (initialConfig.allowBlank) { // added these three lines
                    this.setValue(null);
                } else if (store.getCount() > 0) {
                    this.setValue(store.getAt(0));
                }
            }
        }
    },

    /**
     * Changes: If the old value was 0/"" make sure that the oldValue is null
     */
    onChange: function(component, newValue, oldValue) {
        var me = this,
            store = me.getStore(),
            index = (store) ? store.find(me.getDisplayField(), oldValue) : -1,
            valueField = me.getValueField(),
            record = (store) ? store.getAt(index) : null;

        if(oldValue === '' || oldValue === 0) { // added this if part, else is default Select behavior
            oldValue = null;
        } else {
            oldValue = (record) ? record.get(valueField) : null;
        }

        me.fireEvent('change', me, me.getValue(), oldValue);
    },

    /**
     * Changes from original version: use the configured itemTpl if available
     */
    getTabletPicker: function() {
        var config = this.getDefaultTabletPickerConfig();

        if (!this.listPanel) {
            this.listPanel = Ext.create('Ext.Panel', Ext.apply({
                centered: true,
                modal: true,
                cls: Ext.baseCSSPrefix + 'select-overlay',
                layout: 'fit',
                hideOnMaskTap: true,
                items: {
                    xtype: 'list',
                    store: this.getStore(),
                    itemTpl: this.getInitialConfig().itemTpl || '<span class="x-list-label">{' + this.getDisplayField() + ':htmlEncode}</span>', // <-- changed this line
                    listeners: {
                        select : this.onListSelect,
                        itemtap: this.onListTap,
                        scope  : this
                    }
                }
            }, config));
        }

        return this.listPanel;
    },

    /**
     * Changes from original: Don't force a initial selection
     */

    /**
     * Shows the picker for the select field, whether that is a {@link Ext.picker.Picker} or a simple
     * {@link Ext.List list}.
     */
    showPicker: function() {
        var store = this.getStore();
        //check if the store is empty, if it is, return
        if (!store || store.getCount() === 0) {
            return;
        }

        if (this.getReadOnly()) {
            return;
        }

        this.isFocused = true;

        //hide the keyboard
        //the causes https://sencha.jira.com/browse/TOUCH-1679
        // Ext.Viewport.hideKeyboard();

        if (this.getUsePicker()) {
            var picker = this.getPhonePicker(),
                name   = this.getName(),
                value  = {};
            if (this.record !== null) {
                value[name] = this.record.get(this.getValueField());
                picker.setValue(value);
            }
            if (!picker.getParent()) {
                Ext.Viewport.add(picker);
            }
            picker.show();
            
        } else {
            var listPanel = this.getTabletPicker(),
                list = listPanel.down('list'),
                lStore = list.getStore(),
                index = lStore.find(this.getValueField(), this.getValue(), null, null, null, true),
                record = lStore.getAt((index === -1) ? 0 : index);

            if (!listPanel.getParent()) {
                Ext.Viewport.add(listPanel);
            }

            listPanel.showBy(this.getComponent());

            if(index === -1) { // <-- add this line if-branch, esle is default
                list.deselectAll(true);
            } else {
                list.select(record, null, true);
            }
        }
    }
});

//eof
