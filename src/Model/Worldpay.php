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

class Worldpay extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'Worldpay',
        ] + $data);

        if (array_key_exists('credentials', $data)) {
            $this->setCredentials($data['credentials']);
        }
        if (array_key_exists('threeDSecureServer', $data)) {
            $this->setThreeDSecureServer($data['threeDSecureServer']);
        }
        if (array_key_exists('settings', $data)) {
            $this->setSettings($data['settings']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCredentials(): WorldpayCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(WorldpayCredentials|array $credentials): self
    {
        if (!($credentials instanceof WorldpayCredentials)) {
            $credentials = WorldpayCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getThreeDSecureServer(): ?Worldpay3dsServers
    {
        return $this->fields['threeDSecureServer'] ?? null;
    }

    public function setThreeDSecureServer(null|Worldpay3dsServers|array $threeDSecureServer): self
    {
        if ($threeDSecureServer !== null && !($threeDSecureServer instanceof Worldpay3dsServers)) {
            $threeDSecureServer = Worldpay3dsServers::from($threeDSecureServer);
        }

        $this->fields['threeDSecureServer'] = $threeDSecureServer;

        return $this;
    }

    public function getSettings(): ?WorldpaySettings
    {
        return $this->fields['settings'] ?? null;
    }

    public function setSettings(null|WorldpaySettings|array $settings): self
    {
        if ($settings !== null && !($settings instanceof WorldpaySettings)) {
            $settings = WorldpaySettings::from($settings);
        }

        $this->fields['settings'] = $settings;

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
        if (array_key_exists('settings', $this->fields)) {
            $data['settings'] = $this->fields['settings']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
