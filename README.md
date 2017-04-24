# Omnipay gateway for Atos SIPS

Forked from [cleverage/omnipay](https://github.com/cleverage/omnipay/tree/86393d95e6413fc986f4559dadf523d7a0103dc5) pull request.

## Usage

```php
$gateway = \Omnipay\Omnipay::create('Sips');
$gateway->setMerchantId('XXXXXXXXXXXXXXXXX');
$gateway->setSipsFolderPath('/path/to/sogenactif');

$card = new \Omnipay\Sips\OffsiteCreditCard();

// Send purchase request
$request = $gateway->purchase(
    [
        'clientIp' => $request->getClientIp(),
        'amount' => '10.00',
        'currency' => 'EUR',
        'returnUrl' => $this->generateUrl('cartRoute', [], UrlGenerator::ABSOLUTE_URL),
        'notifyUrl' => $this->generateUrl('cartRoute', [], UrlGenerator::ABSOLUTE_URL),
        'cancelUrl' => $this->generateUrl('cartRoute', [], UrlGenerator::ABSOLUTE_URL),
        'card' => $card
    ]
);
$response = $request->send();

if ($response->isSuccessful()) {
    echo $response->getData();
} else {
    echo $response->getMessage();
}
```