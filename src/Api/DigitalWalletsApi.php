<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

declare(strict_types=1);

namespace Rebilly\Sdk\Api;

use GuzzleHttp\ClientInterface;

use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Model\DigitalWalletValidation;

class DigitalWalletsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return DigitalWalletValidation
     */
    public function validate(
        DigitalWalletValidation $digitalWalletValidation,
    ): DigitalWalletValidation {
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
    ): \Rebilly\Sdk\Model\DigitalWalletOnboardingApplePay {
        $uri = '/digital-wallets/onboarding/apple-pay';

        $request = new Request('POST', $uri, body: json_encode($digitalWalletOnboardingApplePay));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return DigitalWalletOnboardingApplePay::from($data);
    }
}
