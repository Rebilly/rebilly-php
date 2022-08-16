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

use JsonSerializable;

class Integration implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('service', $data)) {
            $this->setService($data['service']);
        }
        if (array_key_exists('count', $data)) {
            $this->setCount($data['count']);
        }
        if (array_key_exists('configurations', $data)) {
            $this->setConfigurations($data['configurations']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getService(): ?OAuth2CredentialService
    {
        return $this->fields['service'] ?? null;
    }

    public function getCount(): ?int
    {
        return $this->fields['count'] ?? null;
    }

    /**
     * @return null|IntegrationConfigurations[]
     */
    public function getConfigurations(): ?array
    {
        return $this->fields['configurations'] ?? null;
    }

    /**
     * @return null|array<OAuth2ConnectLink|SelfLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('service', $this->fields)) {
            $data['service'] = $this->fields['service']?->value;
        }
        if (array_key_exists('count', $this->fields)) {
            $data['count'] = $this->fields['count'];
        }
        if (array_key_exists('configurations', $this->fields)) {
            $data['configurations'] = $this->fields['configurations'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setService(null|OAuth2CredentialService|string $service): self
    {
        if ($service !== null && !($service instanceof OAuth2CredentialService)) {
            $service = OAuth2CredentialService::from($service);
        }

        $this->fields['service'] = $service;

        return $this;
    }

    private function setCount(null|int $count): self
    {
        $this->fields['count'] = $count;

        return $this;
    }

    /**
     * @param null|IntegrationConfigurations[] $configurations
     */
    private function setConfigurations(null|array $configurations): self
    {
        $configurations = $configurations !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof IntegrationConfigurations ? $value : IntegrationConfigurations::from($value)) : null, $configurations) : null;

        $this->fields['configurations'] = $configurations;

        return $this;
    }

    /**
     * @param null|array<OAuth2ConnectLink|SelfLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
