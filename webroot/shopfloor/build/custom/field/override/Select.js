/*jslint browser: true, vars: true, undef: true, nomen: true, eqeq: false, plusplus: true, bitwise: true, regexp: true, newcap: true, sloppy: true, white: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false */
/*global Ext, Bancha */

/**
 * Extend the Ext.field.Select to:
 * - support allowBlank see {@link onStoreDataChanged}
 * - allow custom item tablet picker templates (@use)
 */
Ext.define('Ext.field.override.Select', {
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
     * use the configured itemTpl if available
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
                    itemTpl: this.getInitialConfig().itemTpl || '<span class="x-list-label">{' + this.getDisplayField() + ':htmlEncode}</span>', // changed this line
                    listeners: {
                        select : this.onListSelect,
                        itemtap: this.onListTap,
                        scope  : this
                    }
                }
            }, config));
        }

        return this.listPanel;
    }
});

//eof
