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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class FlexiblePlan implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('richDescription', $data)) {
            $this->setRichDescription($data['richDescription']);
        }
        if (array_key_exists('productId', $data)) {
            $this->setProductId($data['productId']);
        }
        if (array_key_exists('productOptions', $data)) {
            $this->setProductOptions($data['productOptions']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('currencySign', $data)) {
            $this->setCurrencySign($data['currencySign']);
        }
        if (array_key_exists('pricing', $data)) {
            $this->setPricing($data['pricing']);
        }
        if (array_key_exists('setup', $data)) {
            $this->setSetup($data['setup']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
        if (array_key_exists('isActive', $data)) {
            $this->setIsActive($data['isActive']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('isTrialOnly', $data)) {
            $this->setIsTrialOnly($data['isTrialOnly']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('recurringInterval', $data)) {
            $this->setRecurringInterval($data['recurringInterval']);
        }
        if (array_key_exists('trial', $data)) {
            $this->setTrial($data['trial']);
        }
        if (array_key_exists('meteredBilling', $data)) {
            $this->setMeteredBilling($data['meteredBilling']);
        }
        if (array_key_exists('invoiceTimeShift', $data)) {
            $this->setInvoiceTimeShift($data['invoiceTimeShift']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): string
    {
        return $this->fields['id'];
    }

    public function setId(string $id): static
    {
        $this->fields['id'] = $id;

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

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getRichDescription(): ?string
    {
        return $this->fields['richDescription'] ?? null;
    }

    public function setRichDescription(null|string $richDescription): static
    {
        $this->fields['richDescription'] = $richDescription;

        return $this;
    }

    public function getProductId(): string
    {
        return $this->fields['productId'];
    }

    public function setProductId(string $productId): static
    {
        $this->fields['productId'] = $productId;

        return $this;
    }

    /**
     * @return null|array<string,string>
     */
    public function getProductOptions(): ?array
    {
        return $this->fields['productOptions'] ?? null;
    }

    /**
     * @param null|array<string,string> $productOptions
     */
    public function setProductOptions(null|array $productOptions): static
    {
        $this->fields['productOptions'] = $productOptions;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getCurrencySign(): ?string
    {
        return $this->fields['currencySign'] ?? null;
    }

    public function getPricing(): PlanPriceFormula
    {
        return $this->fields['pricing'];
    }

    public function setPricing(PlanPriceFormula|array $pricing): static
    {
        if (!($pricing instanceof PlanPriceFormula)) {
            $pricing = PlanPriceFormulaFactory::from($pricing);
        }

        $this->fields['pricing'] = $pricing;

        return $this;
    }

    public function getSetup(): ?OneTimeSalePlanSetup
    {
        return $this->fields['setup'] ?? null;
    }

    public function setSetup(null|OneTimeSalePlanSetup|array $setup): static
    {
        if ($setup !== null && !($setup instanceof OneTimeSalePlanSetup)) {
            $setup = OneTimeSalePlanSetup::from($setup);
        }

        $this->fields['setup'] = $setup;

        return $this;
    }

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): static
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->fields['isActive'] ?? null;
    }

    public function setIsActive(null|bool $isActive): static
    {
        $this->fields['isActive'] = $isActive;

        return $this;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    public function getIsTrialOnly(): ?bool
    {
        return $this->fields['isTrialOnly'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    public function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    public function getRecurringInterval(): ?SubscriptionOrderPlanRecurringInterval
    {
        return $this->fields['recurringInterval'] ?? null;
    }

    public function setRecurringInterval(null|SubscriptionOrderPlanRecurringInterval|array $recurringInterval): static
    {
        if ($recurringInterval !== null && !($recurringInterval instanceof SubscriptionOrderPlanRecurringInterval)) {
            $recurringInterval = SubscriptionOrderPlanRecurringInterval::from($recurringInterval);
        }

        $this->fields['recurringInterval'] = $recurringInterval;

        return $this;
    }

    public function getTrial(): ?PlanTrial
    {
        return $this->fields['trial'] ?? null;
    }

    public function setTrial(null|PlanTrial|array $trial): static
    {
        if ($trial !== null && !($trial instanceof PlanTrial)) {
            $trial = PlanTrial::from($trial);
        }

        $this->fields['trial'] = $trial;

        return $this;
    }

    public function getMeteredBilling(): ?SubscriptionOrderPlanMeteredBilling
    {
        return $this->fields['meteredBilling'] ?? null;
    }

    public function setMeteredBilling(null|SubscriptionOrderPlanMeteredBilling|array $meteredBilling): static
    {
        if ($meteredBilling !== null && !($meteredBilling instanceof SubscriptionOrderPlanMeteredBilling)) {
            $meteredBilling = SubscriptionOrderPlanMeteredBilling::from($meteredBilling);
        }

        $this->fields['meteredBilling'] = $meteredBilling;

        return $this;
    }

    public function getInvoiceTimeShift(): ?InvoiceTimeShift
    {
        return $this->fields['invoiceTimeShift'] ?? null;
    }

    public function setInvoiceTimeShift(null|InvoiceTimeShift|array $invoiceTimeShift): static
    {
        if ($invoiceTimeShift !== null && !($invoiceTimeShift instanceof InvoiceTimeShift)) {
            $invoiceTimeShift = InvoiceTimeShift::from($invoiceTimeShift);
        }

        $this->fields['invoiceTimeShift'] = $invoiceTimeShift;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('richDescription', $this->fields)) {
            $data['richDescription'] = $this->fields['richDescription'];
        }
        if (array_key_exists('productId', $this->fields)) {
            $data['productId'] = $this->fields['productId'];
        }
        if (array_key_exists('productOptions', $this->fields)) {
            $data['productOptions'] = $this->fields['productOptions'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('currencySign', $this->fields)) {
            $data['currencySign'] = $this->fields['currencySign'];
        }
        if (array_key_exists('pricing', $this->fields)) {
            $data['pricing'] = $this->fields['pricing']?->jsonSerialize();
        }
        if (array_key_exists('setup', $this->fields)) {
            $data['setup'] = $this->fields['setup']?->jsonSerialize();
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('isActive', $this->fields)) {
            $data['isActive'] = $this->fields['isActive'];
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('isTrialOnly', $this->fields)) {
            $data['isTrialOnly'] = $this->fields['isTrialOnly'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('recurringInterval', $this->fields)) {
            $data['recurringInterval'] = $this->fields['recurringInterval']?->jsonSerialize();
        }
        if (array_key_exists('trial', $this->fields)) {
            $data['trial'] = $this->fields['trial']?->jsonSerialize();
        }
        if (array_key_exists('meteredBilling', $this->fields)) {
            $data['meteredBilling'] = $this->fields['meteredBilling']?->jsonSerialize();
        }
        if (array_key_exists('invoiceTimeShift', $this->fields)) {
            $data['invoiceTimeShift'] = $this->fields['invoiceTimeShift']?->jsonSerialize();
        }

        return $data;
    }

    private function setCurrencySign(null|string $currencySign): static
    {
        $this->fields['currencySign'] = $currencySign;

        return $this;
    }

    private function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    private function setIsTrialOnly(null|bool $isTrialOnly): static
    {
        $this->fields['isTrialOnly'] = $isTrialOnly;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }
}
