# Omnipay gateway for Atos SIPS

Forked from [cleverage/omnipay](https://github.com/cleverage/omnipay/tree/86393d95e6413fc986f4559dadf523d7a0103dc5) pull request.

## Usage

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

## Numéros de carte de tests

| Numéro | Réponse |
| --- | --- |
| 4974934125497800 | 00 (acceptée) |
| 4972187615205 | 05 (refusée) |