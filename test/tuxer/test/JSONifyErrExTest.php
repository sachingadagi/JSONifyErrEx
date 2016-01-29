<?php

namespace tuxer\test;

use tuxer\JSONifyErrors\JSONifyConstants;
use tuxer\JSONifyErrors\JSONifyErrors;

class JSONifyErrExTest extends \PHPUnit_Framework_TestCase
{

    public function testWrapException()
    {
        try {
            JSONifyErrors::throwError(JSONifyConstants::SAMPLE_ERROR);
        } catch (JSONifyErrors $e) {
            echo json_encode($e);
        }
    }
}
