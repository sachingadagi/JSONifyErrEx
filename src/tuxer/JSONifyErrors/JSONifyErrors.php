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

    private $logger;

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
            '$error['trace'] = $this->getTrace();
        }
        return $error;
    }
}
