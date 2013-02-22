/*
Plugin: Ext.plugin.SlideToRemove
Version: 1.0.0
Tested: Sencha Touch 2.0.1.1
Author: OhmzTech

Usage Notes:
1. Add this plugin to any list.
2. User can now swipe the list item to display delete button, and swipe it back to hide the delete button. Multiple delete buttons can be open at one time.
3. Set buttonText in plugin configuration to change text on the remove button.
4. Easily change the button configuration manually in this plugin for easy customization.
*/

Ext.define('WorkOrder.ux.view.plugin.SlideToRemove', {
    extend:'Ext.Component',
    alias:'plugin.slidetoremove',

    config: {
        removeText: 'Delete'
    },

    init: function(list) {
        list.on({
            itemswipe: this.showDelete,
            hide: this.closeDeletes,
            scope: this
        });
    },
    
    showDelete: function(view,index,target,rec,e) {
        if(target.dom.children.length > 1 && e.direction == 'right') {
            Ext.Anim.run(target,'slide', {
                out: false,
                duration: 500,
                autoClear: false,
                direction: 'right',
                after: function(el) {
                    el.last().destroy();
                }
            });
        } else if(target.dom.children.length == 1 && e.direction == 'left') {
            var deleteNode = target.dom.firstChild.cloneNode();
            deleteNode.setAttribute('style','width:100%;height:100%;left:100%;top:0px;overflow-x:hidden;position:absolute;padding:3px 8px 3px 8px;');
            deleteNode.classList.add('list-delete');
            target.dom.appendChild(deleteNode);
            target.dom.firstChild.setAttribute('style','position:relative;width:100%;');
            Ext.create('Ext.Button', {
                ui: 'decline',
                text: this.getRemoveText(),
                height: '100%',
                renderTo: deleteNode,
                handler: function() {
                    view.getStore().remove(rec);
                },
                scope: this
            });
            Ext.Anim.run(target,'slide', {
                out: true,
                duration: 500,
                autoClear: false
            });
        }
    },
    
    closeDeletes: function(view) {
        Ext.DomQuery.select('div[class*=list-delete]',view.element.dom).forEach(function(node){
            node.parentNode.style.removeProperty('-webkit-transform');
            node.parentNode.removeChild(node);
        });
    }
});