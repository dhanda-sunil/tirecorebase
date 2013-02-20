Ext.define('ShopFloor.view.keyboard.Field', {
    override: 'Ext.field.Field',
    keyboard: false,
    initialize: function() {
        var me=this;
        me.getComponent().input.dom.onfocus = function(e) {
            me.onFieldFocus(e);
        };    
    },
    onFieldFocus: function(e) {
        var me=this;
        if (me.config.keyboard) {
            if (me.config.keyboard == 'full') {
                Ext.Viewport.fireEvent('launchfullkeyboard', me);
            }
            if (me.config.keyboard == 'number') {
                Ext.Viewport.fireEvent('launchnumberkeyboard', me);
            }
        }
    }
});