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
use Rebilly\Sdk\Model\ForgotPassword;
use Rebilly\Sdk\Model\Session;
use Rebilly\Sdk\Model\Signin;
use Rebilly\Sdk\Model\Signup;
use Rebilly\Sdk\Model\User;

class AccountApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function activate(
        string $token,
    ): void {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/activation/{token}');

        $request = new Request('POST', $uri);
        $this->client->send($request);
    }

    public function forgotPassword(
        ForgotPassword $forgotPassword,
    ): void {
        $uri = '/forgot-password';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($forgotPassword));
        $this->client->send($request);
    }

    public function logout(): void
    {
        $uri = '/logout';

        $request = new Request('POST', $uri);
        $this->client->send($request);
    }

    /**
     * @return Session
     */
    public function signIn(
        Signin $signin,
    ): Session {
        $uri = '/signin';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($signin));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Session::from($data);
    }

    /**
     * @return User
     */
    public function signUp(
        Signup $signup,
    ): User {
        $uri = '/signup';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($signup));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return User::from($data);
    }
}
