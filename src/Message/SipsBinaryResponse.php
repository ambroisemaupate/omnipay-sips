<?php

namespace Omnipay\Sips\Message;

use Omnipay\Common\Helper;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Sips\Exception\SipsBinaryException;

/**
 * Class SipsBinaryResponse
 * Represents the result of a Sips binary call
 *
 * @package Omnipay\Sips\Message
 */
abstract class SipsBinaryResponse extends AbstractResponse
{
    /**
     * The return code of the call
     *
     * @var int
     */
    private $code = -1;

    /**
     * The error message
     * (only in debug mode)
     *
     * @var string
     */
    private $error;

    /**
     * Gets the return code of the call
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets the return code of the call
     *
     * @param $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Gets the error message
     * (only in debug mode)
     *
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Sets the error message
     * (only in debug mode)
     *
     * @param $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->getError();
    }


    /**
     * Is the response successful?
     *
     * @return boolean
     */
    abstract public function isSuccessful();

    /**
     * Gets the result components
     *
     * @return array
     */
    abstract protected function getResultComponents();

    /**
     * @param SipsBinaryRequest $request
     * @param $data
     * @param string $class
     */
    public function __construct(SipsBinaryRequest $request, $data, $class = '\Omnipay\Sips\Message\SipsBinaryResponse')
    {
        parent::__construct($request, $data);

        if (strlen($data)) {

            // $date is like : "!param1!param2!...!paramX" + a last "!"... or not
            $paramString = trim($data, '!');

            // $paramString is like : "param1!param2!...!paramX"
            $results = explode("!", "$paramString");

            // $results can contain a subset of all the components
            if (count($this->getResultComponents()) > count($results)) {
                $components = array_slice($this->getResultComponents(), 0, count($results));
            } else {
                // sometimes there are more result than components too.
                $components = $this->getResultComponents();
                $results = array_slice($results, 0, count($this->getResultComponents()));
            }

            // Creates a key/value array from the result
            $parameters = array_combine($components, $results);

            Helper::initialize($this, $parameters);

            if (0 != $this->code) {
                throw new SipsBinaryException($this->getMessage(), $this);
            }
        }
    }
}
