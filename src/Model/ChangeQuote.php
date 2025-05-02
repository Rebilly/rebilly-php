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

class ChangeQuote implements Quote
{
    public const ACCEPTANCE_CONDITIONS_CUSTOMER = 'customer';

    public const ACCEPTANCE_CONDITIONS_PAYMENT = 'payment';

    public const STATUS_DRAFT = 'draft';

    public const STATUS_ISSUED = 'issued';

    public const STATUS_ACCEPTED = 'accepted';

    public const STATUS_REJECTED = 'rejected';

    public const STATUS_CANCELED = 'canceled';

    public const STATUS_EXPIRED = 'expired';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('acceptanceConditions', $data)) {
            $this->setAcceptanceConditions($data['acceptanceConditions']);
        }
        if (array_key_exists('acceptanceFulfillment', $data)) {
            $this->setAcceptanceFulfillment($data['acceptanceFulfillment']);
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
        if (array_key_exists('order', $data)) {
            $this->setOrder($data['order']);
        }
        if (array_key_exists('invoicePreview', $data)) {
            $this->setInvoicePreview($data['invoicePreview']);
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
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('redirectUrl', $data)) {
            $this->setRedirectUrl($data['redirectUrl']);
        }
        if (array_key_exists('signature', $data)) {
            $this->setSignature($data['signature']);
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

    public function getType(): string
    {
        return 'change';
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
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
     * @return null|ChangeQuoteAcceptanceFulfillment[]
     */
    public function getAcceptanceFulfillment(): ?array
    {
        return $this->fields['acceptanceFulfillment'] ?? null;
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

    public function getOrder(): ChangeQuoteOrder
    {
        return $this->fields['order'];
    }

    public function setOrder(ChangeQuoteOrder|array $order): static
    {
        if (!($order instanceof ChangeQuoteOrder)) {
            $order = ChangeQuoteOrder::from($order);
        }

        $this->fields['order'] = $order;

        return $this;
    }

    public function getInvoicePreview(): ?ChangeQuoteInvoicePreview
    {
        return $this->fields['invoicePreview'] ?? null;
    }

    public function setInvoicePreview(null|ChangeQuoteInvoicePreview|array $invoicePreview): static
    {
        if ($invoicePreview !== null && !($invoicePreview instanceof ChangeQuoteInvoicePreview)) {
            $invoicePreview = ChangeQuoteInvoicePreview::from($invoicePreview);
        }

        $this->fields['invoicePreview'] = $invoicePreview;

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

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
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

    public function getSignature(): ?ChangeQuoteSignature
    {
        return $this->fields['signature'] ?? null;
    }

    public function setSignature(null|ChangeQuoteSignature|array $signature): static
    {
        if ($signature !== null && !($signature instanceof ChangeQuoteSignature)) {
            $signature = ChangeQuoteSignature::from($signature);
        }

        $this->fields['signature'] = $signature;

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

    public function getEmbedded(): ?ChangeQuoteEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|ChangeQuoteEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof ChangeQuoteEmbedded)) {
            $embedded = ChangeQuoteEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'change',
        ];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('acceptanceConditions', $this->fields)) {
            $data['acceptanceConditions'] = $this->fields['acceptanceConditions'];
        }
        if (array_key_exists('acceptanceFulfillment', $this->fields)) {
            $data['acceptanceFulfillment'] = $this->fields['acceptanceFulfillment'] !== null
                ? array_map(
                    static fn (ChangeQuoteAcceptanceFulfillment $changeQuoteAcceptanceFulfillment) => $changeQuoteAcceptanceFulfillment->jsonSerialize(),
                    $this->fields['acceptanceFulfillment'],
                )
                : null;
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
        if (array_key_exists('order', $this->fields)) {
            $data['order'] = $this->fields['order']->jsonSerialize();
        }
        if (array_key_exists('invoicePreview', $this->fields)) {
            $data['invoicePreview'] = $this->fields['invoicePreview']?->jsonSerialize();
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
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('redirectUrl', $this->fields)) {
            $data['redirectUrl'] = $this->fields['redirectUrl'];
        }
        if (array_key_exists('signature', $this->fields)) {
            $data['signature'] = $this->fields['signature']?->jsonSerialize();
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

    /**
     * @param null|array[]|ChangeQuoteAcceptanceFulfillment[] $acceptanceFulfillment
     */
    private function setAcceptanceFulfillment(null|array $acceptanceFulfillment): static
    {
        $acceptanceFulfillment = $acceptanceFulfillment !== null ? array_map(
            fn ($value) => $value instanceof ChangeQuoteAcceptanceFulfillment ? $value : ChangeQuoteAcceptanceFulfillment::from($value),
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
