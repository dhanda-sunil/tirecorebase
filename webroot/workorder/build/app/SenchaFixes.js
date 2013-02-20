/*jslint browser: true, vars: true, undef: true, nomen: true, eqeq: false, plusplus: true, bitwise: true, regexp: true, newcap: true, sloppy: true, white: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false */
/*global Ext, Bancha */


// a fake class to import of sencha fixes
Ext.define('WorkOrder.SenchaFixes', {});





// Bug fix for Sencha Touch 2.0.1.1
// See http://www.sencha.com/forum/showthread.php?238710-Ext.Function.createdBuffered-uses-the-first-not-the-current-arguments&p=876372#post876372

Ext.Function.createBuffered = function(fn, buffer, scope, passedArgs) {
    var timerId,
        args;

    return function() {
        if (!scope) {
            scope = this;
        }

        // always keep the first args per execution
        if(!args){
            args = Array.prototype.slice.call(arguments);
        }

        if (timerId) {
            clearTimeout(timerId);
            timerId = null;
        }

        timerId = setTimeout(function(){
            fn.apply(scope, Ext.isDefined(passedArgs) ? passedArgs : args);
            args = undefined; // reset
        }, buffer);
    };
};



// Bug fix for Sencha Touch 2.0.1.1
// See http://www.sencha.com/forum/showthread.php?241165-Writer-writeDate-bug-for-allowNull&p=882546#post882546
Ext.define('Ext.data.override.Writer', {
    override: 'Ext.data.Writer',
    writeDate: function (field, date) {
        if(date===null || !Ext.isDefined(date)) {
            if(field.getAllowNull()) {
                return null;
            } else {
                Ext.Error.raise('SOME ERROR MESSAGE HERE');
            }
        }
        var dateFormat = field.dateFormat || 'timestamp';
        switch (dateFormat) {
            case 'timestamp':
                return date.getTime()/1000;
            case 'time':
                return date.getTime();
            default:
                return Ext.Date.format(date, dateFormat);
        }
    }
});


//eof