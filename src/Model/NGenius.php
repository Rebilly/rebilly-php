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

class NGenius extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'NGenius',
        ] + $data);

        if (array_key_exists('credentials', $data)) {
            $this->setCredentials($data['credentials']);
        }
        if (array_key_exists('threeDSecureServer', $data)) {
            $this->setThreeDSecureServer($data['threeDSecureServer']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCredentials(): NGeniusCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(NGeniusCredentials|array $credentials): self
    {
        if (!($credentials instanceof NGeniusCredentials)) {
            $credentials = NGeniusCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getThreeDSecureServer(): ?NGenius3dsServers
    {
        return $this->fields['threeDSecureServer'] ?? null;
    }

    public function setThreeDSecureServer(null|NGenius3dsServers|array $threeDSecureServer): self
    {
        if ($threeDSecureServer !== null && !($threeDSecureServer instanceof NGenius3dsServers)) {
            $threeDSecureServer = NGenius3dsServers::from($threeDSecureServer);
        }

        $this->fields['threeDSecureServer'] = $threeDSecureServer;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('credentials', $this->fields)) {
            $data['credentials'] = $this->fields['credentials']?->jsonSerialize();
        }
        if (array_key_exists('threeDSecureServer', $this->fields)) {
            $data['threeDSecureServer'] = $this->fields['threeDSecureServer']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
