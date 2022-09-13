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
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Utils;
use Rebilly\Sdk\Model\DigitalWalletOnboardingApplePay;
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

        $request = new Request('POST', $uri, body: Utils::jsonEncode($digitalWalletValidation));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return DigitalWalletValidation::from($data);
    }

    /**
     * @return DigitalWalletOnboardingApplePay
     */
    public function create(
        DigitalWalletOnboardingApplePay $digitalWalletOnboardingApplePay,
    ): DigitalWalletOnboardingApplePay {
        $uri = '/digital-wallets/onboarding/apple-pay';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($digitalWalletOnboardingApplePay));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return DigitalWalletOnboardingApplePay::from($data);
    }
}
