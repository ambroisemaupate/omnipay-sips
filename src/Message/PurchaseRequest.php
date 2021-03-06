<?php

namespace Omnipay\Sips\Message;

use Omnipay\Common\CreditCard;

/**
 * Class PurchaseRequest
 *
 * Defines a call to the Sips Request binary
 *
 * @package Omnipay\Sips\Message
 */
class PurchaseRequest extends SipsBinaryRequest
{
    /**
     * Sends request to the Sips binary file for payment authorization
     *
     * @return PurchaseResponse
     */
    public function sendData($data)
    {
        $path_bin = $this->getSipsRequestExecPath();

        $result = shell_exec("$path_bin $data");
        $response = $this->response = new PurchaseResponse($this, $result);

        if (empty($result)) {
            if (file_exists($path_bin) === false) {
                $response->setError(sprintf('Impossible to launch binary file - Path to binary file seem to be not correct (%s)<br />Command line : %s', $path_bin, $data));
            } elseif (is_executable($path_bin) === false) {
                $perms = substr(sprintf('%o', fileperms($path_bin)), -4);
                $response->setError(sprintf('Impossible to execute binary file - Set correct chmod (current chmod %s)<br />Command line : %s', $perms, $data));
            }
        }

        return $response;
    }

    /**
     * Gets a string representing all the parameters to pass to Sips
     *
     * @return string
     */
    protected function buildRequest()
    {
        /** @var CreditCard $card */
        $card = $this->getCard();

        $params = array(
            'advert' => $this->getAdvert(),
            'logo_id' => $this->getLogoId(),
            'logo_id2' => $this->getLogoId2(),
            'background_id' => $this->getBackgroundId(),
            'pathfile' => $this->getSipsPathFilePath(),
            'merchant_id' => $this->getMerchant()->getId(),
            'merchant_language' => $this->getMerchant()->getLanguage(),
            'merchant_country' => $this->getMerchant()->getCountry(),
            'amount' => sprintf('%1$03d', $this->getAmountInteger()),
            'currency_code' => $this->getCurrencyNumeric(),
            'transaction_id' => $this->getTransactionId(),
            'order_id' => $this->getTransactionReference(),
            'customer_email' => $card->getEmail(),
            'customer_ip_address' => $this->getClientIp(),
            'caddie' => $this->buildCaddie(),
            'return_context' => $this->getReturnContext(),
            'cancel_return_url' => $this->getCancelUrl(),
            'automatic_response_url' => $this->getNotifyUrl(),
            'normal_return_url' => $this->getReturnUrl()
        );

        $params = array_filter($params);

        $response = array();
        foreach ($params as $key => $value) {
            $response[] = $key . '=' . $value;
        }

        return implode(' ', $response);
    }

    /**
     * Gets a unique string representing
     * this specific shopping cart
     *
     * @return string
     */
    protected function buildCaddie()
    {
        /** @var CreditCard $card */
        $card = $this->getCard();

        $cartParams = array(
            $this->getClientIp(),
            $card->getBillingFirstName(),
            $card->getBillingLastName(),
            $card->getBillingCompany(),
            $card->getBillingAddress1() . ' ' . $card->getBillingAddress2(),
            $card->getBillingCity(),
            $card->getBillingPostcode(),
            $card->getBillingCountry(),
            $card->getBillingPhone(),
            $card->getEmail(),
            $this->getTransactionId(),
            $this->getAmountInteger()
        );

        return trim(base64_encode(serialize($cartParams)));
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        $this->validate('amount', 'returnUrl', 'cancelUrl', 'card', 'currency');
        $this->getCard()->validate();
        return $this->buildRequest();
    }
}
