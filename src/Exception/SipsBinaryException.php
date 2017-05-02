<?php

namespace Omnipay\Sips\Exception;

use Omnipay\Sips\Message\SipsBinaryResponse;
use Throwable;

class SipsBinaryException extends \RuntimeException
{
    /**
     * @var SipsBinaryResponse
     */
    private $binaryResponse;

    /**
     * SipsBinaryException constructor.
     * @param string $message
     * @param SipsBinaryResponse $binaryResponse
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", SipsBinaryResponse $binaryResponse, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->binaryResponse = $binaryResponse;
    }

    /**
     * @return SipsBinaryResponse
     */
    public function getBinaryResponse()
    {
        return $this->binaryResponse;
    }
}