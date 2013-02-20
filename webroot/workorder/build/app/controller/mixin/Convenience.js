/*jslint browser: true, vars: true, undef: true, nomen: true, eqeq: false, plusplus: true, bitwise: true, regexp: true, newcap: true, sloppy: true, white: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false */
/*global Ext, Bancha, WorkOrder */



(function() {


/**
 * Ext.Function.createBuffered in the current implementation is buggy. This code 
 * can be used instead.
 * 
 * In contrast to Ext.Function.createBuffered this function will call the passed function
 * the the LATEST invocation arguments, a perfect function for remote live search.
 */
var createBufferedWithLastArgs = function(fn, buffer, scope, passedArgs) {

    var timerId,
    args;

    return function() {
        if (!scope) {
            scope = this;
        }

        // always keep the lattest args
        args = Array.prototype.slice.call(arguments);

        if (timerId) {
            clearTimeout(timerId);
            timerId = null;
        }

        timerId = setTimeout(function(){
            fn.apply(scope, Ext.isDefined(passedArgs) ? passedArgs : args);
        }, buffer);
    };
};

/**
 * @class WorkOrder.controller.mixin.Convenience
 *
 * This class started out as a wrapper for common functionality of a controller class.
 *
 * It now also has TreadDesign WorkOrder specific naivgations functions in it
 *
 * For more information about mixins in general see starting at 17:00
 * http://docs.sencha.com/touch/2-0/#!/video/class-system
 */
Ext.define('WorkOrder.controller.mixin.Convenience', {
    statics: {
        /**
         * @private
         * Only used by {@link showScreen} method
         * Keep only one state for all controllers
         */
        activeScreen: 'workorderselection' // default startup screen
    },
    
    /**
     * Gets or instanciates a store as singleton
     *
     * @param storeId {String} the stores storeId
     * @param storeClass {String} (optional) set this if the storeClass name different fromt he storeId
     */
     getStore: function(storeId, storeClass) {
        storeClass = storeClass || 'WorkOrder.store.'+storeId;
        return Ext.StoreMgr.get(storeId) || Ext.create(storeClass);
     },

    /**
     * Gets or instanciates a store and loads the data, if not yet loaded,
     * then it fires the onLoad callback
     *
     * @param storeId {String} the stores storeId
     * @param onLoaded {Function} (optional) the callback to fire after the store loaded the data
     * @param scope {Object} (optional) a scope for onLoaded
     */
    loadStoreData: function(storeId, onLoaded, scope, append) {
        onLoaded = onLoaded || Ext.emptyFn;

        var store = this.getStore(storeId);
        if(store.getCount() === 0) {
            if(!store.isAutoLoading()) {
                store.load();
            }
            store.on('load', onLoaded, scope || this, { single: true});
        } else {
            // store is already loaded
            onLoaded();
        }

        return store;
    },

    /**
     * A small abstraction for all controllers to jump to another screen.
     * 
     * @param xtype {String} the xtype name
     * @param animationDirection {String} either 'left' or 'right' (Default: 'left')
     */
    showScreen: function(newXtype, animationDirection) {
        var current = this.statics().activeScreen,
            animation = {type: 'slide', direction: animationDirection || 'left'};
        this.statics().activeScreen = newXtype;

        if(current === newXtype) {
            return; // nothing to do
        }

        // trigger application event, since listening for show event doesn't work consistent
        this.getApplication().fireEvent('show'+newXtype);
        
        // find the main panel
        var main = Ext.ComponentQuery.query('main')[0],
            currentMainActiveItem  = current==='workorderselection'  ? 0 : (current==='customerselection'  ? 1 : (current==='confirmation'  ? 3 : 2)), //2=accountselection or workorderitems
            newMainActiveItem      = newXtype==='workorderselection' ? 0 : (newXtype==='customerselection' ? 1 : (newXtype==='confirmation'  ? 3 : 2)),
            mainRightNewActiveItem = (newXtype==='accountselection') ? 0 : 1; // if necessary, accountselection or workorderitems

        // do we just have to change the main panel?
        if(newMainActiveItem !== 2) {
            // jump to the work order / customer selection, just change the main panel card
            main.animateActiveItem(newMainActiveItem, animation);
            this.getApplication().fireEvent('panelpainted', main.getAt(newMainActiveItem));
            return;
        }


        var mainright = main.query('#mainrightpanel')[0];
        if(currentMainActiveItem === 2) {
            // select the correct nested panel and that's it
            mainright.animateActiveItem(mainRightNewActiveItem, animation);
            this.getApplication().fireEvent('panelpainted', main.getAt(mainRightNewActiveItem));
            return;
        }
        
        // we need to change both card panels
        // jump from first or second to third panel without animation
        mainright.setActiveItem(mainRightNewActiveItem);
        this.getApplication().fireEvent('panelpainted', main.getAt(mainRightNewActiveItem));

        // animate moving to second main panel (with headers and footers)
        main.animateActiveItem(newMainActiveItem, animation);
        this.getApplication().fireEvent('panelpainted', main.getAt(newMainActiveItem));

    },
    /**
     * The ordering of the screens for {@link showNextScreen} and {@link showPreviousScreen}
     */
    screenOrder: ['workorderselection','customerselection','accountselection','workorderitems','confirmation'],
    /**
     * Displays the previous screen in the logical order (carousel)
     */
    showPreviousScreen: function() {
        this.jumpScreens(-1);
    },
    /**
     * Displays the next screen in the logical order (carousel)
     */
    showNextScreen: function() {
        this.jumpScreens(1);
    },
    /**
     * @private
     * Abstract to a screen carousel
     * @param numberOfJumps {Number} positiv or negative integer
     */
    jumpScreens: function(numberOfJumps) {
        var numberOfScreens = this.screenOrder.length,
            activePosition = this.screenOrder.indexOf(this.statics().activeScreen),
            nextPosition = (activePosition+numberOfJumps) % numberOfScreens; // limit to -5 til +5

        // make number always positiv
        nextPosition = nextPosition>=0 ? nextPosition : (numberOfScreens-nextPosition);

        // show new one
        this.showScreen(this.screenOrder[nextPosition], numberOfJumps>0 ? 'left' : 'right');
    },









    /**
     * Remotly searches for a given string
     * This buffers the execution of the function for 200 milliseconds. If called 
     * again within that period, the impending invocation will be canceled, and the 
     * timeout period will begin again.
     */
    searchFor: createBufferedWithLastArgs(function(grid, search) {
        var store = grid.getStore();

        // make sure it's an string
        search += '';

        // set the new highlight data
        grid.setHighlight(search);

        // load the data
        store.load({
            params: {
                search: search
            }
        });
    }, 200) //of searchFor
});

}()); //eo closure

//eof
