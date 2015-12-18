<?php

namespace tuxer\test;

use tuxer\JSONifyErrors\JSONifyErrors;

class JSONifyErrExTest extends \PHPUnit_Framework_TestCase
{
    public function testWrapException()
    {
        try {
            throw new JSONifyErrors("This is test", 900);
        } catch (JSONifyErrors $e) {
            echo json_encode($e);
        }
    }
}
