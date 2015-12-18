<?php
/**
 * Class JSONifyErrors
 * A utility/helper class that will jsonify the errors/Exception messages
 *
 * @author Sachin Gadagi (tuxer)
 *
 * @since  12/6/2015 05:07 pm
 */
namespace tuxer\JSONifyErrors;

class JSONifyErrors extends \Exception implements \JsonSerializable
{

    private $logLevel;

    /**
     * @param $mixedVariable
     */
    public function __construct($message, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->logLevel = ErrorsAndExceptions::LOG_INFO;
    }

    /**
     * @param $logLevel
     */
    public function setLogLevel($logLevel)
    {
        if ($logLevel <= ErrorsAndExceptions::LOG_INFO
            and $logLevel >= ErrorsAndExceptions::LOG_ERR) {
            $this->logLevel = $logLevel;
        } else {
            throw new \Exception("JSONifyErrors: INVALID LOG LEVEL SET", ErrorsAndExceptions::ERROR_INVALID_LOG_LEVEL);
        }
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        $error = [
            'message' => $this->getMessage(),
            'code'    => $this->getCode(),
            'line'    => $this->getLine(),
        ];
        if ($this->logLevel <= ErrorsAndExceptions::LOG_DEBUG) {
            $error['trace'] = $this->mixedVariable->getTrace();
        }

        return $error;
    }

    /**
     * @return string returns stringified json from the exception object
     */
    public function prepareJSON()
    {
        $error = [];

        #depending the type,nature of exception handle them
        if ($this->error_type == ErrorsAndExceptions::TYPE_PDOException) {

            #using inbuilt functions
            $error["line"] = $this->mixedVariable->getLine();
            $error["code"] = $this->mixedVariable->getCode();
            $error["trace"] = $this->mixedVariable->getTraceAsString();

            # custom error , will return only the phrase that carries the actual error messages e.g  "DevError": " Integrity constraint violation"
            $error["DevError"] = explode(":", $this->mixedVariable->getMessage())[1];

            $this->jsonified_error = json_encode($error);

        }
        return json_encode($this->jsonified_error);
    }

}
