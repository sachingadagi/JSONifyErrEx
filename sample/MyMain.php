<?php
/**
 * MyMain
 * My main class that is invoked some way
 *
 * @author Rohan Sakhale <rs@saiashirwad.com>
 *
 * @since  Jan 2016
 */

use tuxer\JSONifyErrors\JSONifyErrors;

require_once '../bootstrap.php';
require_once 'MyErrors.php';

class MyMain
{
    public function __construct()
    {
        // First configure your JSONifyErrors with custom errors list
        JSONifyErrors::configure('MyErrorsList.json');
    }

    public function m1()
    {
        try
        {
            JSONifyErrors::throwError(MyErrors::FIRST_ERROR);
        } catch (JSONifyErrors $e) {
            echo json_encode($e);
        }
    }
}

$myMain = new MyMain;
$myMain->m1();
