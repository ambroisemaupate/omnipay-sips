<?php

namespace Omnipay\Sips\Message;
/**
 * Class PurchaseResponse
 * @package Omnipay\Sips\Message
 */
class PurchaseResponse extends SipsBinaryResponse
{
    /**
     * A html code buffer
     *
     * @var string
     */
    private $buffer;

    /**
     * Sets the buffer content
     *
     * @param string $buffer
     */
    public function setBuffer($buffer)
    {
        $this->buffer = $buffer;
    }

    /**
     * Gets the buffer content
     *
     * @return string
     */
    public function getBuffer()
    {
        return $this->buffer;
    }

    /**
     * @inheritdoc
     */
    protected function getResultComponents()
    {
        return array(
            'code',
            'error',
            'buffer'
        );
    }
}
