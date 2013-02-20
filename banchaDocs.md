Error Handling in CakePHP
~~~~~~~~~~~~~~~~~~~~~

On the CakePHP side the error handling works as in every other CakePHP application. There's only one extension, every time there is a exception on a Bancha request in production mode it will be logged to cake error log.  
It will always as well trigger the exception handling on the client side if an exception occured on the server, but this should not be used by purpose, it's intendet for debugging only. If you want to indicate to the client that the request had an error return false, then Bancha will return result.success=false and the failure callback in your JavaScript will be triggered.


Error Handling in the Browser
~~~~~~~~~~~~~~~~~~~~~~~

In production mode all client-side errors will automatically be logged to the CakePHP log file js_error.log, including the full stack trace. In debug mode Bancha does not provide an error handler for the client, this make debugging easier for you.

Logging
~~~~~~

You will often want to log some information to the console in debug mode. For this you can use Bancha.log.info(msg), which abstracts the console.

If you want to log warning and errors, use Bancha.log.warn(msg) and Bancha.log.error(msg). In debug mode these will be logged to the console, in production mode these errors will be logged to the CakePHP log file js_error.log. This works out if the box. If you want the force Bancha to log it to the server, set the second argument to true: Bancha.log.error(msg, true); 

Remote Filtering
~~~~~~~~~~~~~

Bancha will give each store by default to the option to filter on associations. For security reasons other filtering is by default prevented. If you want to expose filtering on other columns, just allow them before calling inside your controller method the pagination with:
$this->Paginator->setAllowedFilters(array('id','name','category','some_other_field'));

Usage Example: 
var store = Ext.create('Ext.data.Store', {
    model: Bancha.getModel('User'),
    remoteFilter: true
});
store.filter('category','admin');
store.load();
