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

class WebsiteSettingsPaymentFormFeatures implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('showCoupons', $data)) {
            $this->setShowCoupons($data['showCoupons']);
        }
        if (array_key_exists('fullPageRedirect', $data)) {
            $this->setFullPageRedirect($data['fullPageRedirect']);
        }
        if (array_key_exists('skipRedirectOnPaymentComplete', $data)) {
            $this->setSkipRedirectOnPaymentComplete($data['skipRedirectOnPaymentComplete']);
        }
        if (array_key_exists('hideZeroAmountSummaryItems', $data)) {
            $this->setHideZeroAmountSummaryItems($data['hideZeroAmountSummaryItems']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|string[]
     */
    public function getShowCoupons(): ?array
    {
        return $this->fields['showCoupons'] ?? null;
    }

    /**
     * @param null|string[] $showCoupons
     */
    public function setShowCoupons(null|array $showCoupons): static
    {
        $this->fields['showCoupons'] = $showCoupons;

        return $this;
    }

    public function getFullPageRedirect(): ?bool
    {
        return $this->fields['fullPageRedirect'] ?? null;
    }

    public function setFullPageRedirect(null|bool $fullPageRedirect): static
    {
        $this->fields['fullPageRedirect'] = $fullPageRedirect;

        return $this;
    }

    public function getSkipRedirectOnPaymentComplete(): ?bool
    {
        return $this->fields['skipRedirectOnPaymentComplete'] ?? null;
    }

    public function setSkipRedirectOnPaymentComplete(null|bool $skipRedirectOnPaymentComplete): static
    {
        $this->fields['skipRedirectOnPaymentComplete'] = $skipRedirectOnPaymentComplete;

        return $this;
    }

    public function getHideZeroAmountSummaryItems(): ?bool
    {
        return $this->fields['hideZeroAmountSummaryItems'] ?? null;
    }

    public function setHideZeroAmountSummaryItems(null|bool $hideZeroAmountSummaryItems): static
    {
        $this->fields['hideZeroAmountSummaryItems'] = $hideZeroAmountSummaryItems;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('showCoupons', $this->fields)) {
            $data['showCoupons'] = $this->fields['showCoupons'];
        }
        if (array_key_exists('fullPageRedirect', $this->fields)) {
            $data['fullPageRedirect'] = $this->fields['fullPageRedirect'];
        }
        if (array_key_exists('skipRedirectOnPaymentComplete', $this->fields)) {
            $data['skipRedirectOnPaymentComplete'] = $this->fields['skipRedirectOnPaymentComplete'];
        }
        if (array_key_exists('hideZeroAmountSummaryItems', $this->fields)) {
            $data['hideZeroAmountSummaryItems'] = $this->fields['hideZeroAmountSummaryItems'];
        }

        return $data;
    }
}
