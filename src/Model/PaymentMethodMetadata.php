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

class PaymentMethodMetadata implements JsonSerializable
{
    public const RELEVANT_BUSINESS_MODELS_B2_B = 'B2B';

    public const RELEVANT_BUSINESS_MODELS_B2_C = 'B2C';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('apiName', $data)) {
            $this->setApiName($data['apiName']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('landscapeLogo', $data)) {
            $this->setLandscapeLogo($data['landscapeLogo']);
        }
        if (array_key_exists('portraitLogo', $data)) {
            $this->setPortraitLogo($data['portraitLogo']);
        }
        if (array_key_exists('summary', $data)) {
            $this->setSummary($data['summary']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('countries', $data)) {
            $this->setCountries($data['countries']);
        }
        if (array_key_exists('storefrontEnabled', $data)) {
            $this->setStorefrontEnabled($data['storefrontEnabled']);
        }
        if (array_key_exists('isSingleUse', $data)) {
            $this->setIsSingleUse($data['isSingleUse']);
        }
        if (array_key_exists('supportedCurrencies', $data)) {
            $this->setSupportedCurrencies($data['supportedCurrencies']);
        }
        if (array_key_exists('relevantBusinessModels', $data)) {
            $this->setRelevantBusinessModels($data['relevantBusinessModels']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('recurringPayments', $data)) {
            $this->setRecurringPayments($data['recurringPayments']);
        }
        if (array_key_exists('refunds', $data)) {
            $this->setRefunds($data['refunds']);
        }
        if (array_key_exists('disputes', $data)) {
            $this->setDisputes($data['disputes']);
        }
        if (array_key_exists('ux', $data)) {
            $this->setUx($data['ux']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getApiName(): string
    {
        return $this->fields['apiName'];
    }

    public function setApiName(string $apiName): static
    {
        $this->fields['apiName'] = $apiName;

        return $this;
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getLandscapeLogo(): ?string
    {
        return $this->fields['landscapeLogo'] ?? null;
    }

    public function setLandscapeLogo(null|string $landscapeLogo): static
    {
        $this->fields['landscapeLogo'] = $landscapeLogo;

        return $this;
    }

    public function getPortraitLogo(): ?string
    {
        return $this->fields['portraitLogo'] ?? null;
    }

    public function setPortraitLogo(null|string $portraitLogo): static
    {
        $this->fields['portraitLogo'] = $portraitLogo;

        return $this;
    }

    public function getSummary(): string
    {
        return $this->fields['summary'];
    }

    public function setSummary(string $summary): static
    {
        $this->fields['summary'] = $summary;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->fields['description'];
    }

    public function setDescription(string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getCountries(): CountriesMetadata
    {
        return $this->fields['countries'];
    }

    public function setCountries(CountriesMetadata|array $countries): static
    {
        if (!($countries instanceof CountriesMetadata)) {
            $countries = CountriesMetadataFactory::from($countries);
        }

        $this->fields['countries'] = $countries;

        return $this;
    }

    public function getStorefrontEnabled(): ?bool
    {
        return $this->fields['storefrontEnabled'] ?? null;
    }

    public function setStorefrontEnabled(null|bool $storefrontEnabled): static
    {
        $this->fields['storefrontEnabled'] = $storefrontEnabled;

        return $this;
    }

    public function getIsSingleUse(): ?bool
    {
        return $this->fields['isSingleUse'] ?? null;
    }

    public function setIsSingleUse(null|bool $isSingleUse): static
    {
        $this->fields['isSingleUse'] = $isSingleUse;

        return $this;
    }

    public function getSupportedCurrencies(): ?PaymentMethodMetadataSupportedCurrencies
    {
        return $this->fields['supportedCurrencies'] ?? null;
    }

    public function setSupportedCurrencies(null|PaymentMethodMetadataSupportedCurrencies|array $supportedCurrencies): static
    {
        if ($supportedCurrencies !== null && !($supportedCurrencies instanceof PaymentMethodMetadataSupportedCurrencies)) {
            $supportedCurrencies = PaymentMethodMetadataSupportedCurrenciesFactory::from($supportedCurrencies);
        }

        $this->fields['supportedCurrencies'] = $supportedCurrencies;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getRelevantBusinessModels(): ?array
    {
        return $this->fields['relevantBusinessModels'] ?? null;
    }

    /**
     * @param null|string[] $relevantBusinessModels
     */
    public function setRelevantBusinessModels(null|array $relevantBusinessModels): static
    {
        $this->fields['relevantBusinessModels'] = $relevantBusinessModels;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getRecurringPayments(): ?bool
    {
        return $this->fields['recurringPayments'] ?? null;
    }

    public function setRecurringPayments(null|bool $recurringPayments): static
    {
        $this->fields['recurringPayments'] = $recurringPayments;

        return $this;
    }

    public function getRefunds(): ?bool
    {
        return $this->fields['refunds'] ?? null;
    }

    public function setRefunds(null|bool $refunds): static
    {
        $this->fields['refunds'] = $refunds;

        return $this;
    }

    public function getDisputes(): ?bool
    {
        return $this->fields['disputes'] ?? null;
    }

    public function setDisputes(null|bool $disputes): static
    {
        $this->fields['disputes'] = $disputes;

        return $this;
    }

    /**
     * @return null|PaymentMethodMetadataUx[]
     */
    public function getUx(): ?array
    {
        return $this->fields['ux'] ?? null;
    }

    /**
     * @param null|array[]|PaymentMethodMetadataUx[] $ux
     */
    public function setUx(null|array $ux): static
    {
        $ux = $ux !== null ? array_map(
            fn ($value) => $value instanceof PaymentMethodMetadataUx ? $value : PaymentMethodMetadataUx::from($value),
            $ux,
        ) : null;

        $this->fields['ux'] = $ux;

        return $this;
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
        if (array_key_exists('apiName', $this->fields)) {
            $data['apiName'] = $this->fields['apiName'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('landscapeLogo', $this->fields)) {
            $data['landscapeLogo'] = $this->fields['landscapeLogo'];
        }
        if (array_key_exists('portraitLogo', $this->fields)) {
            $data['portraitLogo'] = $this->fields['portraitLogo'];
        }
        if (array_key_exists('summary', $this->fields)) {
            $data['summary'] = $this->fields['summary'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('countries', $this->fields)) {
            $data['countries'] = $this->fields['countries']->jsonSerialize();
        }
        if (array_key_exists('storefrontEnabled', $this->fields)) {
            $data['storefrontEnabled'] = $this->fields['storefrontEnabled'];
        }
        if (array_key_exists('isSingleUse', $this->fields)) {
            $data['isSingleUse'] = $this->fields['isSingleUse'];
        }
        if (array_key_exists('supportedCurrencies', $this->fields)) {
            $data['supportedCurrencies'] = $this->fields['supportedCurrencies']?->jsonSerialize();
        }
        if (array_key_exists('relevantBusinessModels', $this->fields)) {
            $data['relevantBusinessModels'] = $this->fields['relevantBusinessModels'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('recurringPayments', $this->fields)) {
            $data['recurringPayments'] = $this->fields['recurringPayments'];
        }
        if (array_key_exists('refunds', $this->fields)) {
            $data['refunds'] = $this->fields['refunds'];
        }
        if (array_key_exists('disputes', $this->fields)) {
            $data['disputes'] = $this->fields['disputes'];
        }
        if (array_key_exists('ux', $this->fields)) {
            $data['ux'] = $this->fields['ux'] !== null
                ? array_map(
                    static fn (PaymentMethodMetadataUx $paymentMethodMetadataUx) => $paymentMethodMetadataUx->jsonSerialize(),
                    $this->fields['ux'],
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
