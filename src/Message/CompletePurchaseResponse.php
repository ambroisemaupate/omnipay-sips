<?php

namespace Omnipay\Sips\Message;

/**
 * Class CompletePurchaseResponse
 * @package Omnipay\Sips\Message
 */
class CompletePurchaseResponse extends SipsBinaryResponse
{
    const BANK_RESPONSE_OK = '00';
    const BANK_RESPONSE_PHONE_AUTHORIZATION = '02';
    const BANK_RESPONSE_INVALID_MERCHANT = '03';
    const BANK_RESPONSE_HOLD_CARD = '04';
    const BANK_RESPONSE_REFUSED = '05';
    const BANK_RESPONSE_INVALID_TRANSACTION = '12';
    const BANK_RESPONSE_INVALID_CARD_NUMBER = '14';
    const BANK_RESPONSE_CANCELLED_BY_USER = '17';
    const BANK_RESPONSE_FORMAT_ERROR = '30';
    const BANK_RESPONSE_FRAUD_ATTEMPT = '34';
    const BANK_RESPONSE_TOO_MUCH_ATTEMPTS = '75';
    const BANK_RESPONSE_SERVICE_UNAVAILABLE = '90';

    protected function getResultComponents()
    {
        return array(
            'code',
            'error',
            'merchantId',
            'merchantCountry',
            'amount',
            'transactionId',
            'paymentMeans',
            'transmissionDate',
            'paymentTime',
            'paymentDate',
            'responseCode',
            'paymentCertificate',
            'authorisationId',
            'currencyCode',
            'cardNumber',
            'cvvFlag',
            'cvvResponseCode',
            'bankResponseCode',
            'complementaryCode',
            'complementaryInfo',
            'returnContext',
            'caddie',
            'receiptComplement',
            'merchantLanguage',
            'language',
            'customerId',
            'orderId',
            'customerEmail',
            'customerIpAddress',
            'captureDay',
            'captureMode',
            'data',
            'orderValidity',
            'transactionCondition',
            'statementReference',
            'cardValidity',
            'scoreValue',
            'scoreColor',
            'scoreInfo',
            'scoreThreshold',
            'scoreProfile'
        );
    }

    private $transactionId;
    private $orderId;
    private $caddie;
    private $cardNumber;
    private $amount;
    private $transmissionDate;
    private $returnContext;
    private $orderValidity;
    private $transactionCondition;
    private $statementReference;
    private $cardValidity;
    private $scoreValue;
    private $scoreColor;
    private $scoreInfo;
    private $scoreThreshold;
    private $scoreProfile;

    /**
     * A list of payment means
     *
     * @var string
     */
    private $paymentMeans;

    /**
     * The payment time
     *
     * @var string
     */
    private $paymentTime;

    /**
     * The payment date
     *
     * @var string
     */
    private $paymentDate;

    /**
     * The response code
     *
     * @var string
     */
    private $responseCode;

    /**
     * The payment certificate
     *
     * @var string
     */
    private $paymentCertificate;

    /**
     * The authorisation id
     * (only if the payment if authorised)
     *
     * @var string
     */
    private $authorisationId;

    /**
     * The Cvv flag
     *
     * @var string
     */
    private $cvvFlag;

    /**
     * The Cvv response code
     *
     * @var string
     */
    private $cvvResponseCode;

    /**
     * The bank response code
     *
     * @var string
     */
    private $bankResponseCode;

    /**
     * The complementary code
     *
     * @var string
     */
    private $complementaryCode;

    /**
     * The complementary info
     *
     * @var string
     */
    private $complementaryInfo;

    /**
     * The number of day before transaction
     *
     * @var string
     */
    private $captureDay;

    /**
     * The capture mode
     *
     * @var string
     */
    private $captureMode;

    /**
     * Gets the authorization id
     * (defined only if the payment is authorized)
     * @return mixed
     */
    public function getAuthorisationId()
    {
        return $this->authorisationId;
    }

    /**
     * Sets the authorization id
     * (only if the payment is authorized)
     *
     * @param mixed $authorisationId
     */
    public function setAuthorisationId($authorisationId)
    {
        $this->authorisationId = $authorisationId;
    }

    /**
     * Gets the bank response code
     *
     * @return mixed
     */
    public function getBankResponseCode()
    {
        return $this->bankResponseCode;
    }

    /**
     * Sets the Bank response code
     *
     * @param $bankResponseCode
     */
    public function setBankResponseCode($bankResponseCode)
    {
        $this->bankResponseCode = $bankResponseCode;
    }

    /**
     * Sets the complementary code
     *
     * @param mixed $complementaryCode
     */
    public function setComplementaryCode($complementaryCode)
    {
        $this->complementaryCode = $complementaryCode;
    }

    /**
     * Gets the complementary code
     *
     * @return mixed
     */
    public function getComplementaryCode()
    {
        return $this->complementaryCode;
    }

    /**
     * Sets the complementary info
     *
     * @param mixed $complementaryInfo
     */
    public function setComplementaryInfo($complementaryInfo)
    {
        $this->complementaryInfo = $complementaryInfo;
    }

    /**
     * Gets the complementary info
     *
     * @return mixed
     */
    public function getComplementaryInfo()
    {
        return $this->complementaryInfo;
    }

    /**
     * Sets the CVV flags
     * (only if their is a control number
     * and an authorisation process)
     *
     * @param mixed $cvvFlag
     */
    public function setCvvFlag($cvvFlag)
    {
        $this->cvvFlag = $cvvFlag;
    }

    /**
     * Gets the CVV flags
     * (defined only if their is a control number
     * and an authorisation process)
     *
     * @return mixed
     */
    public function getCvvFlag()
    {
        return $this->cvvFlag;
    }

    /**
     *  Gets the CVV response code
     * (defined only if their is a control number
     * and an authorisation process)
     *
     * @param mixed $cvvResponseCode
     */
    public function setCvvResponseCode($cvvResponseCode)
    {
        $this->cvvResponseCode = $cvvResponseCode;
    }

    /**
     * Sets the CVV response code
     * (defined only if their is a control number
     * and an authorisation process)
     *
     * @return mixed
     */
    public function getCvvResponseCode()
    {
        return $this->cvvResponseCode;
    }

    /**
     * Sets the payment certificate
     * (only if transaction is authorised)
     *
     * @param mixed $paymentCertificate
     */
    public function setPaymentCertificate($paymentCertificate)
    {
        $this->paymentCertificate = $paymentCertificate;
    }

    /**
     * Gets the payment certificate
     * (defined only if transaction is authorised)
     *
     * @return mixed
     */
    public function getPaymentCertificate()
    {
        return $this->paymentCertificate;
    }

    /**
     * Sets the payment date
     *
     * @param mixed $paymentDate
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }

    /**
     * Gets the payment date
     *
     * @return mixed
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    public function getPaymentDateTime()
    {
        return \DateTime::createFromFormat('Ymd Gis', sprintf("%s %s", $this->paymentDate, $this->paymentTime));
    }

    /**
     * Sets the payment means
     *
     * @param mixed $paymentMeans
     */
    public function setPaymentMeans($paymentMeans)
    {
        $this->paymentMeans = $paymentMeans;
    }

    /**
     * Gets the payment mean
     *
     * @return mixed
     */
    public function getPaymentMeans()
    {
        return $this->paymentMeans;
    }

    /**
     * Sets the payment time
     * (only if payment succeed)
     *
     * @param mixed $paymentTime
     */
    public function setPaymentTime($paymentTime)
    {
        $this->paymentTime = $paymentTime;
    }

    /**
     * Gets the payment time
     * (defined only if payment succeed)
     * @return mixed
     */
    public function getPaymentTime()
    {
        return $this->paymentTime;
    }

    /**
     * Sets the response code
     *
     * @param mixed $responseCode
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;
    }

    /**
     * Sets the number of days before capture
     *
     * @param string $captureDay
     */
    public function setCaptureDay($captureDay)
    {
        $this->captureDay = $captureDay;
    }

    /**
     * Gets the number of days before capture
     *
     * @return string
     */
    public function getCaptureDay()
    {
        return $this->captureDay;
    }

    /**
     * Sets the capture mode
     *
     * @param string $captureMode
     */
    public function setCaptureMode($captureMode)
    {
        $this->captureMode = $captureMode;
    }

    /**
     * Gets the capture mode
     *
     * @return string
     */
    public function getCaptureMode()
    {
        return $this->captureMode;
    }

    /**
     * @param mixed $amount
     *
     * @return CompletePurchaseResponse
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $caddie
     *
     * @return CompletePurchaseResponse
     */
    public function setCaddie($caddie)
    {
        $this->caddie = $caddie;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCaddie()
    {
        return $this->caddie;
    }

    /**
     * @param mixed $cardNumber
     *
     * @return CompletePurchaseResponse
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param mixed $orderId
     *
     * @return CompletePurchaseResponse
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $transactionId
     *
     * @return CompletePurchaseResponse
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Gateway Reference
     *
     * @return null|string A reference provided by the gateway to represent this transaction
     */
    public function getTransactionReference()
    {
        return $this->getOrderId();
    }

    /**
     * @param mixed $transmissionDate
     *
     * @return CompletePurchaseResponse
     */
    public function setTransmissionDate($transmissionDate)
    {
        $this->transmissionDate = $transmissionDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransmissionDate()
    {
        return $this->transmissionDate;
    }

    public function getTransmissionDateTime()
    {
        return \DateTime::createFromFormat('YmdGis', $this->transmissionDate);
    }

    /**
     * @param mixed $returnContext
     *
     * @return CompletePurchaseResponse
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
     * @param mixed $transactionCondition
     *
     * @return CompletePurchaseResponse
     */
    public function setTransactionCondition($transactionCondition)
    {
        $this->transactionCondition = $transactionCondition;

        return $this;
    }

    /**
     * Contient le résultat de l’authentification du paiement.
     *
     * @return mixed
     */
    public function getTransactionCondition()
    {
        return $this->transactionCondition;
    }


    /**
     * Ce champ permet au commerçant de transmettre des informations à afficher
     * sur son relevé de compte et celui de ses clients. L’utilisation de ce champ
     * est soumise à un accord bilatéral préalable entre le commerçant et sa banque acquéreur.
     * Toute information transmise dans ce champ par le commerçant lors de la requête
     * de paiement est renvoyée dans la réponse sans modification.
     *
     * @return mixed
     */
    public function getStatementReference()
    {
        return $this->statementReference;
    }

    /**
     * @param mixed $statementReference
     * @return CompletePurchaseResponse
     */
    public function setStatementReference($statementReference)
    {
        $this->statementReference = $statementReference;
        return $this;
    }

    /**
     * Contient la date de validité de la carte bancaire pour une opération de
     * demande d’autorisation. Si la carte ne possède pas de date de
     * validité, ce champ doit être vide.
     *
     * @return mixed
     */
    public function getCardValidity()
    {
        return $this->cardValidity;
    }

    /**
     * @param mixed $cardValidity
     * @return CompletePurchaseResponse
     */
    public function setCardValidity($cardValidity)
    {
        $this->cardValidity = $cardValidity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScoreValue()
    {
        return $this->scoreValue;
    }

    /**
     * @param mixed $scoreValue
     * @return CompletePurchaseResponse
     */
    public function setScoreValue($scoreValue)
    {
        $this->scoreValue = $scoreValue;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScoreColor()
    {
        return $this->scoreColor;
    }

    /**
     * @param mixed $scoreColor
     * @return CompletePurchaseResponse
     */
    public function setScoreColor($scoreColor)
    {
        $this->scoreColor = $scoreColor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScoreInfo()
    {
        return $this->scoreInfo;
    }

    /**
     * @param mixed $scoreInfo
     * @return CompletePurchaseResponse
     */
    public function setScoreInfo($scoreInfo)
    {
        $this->scoreInfo = $scoreInfo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScoreThreshold()
    {
        return $this->scoreThreshold;
    }

    /**
     * @param mixed $scoreThreshold
     * @return CompletePurchaseResponse
     */
    public function setScoreThreshold($scoreThreshold)
    {
        $this->scoreThreshold = $scoreThreshold;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScoreProfile()
    {
        return $this->scoreProfile;
    }

    /**
     * @param mixed $scoreProfile
     * @return CompletePurchaseResponse
     */
    public function setScoreProfile($scoreProfile)
    {
        $this->scoreProfile = $scoreProfile;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderValidity()
    {
        return $this->orderValidity;
    }

    /**
     * @param mixed $orderValidity
     * @return $this
     */
    public function setOrderValidity($orderValidity)
    {
        $this->orderValidity = $orderValidity;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTransactionAccepted()
    {
        return $this->responseCode === static::BANK_RESPONSE_OK;
    }

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return $this->isTransactionAccepted();
    }

    /**
     * Is the transaction cancelled by the user?
     *
     * @return boolean
     */
    public function isCancelled()
    {
        return $this->responseCode === static::BANK_RESPONSE_CANCELLED_BY_USER;
    }

    /**
     * Gets a response status from the response code
     *
     * @return string
     */
    public function getResponseStatus()
    {
        $statuses = array(
            static::BANK_RESPONSE_OK => 'Autorisation acceptée',
            static::BANK_RESPONSE_PHONE_AUTHORIZATION => 'Demande d’autorisation par téléphone à la banque à cause d’un dépassement de plafond d’autorisation sur la carte',
            static::BANK_RESPONSE_INVALID_MERCHANT => 'Contrat de vente inexistant',
            static::BANK_RESPONSE_HOLD_CARD => 'Conserver la carte',
            static::BANK_RESPONSE_REFUSED => 'Autorisation refusée',
            static::BANK_RESPONSE_INVALID_TRANSACTION => 'Transaction invalide, vérifier les paramètres transmis',
            static::BANK_RESPONSE_INVALID_CARD_NUMBER => 'Numéro de porteur invalide',
            static::BANK_RESPONSE_CANCELLED_BY_USER => 'Annulation de l’internaute',
            static::BANK_RESPONSE_FORMAT_ERROR => 'Erreur de format',
            static::BANK_RESPONSE_FRAUD_ATTEMPT => 'Suspicion de fraude',
            static::BANK_RESPONSE_TOO_MUCH_ATTEMPTS => 'Nombre de tentatives de saisie du numéro de carte dépassé',
            static::BANK_RESPONSE_SERVICE_UNAVAILABLE => 'Service temporairement indisponible'
        );

        if(!isset($this->responseCode)){
            return 'Pas de code réponse';
        }
        else if (isset($statuses[$this->responseCode])) {
            return $statuses[$this->responseCode];
        }
        else {
            return 'Code réponse inconnu : '.$this->responseCode;
        }
    }
}
