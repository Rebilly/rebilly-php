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

class WebhookAuthorizationOAuth1 implements WebhookAuthorization
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('consumerKey', $data)) {
            $this->setConsumerKey($data['consumerKey']);
        }
        if (array_key_exists('consumerSecret', $data)) {
            $this->setConsumerSecret($data['consumerSecret']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
        if (array_key_exists('tokenSecret', $data)) {
            $this->setTokenSecret($data['tokenSecret']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'oauth1';
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

    public function getConsumerSecret(): string
    {
        return $this->fields['consumerSecret'];
    }

    public function setConsumerSecret(string $consumerSecret): static
    {
        $this->fields['consumerSecret'] = $consumerSecret;

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

    public function getTokenSecret(): string
    {
        return $this->fields['tokenSecret'];
    }

    public function setTokenSecret(string $tokenSecret): static
    {
        $this->fields['tokenSecret'] = $tokenSecret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'oauth1',
        ];
        if (array_key_exists('consumerKey', $this->fields)) {
            $data['consumerKey'] = $this->fields['consumerKey'];
        }
        if (array_key_exists('consumerSecret', $this->fields)) {
            $data['consumerSecret'] = $this->fields['consumerSecret'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }
        if (array_key_exists('tokenSecret', $this->fields)) {
            $data['tokenSecret'] = $this->fields['tokenSecret'];
        }

        return $data;
    }
}
