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

class Klarna extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'Klarna',
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

    public function getCredentials(): KlarnaCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(KlarnaCredentials|array $credentials): self
    {
        if (!($credentials instanceof \Rebilly\Sdk\Model\KlarnaCredentials)) {
            $credentials = \Rebilly\Sdk\Model\KlarnaCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getSettings(): KlarnaSettings
    {
        return $this->fields['settings'];
    }

    public function setSettings(KlarnaSettings|array $settings): self
    {
        if (!($settings instanceof \Rebilly\Sdk\Model\KlarnaSettings)) {
            $settings = \Rebilly\Sdk\Model\KlarnaSettings::from($settings);
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
