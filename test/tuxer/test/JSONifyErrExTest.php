<?php

namespace tuxer\test;

use tuxer\JSONifyErrors\ErrorsAndExceptions;
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

    public function testDebugException()
    {
        JSONifyErrors::setLogLevel(ErrorsAndExceptions::LOG_DEBUG);
        try {
            throw new JSONifyErrors("This error comes with stacktrace", 901);
        } catch (JSONifyErrors $e) {
            echo json_encode($e);
        }
    }
}
