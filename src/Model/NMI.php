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

class NMI extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'NMI',
        ] + $data);

        if (array_key_exists('credentials', $data)) {
            $this->setCredentials($data['credentials']);
        }
        if (array_key_exists('settings', $data)) {
            $this->setSettings($data['settings']);
        }
        if (array_key_exists('threeDSecureServer', $data)) {
            $this->setThreeDSecureServer($data['threeDSecureServer']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCredentials(): NMICredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(NMICredentials|array $credentials): static
    {
        if (!($credentials instanceof NMICredentials)) {
            $credentials = NMICredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getSettings(): ?NMISettings
    {
        return $this->fields['settings'] ?? null;
    }

    public function setSettings(null|NMISettings|array $settings): static
    {
        if ($settings !== null && !($settings instanceof NMISettings)) {
            $settings = NMISettings::from($settings);
        }

        $this->fields['settings'] = $settings;

        return $this;
    }

    public function getThreeDSecureServer(): ?NMI3dsServers
    {
        return $this->fields['threeDSecureServer'] ?? null;
    }

    public function setThreeDSecureServer(null|NMI3dsServers|array $threeDSecureServer): static
    {
        if ($threeDSecureServer !== null && !($threeDSecureServer instanceof NMI3dsServers)) {
            $threeDSecureServer = NMI3dsServers::from($threeDSecureServer);
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
        if (array_key_exists('settings', $this->fields)) {
            $data['settings'] = $this->fields['settings']?->jsonSerialize();
        }
        if (array_key_exists('threeDSecureServer', $this->fields)) {
            $data['threeDSecureServer'] = $this->fields['threeDSecureServer']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
