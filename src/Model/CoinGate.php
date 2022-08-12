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

class CoinGate extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'CoinGate',
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

    public function getCredentials(): CoinGateCredentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(CoinGateCredentials|array $credentials): self
    {
        if (!($credentials instanceof \Rebilly\Sdk\Model\CoinGateCredentials)) {
            $credentials = \Rebilly\Sdk\Model\CoinGateCredentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getSettings(): CoinGateSettings
    {
        return $this->fields['settings'];
    }

    public function setSettings(CoinGateSettings|array $settings): self
    {
        if (!($settings instanceof \Rebilly\Sdk\Model\CoinGateSettings)) {
            $settings = \Rebilly\Sdk\Model\CoinGateSettings::from($settings);
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
