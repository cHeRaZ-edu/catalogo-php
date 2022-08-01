<?php
// Toggle this to change the setting
define('DEBUG', true);
// You want all errors to be triggered
error_reporting(E_ALL);
if(DEBUG == true) {
    ini_set('display_errors', 1);
}
else {
    ini_set('display_errors', 0);
}
ini_set('log_errors', true);
//DEBUG developer and production
function myExceptionHandler ($e)
{
    error_log($e);
    http_response_code(500);
    if (filter_var(ini_get('display_errors'),FILTER_VALIDATE_BOOLEAN)) {
        require('errors/error.php');
        messageLog('Error Page', $e);
    } else {
        require('whoops.php');
    }
    exit;
}
set_exception_handler('myExceptionHandler');
set_error_handler(function ($level, $message, $file = '', $line = 0)
{
    throw new ErrorException($message, 0, $level, $file, $line);
});
register_shutdown_function(function ()
{
    $error = error_get_last();
    if ($error !== null) {
        $e = new ErrorException(
            $error['message'], 0, $error['type'], $error['file'], $error['line']
        );
        myExceptionHandler($e);
    }
});