<?php
/**
 *
 * Define AutoLoader
 *
 * @author Rohan Sakhale <rs@saiashirwad.com>
 *
 * @since v1
 */

spl_autoload_register(
    function ($classname) {
        $foldersToCheckIn = ['src', 'test'];
        foreach ($foldersToCheckIn as $folderName) {
            $classpath = JSONIFY_BASEPATH . $folderName . DS . $classname . '.php';

            if (file_exists($classpath)) {
                require_once $classpath;
                break;
            }
        }
    }
);
