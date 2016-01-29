<?php
/**
 * JSONifyConstants
 * Maintains easy callable error constants while throwing exceptions
 *
 * @author Rohan Sakhale <rs@saiashirwad.com>
 *
 * @since  Jan 2016
 */
namespace tuxer\JSONifyErrors;

abstract class JSONifyConstants
{
    const CONFIGURATION_NOT_FOUND = '10001';
    const INVALID_JSONIFY_EXCEPTION = '10002';
    const SAMPLE_ERROR = '10003';
}
