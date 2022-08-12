<?php

declare(strict_types=1);

namespace Rebilly\Sdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\StreamInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use function \GuzzleHttp\json_encode;
use function \GuzzleHttp\json_decode;
use Rebilly\Sdk\Model\DigitalWalletValidation;
use Rebilly\Sdk\Model\Forbidden;
use Rebilly\Sdk\Model\Unauthorized;
use Rebilly\Sdk\Model\ValidationError;

class DigitalWalletsApi
{
    public function __construct(protected readonly ?ClientInterface $client) {}
    /**
 * @return DigitalWalletValidation

 */
public function validate(
    \Rebilly\Sdk\Model\DigitalWalletValidation $digitalWalletValidation,

): \Rebilly\Sdk\Model\DigitalWalletValidation

 {

    $uri = '/digital-wallets/validation';

    $request = new Request('POST', $uri, body: json_encode($digitalWalletValidation));
    $response = $this->client->send($request);
    $data = json_decode((string) $response->getBody(), true);

    return DigitalWalletValidation::from($data);
    

}
    /**
 * @return DigitalWalletOnboardingApplePay

 */
public function create(
    \Rebilly\Sdk\Model\DigitalWalletOnboardingApplePay $digitalWalletOnboardingApplePay,

): \Rebilly\Sdk\Model\DigitalWalletOnboardingApplePay

 {

    $uri = '/digital-wallets/onboarding/apple-pay';

    $request = new Request('POST', $uri, body: json_encode($digitalWalletOnboardingApplePay));
    $response = $this->client->send($request);
    $data = json_decode((string) $response->getBody(), true);

    return DigitalWalletOnboardingApplePay::from($data);
    

}


