<?php
/**
 * Class JSONifyErrors
 * A utility/helper class that will jsonify the errors/Exception messages
 *
 * @author Sachin Gadagi (tuxer)
 * @author Rohan Sakhale <rs@saiashirwad.com>
 *
 * @since  12/6/2015 05:07 pm
 */
namespace tuxer\JSONifyErrors;

class JSONifyErrors extends \Exception implements \JsonSerializable
{

    private $logger;

    private static $errorsList = [];

    /**
     * @param $mixedVariable
     */
    public function __construct($message, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
        \Logger::configure(JSONIFY_BASEPATH . DS . 'config.xml');
        $this->logger = \Logger::getLogger("main");
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
        if ($this->logger->isDebugEnabled()) {
            $error['trace'] = $this->getTrace();
        }
        return $error;
    }

    /**
     * @param $file
     */
    public static function configure($file)
    {
        if (file_exists($file)) {
            $errorFileContents = file_get_contents($file);
            $errorsMsgList = json_decode($errorFileContents, true);
            self::$errorsList += $errorsMsgList;
        } else {
            throw new JSONifyErrors("Configuration file not found", 10001);
        }
    }

    /**
     * @param $errorCode
     */
    public static function throwError($errorCode = 0)
    {
        if (count(self::$errorsList) === 0) {
            self::configure(JSONIFY_BASEPATH . DS . 'src' . DS . 'tuxer' . DS . 'JSONifyErrors' . DS . 'ErrorsList.json');
        }
        if (isset(self::$errorsList[$errorCode])) {
            throw new JSONifyErrors(self::$errorsList[$errorCode], $errorCode);
        } else {
            self::throwError(JSONifyConstants::INVALID_JSONIFY_EXCEPTION);
        }
    }
}
