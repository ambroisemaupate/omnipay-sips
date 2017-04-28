<?php

/*
 * This file is part of the Omnipay package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\Sips;

use Omnipay\Common\AbstractGateway;
use Omnipay\Sips\Message\RequestCall;
use Omnipay\Sips\Message\ResponseCall;

/**
 * Sips Gateway
 */
class Gateway extends AbstractGateway
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Sips';
    }

    /**
     * @inheritdoc
     */
    public function getDefaultParameters()
    {
        return array(
            'merchantId' => '',
            'sipsFolderPath' => ''
        );
    }

    /**
     * Gets the Sips Merchant Id
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    /**
     * Get the Sips binaries folder path
     *
     * @return string
     */
    public function getSipsFolderPath()
    {
        return $this->getParameter('sipsFolderPath');
    }

    /**
     * Sets the Merchant id
     *
     * @param $value
     * @return $this
     */
    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     * Sets the Sips binaries folder path
     *
     * @param $value
     * @return $this
     */
    public function setSipsFolderPath($value)
    {
        return $this->setParameter('sipsFolderPath', $value);
    }

    /**
     * Creates a request with Sips request binary,
     * creating HTML code containing secured links to the gateway
     * The request contains the amount,not modifiable after,
     * therefore the purchase action combines authorization and capture
     *
     * @param array $options
     * @return \Omnipay\Common\Message\RequestInterface|RequestCall
     */
    public function purchase(array $options = array())
    {
        $parameters['merchandId'] = $this->getMerchantId();
        $parameters['sipsFolderPath'] = $this->getSipsFolderPath();

        return $this->createRequest('\Omnipay\Sips\Message\RequestCall', $options);
    }

    /**
     * Handles a response from the payment gateway
     * Usually a notification a success, a cancellation or
     * the user coming back
     *
     * @param array $options
     * @return \Omnipay\Common\Message\RequestInterface|ResponseCall
     */
    public function completePurchase(array $options = array())
    {
        return $this->createRequest('\Omnipay\Sips\Message\ResponseCall', $options);
    }
}
