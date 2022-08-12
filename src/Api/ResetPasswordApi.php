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
use Rebilly\Sdk\Model\ResetPassword;
use Rebilly\Sdk\Model\ResetPasswordTokenInfo;
use Rebilly\Sdk\Model\User;

class ResetPasswordApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return ResetPasswordTokenInfo
     */
    public function getResetPasswordToken(
        string $token,
    ): ResetPasswordTokenInfo {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/reset-password/{token}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ResetPasswordTokenInfo::from($data);
    }

    /**
     * @return User
     */
    public function resetPassword(
        string $token,
        ResetPassword $resetPassword,
    ): User {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/reset-password/{token}');

        $request = new Request('POST', $uri, body: json_encode($resetPassword));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return User::from($data);
    }
}
