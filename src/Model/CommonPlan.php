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

abstract class CommonPlan implements JsonSerializable
{
    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
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
        if (array_key_exists('recurringInterval', $data)) {
            $this->setRecurringInterval($data['recurringInterval']);
        }
        if (array_key_exists('trial', $data)) {
            $this->setTrial($data['trial']);
        }
        if (array_key_exists('isTrialOnly', $data)) {
            $this->setIsTrialOnly($data['isTrialOnly']);
        }
        if (array_key_exists('setup', $data)) {
            $this->setSetup($data['setup']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): self
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getProductId(): string
    {
        return $this->fields['productId'];
    }

    public function setProductId(string $productId): self
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
    public function setProductOptions(null|array $productOptions): self
    {
        $this->fields['productOptions'] = $productOptions;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): self
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

    public function setPricing(PlanPriceFormula|array $pricing): self
    {
        if (!($pricing instanceof \Rebilly\Sdk\Model\PlanPriceFormula)) {
            $pricing = \Rebilly\Sdk\Model\PlanPriceFormula::from($pricing);
        }

        $this->fields['pricing'] = $pricing;

        return $this;
    }

    public function getRecurringInterval(): ?PlanPeriod
    {
        return $this->fields['recurringInterval'] ?? null;
    }

    public function setRecurringInterval(null|PlanPeriod|array $recurringInterval): self
    {
        if ($recurringInterval !== null && !($recurringInterval instanceof PlanPeriod)) {
            $recurringInterval = PlanPeriod::from($recurringInterval);
        }

        $this->fields['recurringInterval'] = $recurringInterval;

        return $this;
    }

    public function getTrial(): ?CommonPlanTrial
    {
        return $this->fields['trial'] ?? null;
    }

    public function setTrial(null|CommonPlanTrial|array $trial): self
    {
        if ($trial !== null && !($trial instanceof \Rebilly\Sdk\Model\CommonPlanTrial)) {
            $trial = \Rebilly\Sdk\Model\CommonPlanTrial::from($trial);
        }

        $this->fields['trial'] = $trial;

        return $this;
    }

    public function getIsTrialOnly(): ?bool
    {
        return $this->fields['isTrialOnly'] ?? null;
    }

    public function getSetup(): ?CommonPlanSetup
    {
        return $this->fields['setup'] ?? null;
    }

    public function setSetup(null|CommonPlanSetup|array $setup): self
    {
        if ($setup !== null && !($setup instanceof \Rebilly\Sdk\Model\CommonPlanSetup)) {
            $setup = \Rebilly\Sdk\Model\CommonPlanSetup::from($setup);
        }

        $this->fields['setup'] = $setup;

        return $this;
    }

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): self
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
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
        if (array_key_exists('recurringInterval', $this->fields)) {
            $data['recurringInterval'] = $this->fields['recurringInterval']?->jsonSerialize();
        }
        if (array_key_exists('trial', $this->fields)) {
            $data['trial'] = $this->fields['trial']?->jsonSerialize();
        }
        if (array_key_exists('isTrialOnly', $this->fields)) {
            $data['isTrialOnly'] = $this->fields['isTrialOnly'];
        }
        if (array_key_exists('setup', $this->fields)) {
            $data['setup'] = $this->fields['setup']?->jsonSerialize();
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setCurrencySign(null|string $currencySign): self
    {
        $this->fields['currencySign'] = $currencySign;

        return $this;
    }

    private function setIsTrialOnly(null|bool $isTrialOnly): self
    {
        $this->fields['isTrialOnly'] = $isTrialOnly;

        return $this;
    }

    private function setRevision(null|int $revision): self
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }
}
