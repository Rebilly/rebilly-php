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
    public const SERVICE_GOOGLE_SHEETS = 'google-sheets';

    public const SERVICE_KEAP_INFUSIONSOFT = 'keap-infusionsoft';

    public const SERVICE_INTUIT_QUICKBOOKS = 'intuit-quickbooks';

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

    public function getService(): ?string
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
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('service', $this->fields)) {
            $data['service'] = $this->fields['service'];
        }
        if (array_key_exists('count', $this->fields)) {
            $data['count'] = $this->fields['count'];
        }
        if (array_key_exists('configurations', $this->fields)) {
            $data['configurations'] = $this->fields['configurations'] !== null
                ? array_map(
                    static fn (IntegrationConfigurations $integrationConfigurations) => $integrationConfigurations->jsonSerialize(),
                    $this->fields['configurations'],
                )
                : null;
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }

        return $data;
    }

    private function setService(null|string $service): static
    {
        $this->fields['service'] = $service;

        return $this;
    }

    private function setCount(null|int $count): static
    {
        $this->fields['count'] = $count;

        return $this;
    }

    /**
     * @param null|array[]|IntegrationConfigurations[] $configurations
     */
    private function setConfigurations(null|array $configurations): static
    {
        $configurations = $configurations !== null ? array_map(
            fn ($value) => $value instanceof IntegrationConfigurations ? $value : IntegrationConfigurations::from($value),
            $configurations,
        ) : null;

        $this->fields['configurations'] = $configurations;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
