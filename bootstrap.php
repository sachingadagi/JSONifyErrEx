<?php
/**
 *
 * Bootstrapper for JSONIfyErrEx
 *
 * @abstract Starting point of application
 *
 * @author Rohan Sakhale <rs@saiashirwad.com>
 *
 * @since v1
 */

/**
 * Define Constants that can be used globally in entire application
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined('JSONIFY_BASEPATH')) {
    define('JSONIFY_BASEPATH', __DIR__ . DS);
}

header("Developed-By: Sachin Gadagi");

// Tell PHP that we're using UTF-8 strings until the end of the script
mb_internal_encoding('UTF-8');

// Tell PHP that we'll be outputting UTF-8 to the browser
mb_http_output('UTF-8');

/**
 * Turn on output buffering with the gzhandler
 * This will help send compressed data from server to client
 * Note: `zlib` module is required to run gzhandler
 */
ini_set("zlib.output_compression", "On");
/*
 * if (function_exists('ob_start')) { ob_start('ob_gzhandler'); }
 */

/**
 *     Load Third Party Classes
 */
if (file_exists('vendor' . DS . 'autoload.php')) {
    require_once 'vendor/autoload.php';
}
require_once 'src/Autoload.php';
