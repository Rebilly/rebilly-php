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

use Rebilly\Sdk\Trait\HasMetadata;

class PayTabs extends GatewayAccount
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        parent::__construct([
            'gatewayName' => 'PayTabs',
        ] + $data, $metadata);

        if (array_key_exists('credentials', $data)) {
            $this->setCredentials($data['credentials']);
        }
        if (array_key_exists('settings', $data)) {
            $this->setSettings($data['settings']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getCredentials(): PayTabsCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(PayTabsCredentials|array $credentials): static
    {
        if (!($credentials instanceof PayTabsCredentials)) {
            $credentials = PayTabsCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getSettings(): ?PayTabsSettings
    {
        return $this->fields['settings'] ?? null;
    }

    public function setSettings(null|PayTabsSettings|array $settings): static
    {
        if ($settings !== null && !($settings instanceof PayTabsSettings)) {
            $settings = PayTabsSettings::from($settings);
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
            $data['settings'] = $this->fields['settings']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
