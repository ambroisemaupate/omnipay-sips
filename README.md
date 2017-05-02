# Omnipay gateway for Atos SIPS

Forked from [cleverage/omnipay](https://github.com/cleverage/omnipay/tree/86393d95e6413fc986f4559dadf523d7a0103dc5) pull request.

## Usage

Every calls to SIPS binary may throw a `SipsBinaryException` if shell exec is mis-configured (`-1` return code). However, an *accepted* or
*refused* payment should return a `0` code from SIPS binary. That’s why `isSuccessful` method does not care about 
binary return code but **responseCode**.

### 1. Generating a credit card form

Before being redirected to bank website, we must generate a credit-card form using
SIPS binary and gateway `purchase` method. 

```php
$gateway = \Omnipay\Omnipay::create('Sips');
$gateway->setMerchantId('XXXXXXXXXXXXXXXXX');
$gateway->setSipsFolderPath('/path/to/sogenactif');

$card = new \Omnipay\Sips\OffsiteCreditCard();
$card->setEmail('test@test.com');

// Send purchase request
$request = $gateway->purchase(
    [
        'clientIp' => $request->getClientIp(),
        'amount' => '10.00',
        'currency' => 'EUR',
        'returnUrl' => $this->generateUrl('completePurchaseRoute', [], UrlGenerator::ABSOLUTE_URL),
        'notifyUrl' => $this->generateUrl('completePurchaseRoute', [], UrlGenerator::ABSOLUTE_URL),
        'cancelUrl' => $this->generateUrl('cancelRoute', [], UrlGenerator::ABSOLUTE_URL),
        'card' => $card
    ]
);
$response = $request->send();

if ($response->isSuccessful()) {
    echo $response->getBuffer();
} else {
    echo $response->getMessage();
}
```

### 2. Receiving bank notification

After customer filled up his credit card informations on bank website, a `POST` request
will be send with a `DATA` content. This must be decoded using SIPS binary and `completePurchase` gateway method.

```php
// Send completePurchase request
$request = $gateway->completePurchase(
    [
        'sipsData' => $request->request->get('DATA'),
    ]
);
$response = $request->send();

if ($response->isSuccessful()) {
    echo $response->getTransactionId();
} else {
    echo $response->getMessage();
}
```

## Test credit card numbers

| Number | Response |
| --- | --- |
| 4974934125497800 | 00 (accepted) |
| 4972187615205 | 05 (refused) |