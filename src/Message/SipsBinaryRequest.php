<?php

namespace Omnipay\Sips\Message;

use Guzzle\Http\ClientInterface;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Sips\Merchant;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

/**
 * Class SipsBinaryRequest
 * Represents a call to a Sips binary
 *
 * @package Omnipay\Sips\Message
 */
abstract class SipsBinaryRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $returnContext;

    /**
     * The merchant
     *
     * @var Merchant
     */
    protected $merchant;

    /**
     * @var string
     */
    protected $logoId;

    /**
     * @var string
     */
    protected $logoId2;

    /**
     * @var string
     */
    protected $backgroundId;

    /**
     * @var string
     */
    protected $advert;

    /**
     * Sets the merchant id
     *
     * @param string $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchant->setId($merchantId);
    }

    /**
     * Sets the merchant language
     *
     * @param mixed $merchantLanguage
     */
    public function setMerchantLanguage($merchantLanguage)
    {
        $this->merchant->setLanguage($merchantLanguage);
    }

    /**
     * Sets the merchant country
     *
     * @param $merchantCountry
     */
    public function setMerchantCountry($merchantCountry)
    {
        $this->merchant->setCountry($merchantCountry);
    }

    #endregion

    /**
     * Gets the merchant information
     *
     * @return mixed
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * The path of the folder containing
     * the Sips files (binaries, params...)
     *
     * @var string
     */
    protected $sipsFolderPath;

    /**
     * Sets The path of the folder containing
     * the Sips files (binaries, params...)
     *
     * @param string $sipsFolderPath
     */
    public function setSipsFolderPath($sipsFolderPath)
    {
        $this->sipsFolderPath = $sipsFolderPath;
    }

    /**
     * Gets the path of the folder containing
     * the Sips files (binaries, params...)
     *
     * @return string
     */
    public function getSipsFolderPath()
    {
        return $this->sipsFolderPath;
    }

    /**
     * Gets the path to the Sips PathFile
     *
     * @return string
     */
    public function getSipsPathFilePath()
    {
        return $this->sipsFolderPath . "/param/pathfile";
    }

    /**
     * Gets the path to the Sips request binary
     *
     * @return string
     */
    public function getSipsRequestExecPath()
    {
        return $this->sipsFolderPath . '/bin/request';
    }

    /**
     * Gets the path to the Sips response binary
     *
     * @return string
     */
    public function getSipsResponseExecPath()
    {
        return $this->sipsFolderPath . '/bin/response';
    }

    /**
     * @param mixed $returnContext
     *
     * @return SipsBinaryRequest
     */
    public function setReturnContext($returnContext)
    {
        $this->returnContext = $returnContext;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReturnContext()
    {
        return $this->returnContext;
    }

    /**
     * @return string
     */
    public function getLogoId()
    {
        return $this->logoId;
    }

    /**
     * @param string $logoId
     * @return SipsBinaryRequest
     */
    public function setLogoId($logoId)
    {
        $this->logoId = $logoId;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogoId2()
    {
        return $this->logoId2;
    }

    /**
     * @param string $logoId2
     * @return SipsBinaryRequest
     */
    public function setLogoId2($logoId2)
    {
        $this->logoId2 = $logoId2;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackgroundId()
    {
        return $this->backgroundId;
    }

    /**
     * @param string $backgroundId
     * @return SipsBinaryRequest
     */
    public function setBackgroundId($backgroundId)
    {
        $this->backgroundId = $backgroundId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdvert()
    {
        return $this->advert;
    }

    /**
     * @param string $advert
     * @return SipsBinaryRequest
     */
    public function setAdvert($advert)
    {
        $this->advert = $advert;
        return $this;
    }


    /**
     * Create a new Request
     *
     * @param ClientInterface $httpClient  A Guzzle client to make API calls with
     * @param HttpRequest $httpRequest A Symfony HTTP request object
     */
    public function __construct(ClientInterface $httpClient, HttpRequest $httpRequest)
    {
        parent::__construct($httpClient, $httpRequest);
        $this->merchant = new Merchant();
    }

    /**
     * Gets a string representing all the parameters to pass to the Sips binary
     *
     * @return string
     */
    abstract protected function buildRequest();
}
