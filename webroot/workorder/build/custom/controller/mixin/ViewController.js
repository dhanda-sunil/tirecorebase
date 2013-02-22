/*jslint browser: true, vars: true, undef: true, nomen: true, eqeq: false, plusplus: true, bitwise: true, regexp: true, newcap: true, sloppy: true, white: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false */
/*global Ext, Bancha, jQuery, ShopFloor */

/**
 * @class ShopFloor.controller.mixin.Viewontroller
 *
 * This class wraps all common functionality of a controller class which controls a view.
 *
 * For more information about mixins in general see starting at 17:00
 * http://docs.sencha.com/touch/2-0/#!/video/class-system
 */
Ext.define('ShopFloor.controller.mixin.ViewController', {
    
    /**
     * Abstraction layer to enable specific view elements
     *
     * @param elements {Array|String} see {@link #disable disable method}
     */
    enable: function(elements) {
        this.disableElements(false, elements);
    },
    /**
     * Abstraction layer to disable specific view elements
     *
     * @param elements {Array|String} an array of names of elements to disable, supported: Viewport, Header, MainLeft, MainRight, Footer
     * @param loadingMessage {String} (optional) a message which should be displayed in an loading overlay
     */
    disable: function(elements, loadingMessage) {
        this.disableElements(true, elements, loadingMessage);
    },
    /**
     * @private
     */
    disableElements: function(disbale, elements, loadingMessage) {
        if(Ext.isString(elements)) {
            elements = [elements];
        }

        // special viewport logic
        if(elements[0] === 'Viewport') {
            this.disableElement(disbale, 'Header');
            this.disableElement(disbale, 'Main', loadingMessage);
            this.disableElement(disbale, 'Footer');
            return;
        }

        var me = this;
        Ext.each(elements, function(element) {
            me.disableElement(disbale, element, loadingMessage);
        });
    },
    /**
     * @private
     */
    supportedDisableComponents: {
        Header: 'header',
        Main: 'main',
        MainLeft: '#mainleftpanel',
        MainRight: '#mainrightpanel',
        Footer: 'footer'
    },
    /**
     * @private
     * See {@link #disable disable method}
     */
    disableElement: function(disable, elementName, loadingMessage) {
        if(!this.supportedDisableComponents[elementName]) {
            Ext.Error.raise({msg:'Disabling of unknown element "'+elementName+'" is not supported'});
        }

        // find the element
        var element = Ext.ComponentQuery.query(this.supportedDisableComponents[elementName]);
        if(!element.length) {
            // element is currently not on the page
            return;
        }
        element = element[0];


        // if there's a loading Message, mask it with the msg
        if(disable && Ext.isDefined(loadingMessage)) {
            element.mask({
                xtype: 'loadmask',
                message: loadingMessage
            });
        }

        // footer logic, only disable the buttons
        if(elementName === 'Footer') {
            // left side buttons
            var btn = element.query('button[action=showproduction]')[0];
            if(btn) {
                btn.setDisabled(disable);
            }
            btn = element.query('button[action=changecheckpoint]')[0];
            if(btn) {
                btn.setDisabled(disable);
            }

            // right side buttons
            element.query('button[action=cancel]')[0].setDisabled(disable);
            element.query('button[action=fail]')[0].setDisabled(disable);
            element.query('button[action=pass]')[0].setDisabled(disable);
            return;
        }

        // general logic
        element.setMasked(disable);
    },



    /**
     * Abstraction layer for Ext.create() panel.
     *
     * Beside calling Ext.create()this also localized the panel and fires the panelpainted event
     *
     * @param cls {String} see {@link Ext.create}
     * @param config {Object} see {@link Ext.create}
     * @param keyboardConfig {Object} additional virtual keyboard configs
     * @return the new panel
     */
    createPanel: function(cls, config, keyboardConfig) {

        // create the panel
        var panel = Ext.create(cls, config);

        // every time a panel is painted, localize it
        Ext.ux.Localizer.localize(panel, Bancha.Localizer.currentLang);

        this.setupKeyboard(panel, keyboardConfig);

        // fire an event every time a new panel is painted
        this.getApplication().fireEvent('panelpainted', panel);

        return panel;
    },

    /**
     * Sets up the virtual keyboard for all inputs in the given panel
     */
    setupKeyboard: function(panel, additionalConfigs) {
        
        // only if the app has the virtual keyboard loaded
        // and is needs it
        if(!window.jQuery || !jQuery.keyboard || jQuery('body').hasClass('isDesktop')) {
            this.setupKeyboard = Ext.emptyFn;
            return;
        }

        // move the accept key to the right side
        var moveAccept = {
            'default': [
                '` 1 2 3 4 5 6 7 8 9 0 - = {bksp}',
                '{tab} q w e r t y u i o p [ ] \\',
                'a s d f g h j k l ; \' {enter}',
                '{shift} z x c v b n m , . / {shift}',
                '{cancel} {space} {accept}'
            ],
            'shift': [
                '~ ! @ # $ % ^ & * ( ) _ + {bksp}',
                '{tab} Q W E R T Y U I O P { } |',
                'A S D F G H J K L : " {enter}',
                '{shift} Z X C V B N M < > ? {shift}',
                '{cancel} {space} {accept}'
            ]
        };
        // defaults
        var config = {
            layout: 'custom',
            customLayout: moveAccept,
            autoAccept: true,
            position: {
                my : 'right center',
                at : 'left center',
                offset: '-10 0'
            }
        };
        config = Ext.apply(config, additionalConfigs);

        // replace shortcuts
        if(Ext.isString(config.position)) {
            // we used a shortcut for positioning on the body, transform to jQuery UI Positioning
            // see also http://jqueryui.com/demos/position/
            config.position = {
                of: jQuery('body'),
                my : config.position,
                at : config.position
            };
        }

        // for touch devices add keyboard setup
        var newInputs = Ext.Array.union(
            Ext.ComponentQuery.query('textfield[keyboardInitialized=undefined]'),
            Ext.ComponentQuery.query('textareafield[keyboardInitialized=undefined]'));

        Ext.each(newInputs, function(input) {
            input.config.keyboardInitialized=true;
            config.accepted = function(e, keyboard, el) {
                // every time the keyboard changes a value trigger the change event on the textfield
                input.fireEvent('change', input, keyboard.$el.val(), keyboard.$keyboard.find('input').val());
            };
            jQuery(input.element.dom).find('input').keyboard(config);
            jQuery(input.element.dom).find('textarea').keyboard(config);
        });


    },
    /**
     * Abstract the save data action from a specific panel
     *
     * @param panel {Ext.Component} The panel to collect data from
     * @param callback {Fucntion}   the function to call after save operation is finished, arguments:
     *                               - panel {Ext.Component} see above
     */
    saveData: function(panel, callback) {

        // first check if all data is valid
        var validations = {
            valid: true,
            errors: {}
        };
        this.getApplication().fireEvent('validatedata', panel, validations);
        if(!validations.valid) {
            // at least one record is not valid
            // display errors and let the user fix them
            var msg = '';
            Ext.Object.each(validations.errors, function(modelName, errors) {
                msg += "<br><br><b>" + modelName + ":</b>";
                errors.each(function (error) {
                    msg += "<br>&nbsp;&nbsp;&nbsp;" + error._field + " " + error._message;
                });
            });
            
            var me = this;
            Ext.Msg.alert(
                Bancha.t('Invalid Data'),
                ['<div style="text-align:left; padding-left:50px;">',
                 Bancha.t('There are errors in your data:'),
                 msg,
                 '</div>'].join(''),
                function() {
                    me.enable('Viewport');
                }
            );

            callback(panel);
            return;
        }


        // model is valid, so let's save it


        // every subscriber will increase coutner by one, and decrease when saving is finished
        // when counter is 0 the datasaved event will be fired
        var internalCounter = 0;
        var counter = {
            inc: function() {
                internalCounter++;
            },
            dec: function() {
                internalCounter--;
                if(internalCounter === 0) {
                    callback(panel);
                }
            }
        };
        this.getApplication().fireEvent('savedata', panel, counter);

        // if the counter still is zero, no subscriber has changes
        if(internalCounter===0) {
            callback(panel);
        }
    },


    /**
     * The opposit of the recordController mixin's injectData
     * This will remove all model data from a panel
     *
     * @param panel {Ext.Panel} the panel to clear
     */
    clearData: function(panel) {

        // delete field-specific data
        Ext.Array.each(panel.query('[modelField]'), function(item) {
            item.reset();
        });


        // delete model-specific data
        Ext.Array.each(panel.query('[model]'), function(component) {
            component.setData({});
        });
        Ext.Array.each(panel.query('[models]'), function(component) {
            if(Ext.isString(component.config.models)) {
                component.config.models = component.config.models.split(',');
            }
            
            var data = {};
            Ext.each(component.config.models, function(templateModelName) {
                data[templateModelName] = {};
            });
            component.setData(data);
        });
    },

    /**
     * Sets the headers left title to the provided value
     * 
     * @param title {String} the title to set
     */
    setCheckpointTitle: function(title) {
        this.getHeader().query('#header_left_column')[0].setTitle(title);
    }
});