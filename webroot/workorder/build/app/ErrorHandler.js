/*jslint browser: true, vars: true, undef: true, nomen: true, eqeq: false, plusplus: true, bitwise: true, regexp: true, newcap: true, sloppy: true, white: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false */
/*global Ext, Bancha */


Ext.define('WorkOrder.ErrorHandler', {
    require: [
        'Ext.Error',
        'Ext.direct.Manager'
    ],
    constructor : function(options){

        // catch every debug exception thrown from either ExtJS or Bancha
        Ext.Error.handle = function(err) {
            Ext.Msg.alert('Error', err.msg);
        };

        // catch server-side errors
        Ext.direct.Manager.on('exception', function(err){
            // normalize ExtJS and Sencha Touch
            var data = (typeof err.getCode === 'function') ? {
                code: err.getCode(),
                message: err.getMessage(),
                data: {
                    msg: err.getData()
                },

                // bancha-specific
                exceptionType: err.config.exceptionType,
                where: err.config.where,
                trace: err.config.trace
            } : err;
            
            // handle error
            if(data.code==="parse") {
                // parse error
                Ext.Msg.alert('Bancha: Server-Response can not be decoded',data.data.msg);
            } else {
                // exception from server
                Ext.Msg.alert('Bancha: Exception from Server',
                    "<br/><b>"+(data.exceptionType || "Exception")+": "+data.message+"</b><br /><br />"+
                    ((data.where) ? data.where+"<br /><br />Trace:<br />"+data.trace : "<i>Turn on the debug mode in cakephp to see the trace.</i>"));
            }
        });

    } //eo constructor
}); //eo class

// eof
