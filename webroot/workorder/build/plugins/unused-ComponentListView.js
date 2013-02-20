/*!
 *
 * WorkOrder Application
 * Copyright 2012 TCS
 *
 * @package       WorkOrder
 * @copyright     Copyright 2012 TCS
 * @author        Roland Schuetz <mail@rolandschuetz.at>
 * @author        Chris Nizzardini <cnizzardini@gmail.com>
 * @author        Jeff Wooden <jeff@morointeractive.com>
 */
/*jslint browser: true, vars: true, plusplus: true, white: true, sloppy: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false, strict:false */
/*global Ext:false, jQuery:false, Bancha:false, WorkOrder:true, localActions:false, window:false */

Ext.ux.ComponentListView = Ext.extend(Ext.ListView, {
    defaultType: 'textfield',
    initComponent : function(){
        Ext.ux.ComponentListView.superclass.initComponent.call(this);
        this.components = [];
    },
    refresh : function(){
        Ext.destroy(this.components);
        this.components = [];
        Ext.ux.ComponentListView.superclass.refresh.apply(this, arguments);
        this.renderItems(0, this.store.getCount() - 1);
    },
    onUpdate : function(ds, record){
        var index = ds.indexOf(record);
        if(index > -1){
            this.destroyItems(index);
        }
        Ext.ux.ComponentListView.superclass.onUpdate.apply(this, arguments);
        if(index > -1){
            this.renderItems(index, index);
        }
    },
    onAdd : function(ds, records, index){
        var count = this.all.getCount();
        Ext.ux.ComponentListView.superclass.onAdd.apply(this, arguments);
        if(count !== 0){
            this.renderItems(index, index + records.length - 1);
        }
    },
    onRemove : function(ds, record, index){
        this.destroyItems(index);
        Ext.ux.ComponentListView.superclass.onRemove.apply(this, arguments);
    },
    onDestroy : function(){
        Ext.ux.ComponentDataView.onDestroy.call(this);
        Ext.destroy(this.components);
        this.components = [];
    },
    renderItems : function(startIndex, endIndex){
        var ns = this.all.elements;
        var args = [startIndex, 0];
        for(var i = startIndex; i <= endIndex; i++){
            var r = args[args.length] = [];
            for(var columns = this.columns, j = 0, len = columns.length, c; j < len; j++){
                var component = columns[j].component;
                c = component.render ?
                    c = component.cloneConfig() :
                    Ext.create(component, this.defaultType);
                r[j] = c;
                var node = ns[i].getElementsByTagName('dt')[j].firstChild;
                if(c.renderTarget){
                    c.render(Ext.DomQuery.selectNode(c.renderTarget, node));
                }else if(c.applyTarget){
                    c.applyToMarkup(Ext.DomQuery.selectNode(c.applyTarget, node));
                }else{
                    c.render(node);
                }
                if(c.applyValue === true){
                    c.applyValue = columns[j].dataIndex;
                }
                if(Ext.isFunction(c.setValue) && c.applyValue){
                    c.setValue(this.store.getAt(i).get(c.applyValue));
                    c.on('blur', function(f){
                        this.store.getAt(this.index).data[this.dataIndex] = f.getValue();
                    }, {store: this.store, index: i, dataIndex: c.applyValue});
                }
            }
        }
        this.components.splice.apply(this.components, args);
    },
    destroyItems : function(index){
        Ext.destroy(this.components[index]);
        this.components.splice(index, 1);
    }
});
Ext.reg('complistview', Ext.ux.ComponentListView);