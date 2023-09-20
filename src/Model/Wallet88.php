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

class Wallet88 extends GatewayAccount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'gatewayName' => 'Wallet88',
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

    public function getCredentials(): Wallet88Credentials
    {
        return $this->fields['credentials'];
    }

    public function setCredentials(Wallet88Credentials|array $credentials): static
    {
        if (!($credentials instanceof Wallet88Credentials)) {
            $credentials = Wallet88Credentials::from($credentials);
        }

        $this->fields['credentials'] = $credentials;

        return $this;
    }

    public function getSettings(): ?Wallet88Settings
    {
        return $this->fields['settings'] ?? null;
    }

    public function setSettings(null|Wallet88Settings|array $settings): static
    {
        if ($settings !== null && !($settings instanceof Wallet88Settings)) {
            $settings = Wallet88Settings::from($settings);
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
