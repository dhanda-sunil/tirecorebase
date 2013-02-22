/*jslint browser: true, vars: true, undef: true, nomen: true, eqeq: false, plusplus: true, bitwise: true, regexp: true, newcap: true, sloppy: true, white: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false */
/*global Ext, Bancha, ShopFloor */

/**
 * @class ShopFloor.controller.mixin.RecordController
 *
 * This class wraps all common functionality of a controller class which controls one record of a specific model.
 *
 * For more information about mixins in general see starting at 17:00
 * http://docs.sencha.com/touch/2-0/#!/video/class-system
 */
Ext.define('ShopFloor.controller.mixin.RecordController', {
    
    /**
     * Returns the active record of the setup RecordControllerMixin
     * @return {Ext.data.Model} the model of this controller
     */
    getActiveRecord: function() {
		console.log('getActiveRecord');
        return this.active_record;
    },

    /**
     * This is the basic init function for controlling models.
     *
     * @param config {Object} The configuration:
     *                         - load      : An object describing what and how the record should be loaded
     *                                       - event: the eventname to listen for
     *                                       - for all other configs see {@link loadRecord}
     *                         - renderable: If true, a panelpainted listener will be hocked up,
     *                                       that all model data is pushed into the panels
     *                         - saveable:   If true, the changed model data will be saved to the
     *                                       server on the savedata event
     */
    setupModel: function(config) {
		console.log('setupModel');
		console.log(config);
        var eventListeners = [],
            me = this;

        if(!Ext.isString(config.modelName)) {
            Ext.Error.raise({msg:'The recordController mixin expects a modelName property on the load record config'});
        }

        // load data
        if(config.load) {
            if(!Ext.isString(config.load.event) && Ext.Error) {
                Ext.Error.raise({msg:'The recordController.setupModel expects an event name at config.load.event'});
                return;
            }

            config.load.modelName = config.modelName;
            eventListeners.push({
                event: config.load.event,
                fn: function(data) {
                    me.loadRecord(config.load,data); // push the load config as first argument
                },
                scope: this
            });
        }

        // render data
        if(config.renderable) {
            eventListeners.push({ event: 'panelpainted', fn: this.onPanelPainted, scope: this });
        }

        // save data
        if(config.saveable) {
            eventListeners.push({ event: 'validatedata', fn: this.onValidateData, scope: this });
            eventListeners.push({ event: 'savedata', fn: this.onSaveData, scope: this });
        }
        
        // setup listeners
        this.getApplication().on(eventListeners);
    },




    /* ---------------------------- PAINT LOGIC ------------------------- */


    /**
     * Inject all record data to each new painted panel
     */
    onPanelPainted: function(panel) {
		console.log('onPanelPainted');
		console.log(panel);
        //Bancha.log.info(this.active_record ? this.active_record.$className : this.id);
        if(this.active_record) {
            // data is already loaded, so inject it
            this.injectData(panel, this.active_record);
        } else {
            // stack them for later
            this.panelsToPaint = this.panelsToPaint || [];
            this.panelsToPaint.push(panel);
        }
    },

    /**
     * @private
     * This should be called when the record is loaded, so it re-paints all stacked panels
     */
    runPanelPaintedStack: function(record) {
		console.log('runPanelPaintedStack');
        var me = this;
        if(me.panelsToPaint) {
            Ext.each(me.panelsToPaint, function(panel) {
                me.injectData(panel, record);
            });
        }
    },


    /**
     * Inject all model data into the panel (including all child panels)
     *
     * @param panel {Ext.Panel} the panel to inject the data into
     * @param rec {Ext.data.Model instance} the record with the data to inject
     */
    injectData: function(panel, rec) {
		console.log('injectData');
        var modelName = this.getModelName(rec);

        // a new checkpoint panel is loaded, so populate it with data
        rec.fields.each(function(item) {
            var name = item.getName();

            // search for form fields which represent this model field
            var fields = panel.query('[modelField='+modelName+'.'+name+']');

            // set the correct data
            Ext.Array.each(fields, function(field) {
                field.setValue(rec.get(name));
            });
        });


        // search for all components which represent this data
        var components = panel.query('[model='+modelName+']');

        // set the correct data
        Ext.Array.each(components, function(label) {
            label.setData(rec.data);
        });



        // search for all components which use this data along with other data
        components = panel.query('[models]');

        // since Sencha Architect doesn't allow custom configurations of type object,
        // we have to transform the string to an object and then filter
        Ext.each(components, function(component) {
            if(Ext.isString(component.config.models)) {
                component.config.models = component.config.models.split(',');
            }
            if(component.config.models.indexOf(modelName)!==-1) {

                // get the current data
                var data = component.getData();

                // to prevent XTemplate errors
                if(!data) {
                    data = {};
                    Ext.each(component.config.models, function(templateModelName) {
                        data[templateModelName] = {};
                    });
                }
                // add the data to current data set
                data[modelName] = rec.data;
                component.setData(data);
            }
        });
    },

    /**
     * Simply returns the un-namespaced model name from a given model record
     */
    getModelName: function(record) {
		console.log('getModelName');
        var modelNameParts = record.$className.split('.');
        return modelNameParts[modelNameParts.length-1];
    },

    /* ---------------------------- LOAD LOGIC ------------------------- */


    /**
     * Loads a record from the server, by default called from a listener setup by setupModel
     *
     * @param config {Object} the config object, options:
     *                general configs:
     *                    - modelName:  the modelName without namespacing, e.g. 'Casing'
     *                    - success:    (optonal) the success callback, first and only parameter is the new record, scope is the controller
     *                    - failure:    the failure callback, first and only parameter is the received data, scope is the controller
     *
     *                already-loaded-specific configs:
     *                   -  loaded:      If true the first argument of the fired event is expected to be the record
     *                stub-load-specific configs:
     *                    - stubLoadFn: if the model should be loaded from a stub method, provide this function. arguments:
     *                                  - data {Object} te data we received
     *                                  - callback {Function} a callback function to handle everythign else, this should always be applied
     *                store-load-specific configs:
     *                    - store:      This string is expected to be both the storeId and the store classname (with namespace WorkOrder.store) or
     *                    - storeClass: the store class if it differs
     *                model-load-specific configs: (Default, if non of loaded, stubloadFn and store is defined)
     *                                  Expects the event's first argument to be eigther the id or an record which holds the id as associated field (e.g. account_id)
     *                    - optional:   true is the association is optional, meaning the null is allowed and then the record should not be loaded
     *                                  (e.g. only some plants have a connecton between casing and mold type, on others it's null)
     *
     */
    loadRecord: function(config, data) {
		console.log('loadRecord');
        var me = this;
        
        // if the record is already loaded jsut fire the sucsess function
        if(config.loaded) {
            return this.onRecordLoadedSuccessfull(config, /* data equals record */data);

        // if there is a custom load function, use it
        } else if(config.stubLoadFn) {
            return this.loadRecordFromStub(config, data);

        // if there is a store use this to load
        } else if(config.store) {
            return this.loadRecordFromStore(config, data);

        // otherwise load one model from the server
        } else {
            return this.loadRecordFromModel(config, data);
        }
    },
    /**
     * @private
     */
    loadRecordFromStub: function(config, data) {
		console.log('loadRecordFromStub');
        var me = this;

        // fire the load function and then handle the response
        config.stubLoadFn(data, function(result,response) {
            if(result && result.success) {
                // create a record
                var record = Ext.create(Bancha.getModel(config.modelName).getName(), result.data);
                me.onRecordLoadedSuccessfull(config, record);
            } else {
                me.onRecordLoadingFailed(config, result);
            }
        });
    },
    /**
     * @private
     * Load a record from an store
     * If the store is not created it will be, if not loaded it will load
     */
    loadRecordFromStore: function(config, id) {
		console.log('loadRecordFromStore');
        // get the store
        var store = config.store;
        if(Ext.isString(config.store)) {
            // it's a storeId
            store = Ext.StoreMgr.get(store) || Ext.create(config.storeClass || 'WorkOrder.store.'+store);
        }

        var onLoaded = function(store, /*ignore this*/records, success, /* only use on failure*/operation) {
            var rec = store.getById(id);
            if(success && rec) {
                this.onRecordLoadedSuccessfull(config, rec);
            } else {
                this.onRecordLoadingFailed(config, operation.getResponse());
            }
        };

        if(store.getCount() === 0) {
            if(!store.isAutoLoading()) {
                store.load();
            }
            store.on('load', onLoaded, this, { single: true});
        } else {
            // store is already loaded
            onLoaded.call(this, store, [], true, {
                getResponse: Ext.emptyFn
            });
        }
    },
    /**
     * @private
     * Load a record from an associated record
     * by default we expect the data to be a record
     */
    loadRecordFromModel: function(config, record) {
		console.log('loadRecordFromModel');
        var me = this,
            fieldName,
            loadRecId,
            name;

        if(Ext.isNumeric(record)) {
            loadRecId = record;
        } else {
            // by default the data is a record and we use the 
            // model name id field to get the data, so do 
            // something like
            // Bancha.getModel('Customer').load(casingRecord.get('customer_id'), {...})
            fieldName = this.getDatabaseIdFieldname(config.modelName);
            loadRecId = record.get(fieldName);
        }
        
        
        // if the record id is not set and it is optional stop
        // otherwise a error will be thrown
        // We use isNumeric so '0' and 0 is true, but null is false
        if(!Ext.isNumeric(loadRecId) && config.optional) {
            return;
        }

        // if we couldn't find the id
        if(!Ext.isNumeric(loadRecId)) {
            name = record.getProxy().getModel().getName().split('.');
            name = name.length ? name[name.length-1] : '?';
            Bancha.log.error(
                Bancha.t('Could not load %s model from %s.%s=%s.', config.modelName, name, fieldName, loadRecId));
            this.onRecordLoadingFailed(config);
        }

        Bancha.getModel(config.modelName).load(loadRecId, {
            scope: this,
            success: function(record, operation) {
                me.onRecordLoadedSuccessfull(config, record);

                if(config.success) {
                    config.success.call(this, record);
                }
            },
            failue: function(record, operation) {
                me.onRecordLoadingFailed(config, operation);
            }
        });
    },

    /**
     * @private
     * Transform a model name (witout namespacing) into a assiciations 
     * database field name
     *
     * @param str {String} modelname in camel case, e.g. MoldType
     * @return database field name, e.g. mold_type_id
     */
    getDatabaseIdFieldname: function(str) {
        console.log('getDatabaseIdFieldname');
        // make the first lower case
        str = str.substr(0,1).toLowerCase() + str.substr(1);

        // transform camelcase to underscore separators
        str = str.replace(/([a-z])([A-Z])/g, function (all, first, second) {
            return first + "_" + second.toLowerCase();
        });

        // add _id
        return str+'_id';
    },
    /**
     * @private
     * This function will fire the loaded event
     */
    onRecordLoadedSuccessfull: function(config, record) {
		console.log('onRecordLoadedSuccessfull');
        var me = this;

        Bancha.log.info('Event: '+config.modelName.toLowerCase()+'loaded');
        // populate record
        this.getApplication().fireEvent(config.modelName.toLowerCase()+'loaded', record);
        // keep a reference
        this.active_record = record;

        // now inject data
        this.runPanelPaintedStack(record);

        if(config.success) {
            config.success.call(this, record);
        }
    },
    /**
     * @private
     * This function will handle all loading errors
     */
    onRecordLoadingFailed: function(config, result) {
		console.log('onRecordLoadingFailed');
        var me = this;
        result = result || {};

        // error handling
        Ext.Msg.alert(
            Bancha.t('Error'),
            result.message || Bancha.t('Could not load %s data, please try again!', config.modelName.toLowerCase()),
            function() {
                me.getApplication().fireEvent('forcecasingselection');
            });

        if(config.failure) {
            config.failure.call(this, result);
        }
    },




    /* ---------------------------- SAVE LOGIC ------------------------- */

    /**
     * This function is triggered from the 'validatedata' event and performs all
     * necessary validation checks for saving a single record to the server
     */
    onValidateData: function(panel, errorsCollection) {
		console.log('onValidateData');
        var rec = this.active_record;

        if(!rec) {
            return; // nothing to validate
        }
        
        // write all changes into record
        this.collectRecordData(rec, panel);

        // stop if nothing has changed
        if(!rec.dirty) {
            return;
        }

        // check validation status
        if(!rec.isValid()) {
            errorsCollection.valid = false;
            errorsCollection.errors[this.getModelName(rec)] = rec.validate();
        }

        // reject changes in the case any record doesn't validate
        rec.reject();
    },

    /**
     * This function is triggered from the 'savedata' event and performs all
     * necessary actions for saving a single record to the server
     */
    onSaveData: function(panel, counter) {
		console.log('onSaveData');
        var rec = this.active_record,
            me = this;

        if(!rec) {
            return; // nothing to save
        }

        // write all changes into record
        this.collectRecordData(rec, panel);

        // stop if nothing has changed
        if(!rec.dirty) {
            return;
        }

        // every subscriber will increase the coutner by one, and decrease when saving is finished
        // when counter is 0 the datasaved event will be fired
        counter.inc();

        rec.save({
            failure: function() {
                Ext.Msg.alert(
                    Bancha.t('Error'),
                    Bancha.t('Something wen\'t wrong, couln\'t save %s data', this.getModelName(rec)));
                // don't decrease the counter to keep everything masked
            },
            success: function() {
                // perfect
                counter.dec();
            }
        });
    },

    /**
     * @private
     * This function will go though the whole panel, looking for changed
     * record data and will write those back into the record
     */
    collectRecordData: function(rec, panel) {
		console.log('collectRecordData');
        var modelName = this.getModelName(rec);

        // for each field, collect the data
        rec.fields.each(function(recordField) {
            var name = recordField.getName();

            // search for form fields which represent this model field
            var fields = panel.query('[modelField='+modelName+'.'+name+']');


            if(!fields.length) {
                return;
            }

            // it is possible that there are more fields on the same page,
            // don't worry as long as all except one is disabled
            // (especially because not all may be displayed)
            var valueFound = false;
            Ext.each(fields, function(formField,index) {
                var recordFieldValue = rec.get(recordField.getName())+'', // convert both to a string for comparsion
                    formFieldValue   = formField.getValue()+'';

                if(!formField.isDisabled() && formField.isDirty() && // is the form field enabled and got changed?
                    recordFieldValue !== formFieldValue ) {  // is there actually new data?

                    /*
                    console.info(['Found new data for field '+name+', old: ',
                        rec.get(recordField.getName())+' ('+(typeof rec.get(recordField.getName()))+'), new:',
                        formField.getValue()+' ('+(typeof formField.getValue())+')'].join('')); */

                    if(valueFound) {
                        Ext.Msg.alert(
                            Bancha.t('Error'),
                            Bancha.t('There is more then one field with changed data for %s on the screen, not sure which data to collect!', modelName+'.'+name));
                    }
                    valueFound = true;
                    rec.set(name, formField.getValue());
                }
            }); //eo each

        });
    }
});
