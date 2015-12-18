<?php
/**
 * Class ErrorsAndException
 * Constants Class
 *
 * @author Sachin Gadagi (tuxer)
 *
 * @since  12/6/2015 05:07 pm
 */
namespace tuxer\JSONifyErrors;

abstract class ErrorsAndExceptions
{
    const TYPE_PDOException = 1;
    const TYPE_MYSQL_EXCEPTION = 2;
    const LOG_INFO = 4;
    const LOG_DEBUG = 3;
    const LOG_WARNING = 2;
    const LOG_ERR = 1;
    const ERROR_INVALID_LOG_LEVEL = 9001;

}
