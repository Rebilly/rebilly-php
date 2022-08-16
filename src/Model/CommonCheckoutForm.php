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

abstract class CommonCheckoutForm implements JsonSerializable
{
    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('customDomain', $data)) {
            $this->setCustomDomain($data['customDomain']);
        }
        if (array_key_exists('plans', $data)) {
            $this->setPlans($data['plans']);
        }
        if (array_key_exists('addonPlans', $data)) {
            $this->setAddonPlans($data['addonPlans']);
        }
        if (array_key_exists('bumpPlans', $data)) {
            $this->setBumpPlans($data['bumpPlans']);
        }
        if (array_key_exists('accountsEnabled', $data)) {
            $this->setAccountsEnabled($data['accountsEnabled']);
        }
        if (array_key_exists('couponsEnabled', $data)) {
            $this->setCouponsEnabled($data['couponsEnabled']);
        }
        if (array_key_exists('purchaseLimit', $data)) {
            $this->setPurchaseLimit($data['purchaseLimit']);
        }
        if (array_key_exists('paymentMethods', $data)) {
            $this->setPaymentMethods($data['paymentMethods']);
        }
        if (array_key_exists('customization', $data)) {
            $this->setCustomization($data['customization']);
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

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): self
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getCustomDomain(): ?string
    {
        return $this->fields['customDomain'] ?? null;
    }

    public function setCustomDomain(null|string $customDomain): self
    {
        $this->fields['customDomain'] = $customDomain;

        return $this;
    }

    /**
     * @return CheckoutFormPlans[]
     */
    public function getPlans(): array
    {
        return $this->fields['plans'];
    }

    /**
     * @param CheckoutFormPlans[] $plans
     */
    public function setPlans(array $plans): self
    {
        $plans = array_map(fn ($value) => $value !== null ? ($value instanceof CheckoutFormPlans ? $value : CheckoutFormPlans::from($value)) : null, $plans);

        $this->fields['plans'] = $plans;

        return $this;
    }

    /**
     * @return null|CheckoutFormPlans[]
     */
    public function getAddonPlans(): ?array
    {
        return $this->fields['addonPlans'] ?? null;
    }

    /**
     * @param null|CheckoutFormPlans[] $addonPlans
     */
    public function setAddonPlans(null|array $addonPlans): self
    {
        $addonPlans = $addonPlans !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CheckoutFormPlans ? $value : CheckoutFormPlans::from($value)) : null, $addonPlans) : null;

        $this->fields['addonPlans'] = $addonPlans;

        return $this;
    }

    /**
     * @return null|CheckoutFormPlans[]
     */
    public function getBumpPlans(): ?array
    {
        return $this->fields['bumpPlans'] ?? null;
    }

    /**
     * @param null|CheckoutFormPlans[] $bumpPlans
     */
    public function setBumpPlans(null|array $bumpPlans): self
    {
        $bumpPlans = $bumpPlans !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CheckoutFormPlans ? $value : CheckoutFormPlans::from($value)) : null, $bumpPlans) : null;

        $this->fields['bumpPlans'] = $bumpPlans;

        return $this;
    }

    public function getAccountsEnabled(): ?bool
    {
        return $this->fields['accountsEnabled'] ?? null;
    }

    public function setAccountsEnabled(null|bool $accountsEnabled): self
    {
        $this->fields['accountsEnabled'] = $accountsEnabled;

        return $this;
    }

    public function getCouponsEnabled(): ?bool
    {
        return $this->fields['couponsEnabled'] ?? null;
    }

    public function setCouponsEnabled(null|bool $couponsEnabled): self
    {
        $this->fields['couponsEnabled'] = $couponsEnabled;

        return $this;
    }

    public function getPurchaseLimit(): ?int
    {
        return $this->fields['purchaseLimit'] ?? null;
    }

    public function setPurchaseLimit(null|int $purchaseLimit): self
    {
        $this->fields['purchaseLimit'] = $purchaseLimit;

        return $this;
    }

    /**
     * @return null|PaymentMethod[]
     */
    public function getPaymentMethods(): ?array
    {
        return $this->fields['paymentMethods'] ?? null;
    }

    /**
     * @param null|PaymentMethod[] $paymentMethods
     */
    public function setPaymentMethods(null|array $paymentMethods): self
    {
        $paymentMethods = $paymentMethods !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof PaymentMethod ? $value : PaymentMethod::from($value)) : null, $paymentMethods) : null;

        $this->fields['paymentMethods'] = $paymentMethods;

        return $this;
    }

    public function getCustomization(): ?CommonCheckoutFormCustomization
    {
        return $this->fields['customization'] ?? null;
    }

    public function setCustomization(null|CommonCheckoutFormCustomization|array $customization): self
    {
        if ($customization !== null && !($customization instanceof CommonCheckoutFormCustomization)) {
            $customization = CommonCheckoutFormCustomization::from($customization);
        }

        $this->fields['customization'] = $customization;

        return $this;
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
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('customDomain', $this->fields)) {
            $data['customDomain'] = $this->fields['customDomain'];
        }
        if (array_key_exists('plans', $this->fields)) {
            $data['plans'] = $this->fields['plans'];
        }
        if (array_key_exists('addonPlans', $this->fields)) {
            $data['addonPlans'] = $this->fields['addonPlans'];
        }
        if (array_key_exists('bumpPlans', $this->fields)) {
            $data['bumpPlans'] = $this->fields['bumpPlans'];
        }
        if (array_key_exists('accountsEnabled', $this->fields)) {
            $data['accountsEnabled'] = $this->fields['accountsEnabled'];
        }
        if (array_key_exists('couponsEnabled', $this->fields)) {
            $data['couponsEnabled'] = $this->fields['couponsEnabled'];
        }
        if (array_key_exists('purchaseLimit', $this->fields)) {
            $data['purchaseLimit'] = $this->fields['purchaseLimit'];
        }
        if (array_key_exists('paymentMethods', $this->fields)) {
            $data['paymentMethods'] = $this->fields['paymentMethods'];
        }
        if (array_key_exists('customization', $this->fields)) {
            $data['customization'] = $this->fields['customization']?->jsonSerialize();
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

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }
}
