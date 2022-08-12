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

class EcoPayz extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'ecoPayz',
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

    public function getCredentials(): EcoPayzCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(EcoPayzCredentials|array $credentials): self
    {
        if (!($credentials instanceof \Rebilly\Sdk\Model\EcoPayzCredentials)) {
            $credentials = \Rebilly\Sdk\Model\EcoPayzCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getSettings(): ?EcoPayzSettings
    {
        return $this->fields['settings'] ?? null;
    }

    public function setSettings(null|EcoPayzSettings|array $settings): self
    {
        if ($settings !== null && !($settings instanceof \Rebilly\Sdk\Model\EcoPayzSettings)) {
            $settings = \Rebilly\Sdk\Model\EcoPayzSettings::from($settings);
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
        if (array_key_exists('settings', $this->fields)) {
            $data['settings'] = $this->fields['settings']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
