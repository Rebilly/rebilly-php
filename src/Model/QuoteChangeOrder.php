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

class QuoteChangeOrder implements Quote
{
    public const TYPE_SUBSCRIPTION_ORDER = 'subscription-order';

    public const TYPE_ONE_TIME_ORDER = 'one-time-order';

    public const ACCEPTANCE_CONDITIONS_CUSTOMER = 'customer';

    public const ACCEPTANCE_CONDITIONS_PAYMENT = 'payment';

    public const STATUS_DRAFT = 'draft';

    public const STATUS_ISSUED = 'issued';

    public const STATUS_ACCEPTED = 'accepted';

    public const STATUS_REJECTED = 'rejected';

    public const STATUS_CANCELED = 'canceled';

    public const STATUS_EXPIRED = 'expired';

    public const RENEWAL_POLICY_RESET = 'reset';

    public const RENEWAL_POLICY_RETAIN = 'retain';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('acceptanceConditions', $data)) {
            $this->setAcceptanceConditions($data['acceptanceConditions']);
        }
        if (array_key_exists('acceptanceFulfillment', $data)) {
            $this->setAcceptanceFulfillment($data['acceptanceFulfillment']);
        }
        if (array_key_exists('subscriptionId', $data)) {
            $this->setSubscriptionId($data['subscriptionId']);
        }
        if (array_key_exists('invoiceId', $data)) {
            $this->setInvoiceId($data['invoiceId']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
        if (array_key_exists('renewalPolicy', $data)) {
            $this->setRenewalPolicy($data['renewalPolicy']);
        }
        if (array_key_exists('prorated', $data)) {
            $this->setProrated($data['prorated']);
        }
        if (array_key_exists('effectiveTime', $data)) {
            $this->setEffectiveTime($data['effectiveTime']);
        }
        if (array_key_exists('keepTrial', $data)) {
            $this->setKeepTrial($data['keepTrial']);
        }
        if (array_key_exists('interimOnly', $data)) {
            $this->setInterimOnly($data['interimOnly']);
        }
        if (array_key_exists('usageSettings', $data)) {
            $this->setUsageSettings($data['usageSettings']);
        }
        if (array_key_exists('invoicePreview', $data)) {
            $this->setInvoicePreview($data['invoicePreview']);
        }
        if (array_key_exists('autopay', $data)) {
            $this->setAutopay($data['autopay']);
        }
        if (array_key_exists('paymentTerms', $data)) {
            $this->setPaymentTerms($data['paymentTerms']);
        }
        if (array_key_exists('expirationTime', $data)) {
            $this->setExpirationTime($data['expirationTime']);
        }
        if (array_key_exists('issuedTime', $data)) {
            $this->setIssuedTime($data['issuedTime']);
        }
        if (array_key_exists('acceptedTime', $data)) {
            $this->setAcceptedTime($data['acceptedTime']);
        }
        if (array_key_exists('rejectedTime', $data)) {
            $this->setRejectedTime($data['rejectedTime']);
        }
        if (array_key_exists('canceledTime', $data)) {
            $this->setCanceledTime($data['canceledTime']);
        }
        if (array_key_exists('redirectUrl', $data)) {
            $this->setRedirectUrl($data['redirectUrl']);
        }
        if (array_key_exists('signature', $data)) {
            $this->setSignature($data['signature']);
        }
        if (array_key_exists('shipping', $data)) {
            $this->setShipping($data['shipping']);
        }
        if (array_key_exists('tax', $data)) {
            $this->setTax($data['tax']);
        }
        if (array_key_exists('couponIds', $data)) {
            $this->setCouponIds($data['couponIds']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAction(): string
    {
        return 'change';
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getAcceptanceConditions(): ?array
    {
        return $this->fields['acceptanceConditions'] ?? null;
    }

    /**
     * @param null|string[] $acceptanceConditions
     */
    public function setAcceptanceConditions(null|array $acceptanceConditions): static
    {
        $this->fields['acceptanceConditions'] = $acceptanceConditions;

        return $this;
    }

    /**
     * @return null|QuoteChangeOrderAcceptanceFulfillment[]
     */
    public function getAcceptanceFulfillment(): ?array
    {
        return $this->fields['acceptanceFulfillment'] ?? null;
    }

    public function getSubscriptionId(): string
    {
        return $this->fields['subscriptionId'];
    }

    public function setSubscriptionId(string $subscriptionId): static
    {
        $this->fields['subscriptionId'] = $subscriptionId;

        return $this;
    }

    public function getInvoiceId(): ?string
    {
        return $this->fields['invoiceId'] ?? null;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    /**
     * @return QuoteChangeOrderItems[]
     */
    public function getItems(): array
    {
        return $this->fields['items'];
    }

    /**
     * @param array[]|QuoteChangeOrderItems[] $items
     */
    public function setItems(array $items): static
    {
        $items = array_map(
            fn ($value) => $value instanceof QuoteChangeOrderItems ? $value : QuoteChangeOrderItems::from($value),
            $items,
        );

        $this->fields['items'] = $items;

        return $this;
    }

    public function getRenewalPolicy(): ?string
    {
        return $this->fields['renewalPolicy'] ?? null;
    }

    public function setRenewalPolicy(null|string $renewalPolicy): static
    {
        $this->fields['renewalPolicy'] = $renewalPolicy;

        return $this;
    }

    public function getProrated(): ?bool
    {
        return $this->fields['prorated'] ?? null;
    }

    public function setProrated(null|bool $prorated): static
    {
        $this->fields['prorated'] = $prorated;

        return $this;
    }

    public function getEffectiveTime(): ?DateTimeImmutable
    {
        return $this->fields['effectiveTime'] ?? null;
    }

    public function setEffectiveTime(null|DateTimeImmutable|string $effectiveTime): static
    {
        if ($effectiveTime !== null && !($effectiveTime instanceof DateTimeImmutable)) {
            $effectiveTime = new DateTimeImmutable($effectiveTime);
        }

        $this->fields['effectiveTime'] = $effectiveTime;

        return $this;
    }

    public function getKeepTrial(): ?bool
    {
        return $this->fields['keepTrial'] ?? null;
    }

    public function setKeepTrial(null|bool $keepTrial): static
    {
        $this->fields['keepTrial'] = $keepTrial;

        return $this;
    }

    public function getInterimOnly(): ?bool
    {
        return $this->fields['interimOnly'] ?? null;
    }

    public function setInterimOnly(null|bool $interimOnly): static
    {
        $this->fields['interimOnly'] = $interimOnly;

        return $this;
    }

    /**
     * @return null|QuoteChangeOrderUsageSettings[]
     */
    public function getUsageSettings(): ?array
    {
        return $this->fields['usageSettings'] ?? null;
    }

    /**
     * @param null|array[]|QuoteChangeOrderUsageSettings[] $usageSettings
     */
    public function setUsageSettings(null|array $usageSettings): static
    {
        $usageSettings = $usageSettings !== null ? array_map(
            fn ($value) => $value instanceof QuoteChangeOrderUsageSettings ? $value : QuoteChangeOrderUsageSettings::from($value),
            $usageSettings,
        ) : null;

        $this->fields['usageSettings'] = $usageSettings;

        return $this;
    }

    public function getInvoicePreview(): ?QuoteChangeOrderInvoicePreview
    {
        return $this->fields['invoicePreview'] ?? null;
    }

    public function setInvoicePreview(null|QuoteChangeOrderInvoicePreview|array $invoicePreview): static
    {
        if ($invoicePreview !== null && !($invoicePreview instanceof QuoteChangeOrderInvoicePreview)) {
            $invoicePreview = QuoteChangeOrderInvoicePreview::from($invoicePreview);
        }

        $this->fields['invoicePreview'] = $invoicePreview;

        return $this;
    }

    public function getAutopay(): ?bool
    {
        return $this->fields['autopay'] ?? null;
    }

    public function setAutopay(null|bool $autopay): static
    {
        $this->fields['autopay'] = $autopay;

        return $this;
    }

    public function getPaymentTerms(): ?string
    {
        return $this->fields['paymentTerms'] ?? null;
    }

    public function setPaymentTerms(null|string $paymentTerms): static
    {
        $this->fields['paymentTerms'] = $paymentTerms;

        return $this;
    }

    public function getExpirationTime(): ?DateTimeImmutable
    {
        return $this->fields['expirationTime'] ?? null;
    }

    public function setExpirationTime(null|DateTimeImmutable|string $expirationTime): static
    {
        if ($expirationTime !== null && !($expirationTime instanceof DateTimeImmutable)) {
            $expirationTime = new DateTimeImmutable($expirationTime);
        }

        $this->fields['expirationTime'] = $expirationTime;

        return $this;
    }

    public function getIssuedTime(): ?DateTimeImmutable
    {
        return $this->fields['issuedTime'] ?? null;
    }

    public function getAcceptedTime(): ?DateTimeImmutable
    {
        return $this->fields['acceptedTime'] ?? null;
    }

    public function getRejectedTime(): ?DateTimeImmutable
    {
        return $this->fields['rejectedTime'] ?? null;
    }

    public function getCanceledTime(): ?DateTimeImmutable
    {
        return $this->fields['canceledTime'] ?? null;
    }

    public function getRedirectUrl(): ?string
    {
        return $this->fields['redirectUrl'] ?? null;
    }

    public function setRedirectUrl(null|string $redirectUrl): static
    {
        $this->fields['redirectUrl'] = $redirectUrl;

        return $this;
    }

    public function getSignature(): ?QuoteChangeOrderSignature
    {
        return $this->fields['signature'] ?? null;
    }

    public function setSignature(null|QuoteChangeOrderSignature|array $signature): static
    {
        if ($signature !== null && !($signature instanceof QuoteChangeOrderSignature)) {
            $signature = QuoteChangeOrderSignature::from($signature);
        }

        $this->fields['signature'] = $signature;

        return $this;
    }

    public function getShipping(): ?Shipping
    {
        return $this->fields['shipping'] ?? null;
    }

    public function setShipping(null|Shipping|array $shipping): static
    {
        if ($shipping !== null && !($shipping instanceof Shipping)) {
            $shipping = ShippingFactory::from($shipping);
        }

        $this->fields['shipping'] = $shipping;

        return $this;
    }

    public function getTax(): ?Taxes
    {
        return $this->fields['tax'] ?? null;
    }

    public function setTax(null|Taxes|array $tax): static
    {
        if ($tax !== null && !($tax instanceof Taxes)) {
            $tax = TaxesFactory::from($tax);
        }

        $this->fields['tax'] = $tax;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getCouponIds(): ?array
    {
        return $this->fields['couponIds'] ?? null;
    }

    /**
     * @param null|string[] $couponIds
     */
    public function setCouponIds(null|array $couponIds): static
    {
        $this->fields['couponIds'] = $couponIds;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getEmbedded(): ?QuoteChangeOrderEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|QuoteChangeOrderEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof QuoteChangeOrderEmbedded)) {
            $embedded = QuoteChangeOrderEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'action' => 'change',
        ];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('acceptanceConditions', $this->fields)) {
            $data['acceptanceConditions'] = $this->fields['acceptanceConditions'];
        }
        if (array_key_exists('acceptanceFulfillment', $this->fields)) {
            $data['acceptanceFulfillment'] = $this->fields['acceptanceFulfillment'] !== null
                ? array_map(
                    static fn (QuoteChangeOrderAcceptanceFulfillment $quoteChangeOrderAcceptanceFulfillment) => $quoteChangeOrderAcceptanceFulfillment->jsonSerialize(),
                    $this->fields['acceptanceFulfillment'],
                )
                : null;
        }
        if (array_key_exists('subscriptionId', $this->fields)) {
            $data['subscriptionId'] = $this->fields['subscriptionId'];
        }
        if (array_key_exists('invoiceId', $this->fields)) {
            $data['invoiceId'] = $this->fields['invoiceId'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = array_map(
                static fn (QuoteChangeOrderItems $quoteChangeOrderItems) => $quoteChangeOrderItems->jsonSerialize(),
                $this->fields['items'],
            );
        }
        if (array_key_exists('renewalPolicy', $this->fields)) {
            $data['renewalPolicy'] = $this->fields['renewalPolicy'];
        }
        if (array_key_exists('prorated', $this->fields)) {
            $data['prorated'] = $this->fields['prorated'];
        }
        if (array_key_exists('effectiveTime', $this->fields)) {
            $data['effectiveTime'] = $this->fields['effectiveTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('keepTrial', $this->fields)) {
            $data['keepTrial'] = $this->fields['keepTrial'];
        }
        if (array_key_exists('interimOnly', $this->fields)) {
            $data['interimOnly'] = $this->fields['interimOnly'];
        }
        if (array_key_exists('usageSettings', $this->fields)) {
            $data['usageSettings'] = $this->fields['usageSettings'] !== null
                ? array_map(
                    static fn (QuoteChangeOrderUsageSettings $quoteChangeOrderUsageSettings) => $quoteChangeOrderUsageSettings->jsonSerialize(),
                    $this->fields['usageSettings'],
                )
                : null;
        }
        if (array_key_exists('invoicePreview', $this->fields)) {
            $data['invoicePreview'] = $this->fields['invoicePreview']?->jsonSerialize();
        }
        if (array_key_exists('autopay', $this->fields)) {
            $data['autopay'] = $this->fields['autopay'];
        }
        if (array_key_exists('paymentTerms', $this->fields)) {
            $data['paymentTerms'] = $this->fields['paymentTerms'];
        }
        if (array_key_exists('expirationTime', $this->fields)) {
            $data['expirationTime'] = $this->fields['expirationTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('issuedTime', $this->fields)) {
            $data['issuedTime'] = $this->fields['issuedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('acceptedTime', $this->fields)) {
            $data['acceptedTime'] = $this->fields['acceptedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('rejectedTime', $this->fields)) {
            $data['rejectedTime'] = $this->fields['rejectedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('canceledTime', $this->fields)) {
            $data['canceledTime'] = $this->fields['canceledTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('redirectUrl', $this->fields)) {
            $data['redirectUrl'] = $this->fields['redirectUrl'];
        }
        if (array_key_exists('signature', $this->fields)) {
            $data['signature'] = $this->fields['signature']?->jsonSerialize();
        }
        if (array_key_exists('shipping', $this->fields)) {
            $data['shipping'] = $this->fields['shipping']?->jsonSerialize();
        }
        if (array_key_exists('tax', $this->fields)) {
            $data['tax'] = $this->fields['tax']?->jsonSerialize();
        }
        if (array_key_exists('couponIds', $this->fields)) {
            $data['couponIds'] = $this->fields['couponIds'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    /**
     * @param null|array[]|QuoteChangeOrderAcceptanceFulfillment[] $acceptanceFulfillment
     */
    private function setAcceptanceFulfillment(null|array $acceptanceFulfillment): static
    {
        $acceptanceFulfillment = $acceptanceFulfillment !== null ? array_map(
            fn ($value) => $value instanceof QuoteChangeOrderAcceptanceFulfillment ? $value : QuoteChangeOrderAcceptanceFulfillment::from($value),
            $acceptanceFulfillment,
        ) : null;

        $this->fields['acceptanceFulfillment'] = $acceptanceFulfillment;

        return $this;
    }

    private function setInvoiceId(null|string $invoiceId): static
    {
        $this->fields['invoiceId'] = $invoiceId;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setIssuedTime(null|DateTimeImmutable|string $issuedTime): static
    {
        if ($issuedTime !== null && !($issuedTime instanceof DateTimeImmutable)) {
            $issuedTime = new DateTimeImmutable($issuedTime);
        }

        $this->fields['issuedTime'] = $issuedTime;

        return $this;
    }

    private function setAcceptedTime(null|DateTimeImmutable|string $acceptedTime): static
    {
        if ($acceptedTime !== null && !($acceptedTime instanceof DateTimeImmutable)) {
            $acceptedTime = new DateTimeImmutable($acceptedTime);
        }

        $this->fields['acceptedTime'] = $acceptedTime;

        return $this;
    }

    private function setRejectedTime(null|DateTimeImmutable|string $rejectedTime): static
    {
        if ($rejectedTime !== null && !($rejectedTime instanceof DateTimeImmutable)) {
            $rejectedTime = new DateTimeImmutable($rejectedTime);
        }

        $this->fields['rejectedTime'] = $rejectedTime;

        return $this;
    }

    private function setCanceledTime(null|DateTimeImmutable|string $canceledTime): static
    {
        if ($canceledTime !== null && !($canceledTime instanceof DateTimeImmutable)) {
            $canceledTime = new DateTimeImmutable($canceledTime);
        }

        $this->fields['canceledTime'] = $canceledTime;

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
