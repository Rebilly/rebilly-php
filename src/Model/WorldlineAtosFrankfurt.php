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

class WorldlineAtosFrankfurt extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'WorldlineAtosFrankfurt',
        ] + $data);

        if (array_key_exists('threeDSecureServer', $data)) {
            $this->setThreeDSecureServer($data['threeDSecureServer']);
        }
        if (array_key_exists('credentials', $data)) {
            $this->setCredentials($data['credentials']);
        }
        if (array_key_exists('settings', $data)) {
            $this->setSettings($data['settings']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getThreeDSecureServer(): ?ThreeDSecureIO3dsServer
    {
        return $this->fields['threeDSecureServer'] ?? null;
    }

    public function setThreeDSecureServer(null|ThreeDSecureIO3dsServer|array $threeDSecureServer): static
    {
        if ($threeDSecureServer !== null && !($threeDSecureServer instanceof ThreeDSecureIO3dsServer)) {
            $threeDSecureServer = ThreeDSecureIO3dsServer::from($threeDSecureServer);
        }

        $this->fields['threeDSecureServer'] = $threeDSecureServer;

        return $this;
    }

    public function getCredentials(): WorldlineAtosFrankfurtCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(WorldlineAtosFrankfurtCredentials|array $credentials): static
    {
        if (!($credentials instanceof WorldlineAtosFrankfurtCredentials)) {
            $credentials = WorldlineAtosFrankfurtCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getSettings(): WorldlineAtosFrankfurtSettings
    {
        return $this->fields['settings'];
    }

    public function setSettings(WorldlineAtosFrankfurtSettings|array $settings): static
    {
        if (!($settings instanceof WorldlineAtosFrankfurtSettings)) {
            $settings = WorldlineAtosFrankfurtSettings::from($settings);
        }

        $this->fields['settings'] = $settings;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('threeDSecureServer', $this->fields)) {
            $data['threeDSecureServer'] = $this->fields['threeDSecureServer']?->jsonSerialize();
        }
        if (array_key_exists('credentials', $this->fields)) {
            $data['credentials'] = $this->fields['credentials']->jsonSerialize();
        }
        if (array_key_exists('settings', $this->fields)) {
            $data['settings'] = $this->fields['settings']->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
