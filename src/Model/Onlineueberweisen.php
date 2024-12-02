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

class Onlineueberweisen extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'Onlineueberweisen',
        ] + $data);

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

    public function getCredentials(): OnlineueberweisenCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(OnlineueberweisenCredentials|array $credentials): static
    {
        if (!($credentials instanceof OnlineueberweisenCredentials)) {
            $credentials = OnlineueberweisenCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getSettings(): OnlineueberweisenSettings
    {
        return $this->fields['settings'];
    }

    public function setSettings(OnlineueberweisenSettings|array $settings): static
    {
        if (!($settings instanceof OnlineueberweisenSettings)) {
            $settings = OnlineueberweisenSettings::from($settings);
        }

        $this->fields['settings'] = $settings;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('credentials', $this->fields)) {
            $data['credentials'] = $this->fields['credentials']->jsonSerialize();
        }
        if (array_key_exists('settings', $this->fields)) {
            $data['settings'] = $this->fields['settings']->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
