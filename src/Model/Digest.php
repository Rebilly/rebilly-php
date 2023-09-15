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

namespace Rebilly\Sdk\Model;

use JsonSerializable;

class Digest implements WebhookAuthorization, JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('username', $data)) {
            $this->setUsername($data['username']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('consumerSecret', $data)) {
            $this->setConsumerSecret($data['consumerSecret']);
        }
        if (array_key_exists('consumerKey', $data)) {
            $this->setConsumerKey($data['consumerKey']);
        }
        if (array_key_exists('tokenSecret', $data)) {
            $this->setTokenSecret($data['tokenSecret']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'digest';
    }

    public function getUsername(): string
    {
        return $this->fields['username'];
    }

    public function setUsername(string $username): static
    {
        $this->fields['username'] = $username;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->fields['password'];
    }

    public function setPassword(string $password): static
    {
        $this->fields['password'] = $password;

        return $this;
    }

    public function getConsumerSecret(): string
    {
        return $this->fields['consumerSecret'];
    }

    public function setConsumerSecret(string $consumerSecret): static
    {
        $this->fields['consumerSecret'] = $consumerSecret;

        return $this;
    }

    public function getConsumerKey(): string
    {
        return $this->fields['consumerKey'];
    }

    public function setConsumerKey(string $consumerKey): static
    {
        $this->fields['consumerKey'] = $consumerKey;

        return $this;
    }

    public function getTokenSecret(): string
    {
        return $this->fields['tokenSecret'];
    }

    public function setTokenSecret(string $tokenSecret): static
    {
        $this->fields['tokenSecret'] = $tokenSecret;

        return $this;
    }

    public function getToken(): string
    {
        return $this->fields['token'];
    }

    public function setToken(string $token): static
    {
        $this->fields['token'] = $token;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'digest',
        ];
        if (array_key_exists('username', $this->fields)) {
            $data['username'] = $this->fields['username'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('consumerSecret', $this->fields)) {
            $data['consumerSecret'] = $this->fields['consumerSecret'];
        }
        if (array_key_exists('consumerKey', $this->fields)) {
            $data['consumerKey'] = $this->fields['consumerKey'];
        }
        if (array_key_exists('tokenSecret', $this->fields)) {
            $data['tokenSecret'] = $this->fields['tokenSecret'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }

        return $data;
    }
}
