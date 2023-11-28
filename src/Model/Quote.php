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

class Quote implements JsonSerializable
{
    public const TYPE_SUBSCRIPTION_ORDER = 'subscription-order';

    public const TYPE_ONE_TIME_ORDER = 'one-time-order';

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
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
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
        if (array_key_exists('orderId', $data)) {
            $this->setOrderId($data['orderId']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
        if (array_key_exists('deliveryAddress', $data)) {
            $this->setDeliveryAddress($data['deliveryAddress']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
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

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
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

    public function getOrderId(): ?string
    {
        return $this->fields['orderId'] ?? null;
    }

    /**
     * @return QuoteItems[]
     */
    public function getItems(): array
    {
        return $this->fields['items'];
    }

    /**
     * @param array[]|QuoteItems[] $items
     */
    public function setItems(array $items): static
    {
        $items = array_map(
            fn ($value) => $value instanceof QuoteItems ? $value : QuoteItems::from($value),
            $items,
        );

        $this->fields['items'] = $items;

        return $this;
    }

    public function getDeliveryAddress(): ?ContactObject
    {
        return $this->fields['deliveryAddress'] ?? null;
    }

    public function setDeliveryAddress(null|ContactObject|array $deliveryAddress): static
    {
        if ($deliveryAddress !== null && !($deliveryAddress instanceof ContactObject)) {
            $deliveryAddress = ContactObject::from($deliveryAddress);
        }

        $this->fields['deliveryAddress'] = $deliveryAddress;

        return $this;
    }

    public function getBillingAddress(): ?ContactObject
    {
        return $this->fields['billingAddress'] ?? null;
    }

    public function setBillingAddress(null|ContactObject|array $billingAddress): static
    {
        if ($billingAddress !== null && !($billingAddress instanceof ContactObject)) {
            $billingAddress = ContactObject::from($billingAddress);
        }

        $this->fields['billingAddress'] = $billingAddress;

        return $this;
    }

    public function getInvoicePreview(): ?QuoteInvoicePreview
    {
        return $this->fields['invoicePreview'] ?? null;
    }

    public function setInvoicePreview(null|QuoteInvoicePreview|array $invoicePreview): static
    {
        if ($invoicePreview !== null && !($invoicePreview instanceof QuoteInvoicePreview)) {
            $invoicePreview = QuoteInvoicePreview::from($invoicePreview);
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

    public function getRedirectUrl(): ?string
    {
        return $this->fields['redirectUrl'] ?? null;
    }

    public function setRedirectUrl(null|string $redirectUrl): static
    {
        $this->fields['redirectUrl'] = $redirectUrl;

        return $this;
    }

    public function getSignature(): ?QuoteSignature
    {
        return $this->fields['signature'] ?? null;
    }

    public function setSignature(null|QuoteSignature|array $signature): static
    {
        if ($signature !== null && !($signature instanceof QuoteSignature)) {
            $signature = QuoteSignature::from($signature);
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

    public function getEmbedded(): ?QuoteEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|QuoteEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof QuoteEmbedded)) {
            $embedded = QuoteEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
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
        if (array_key_exists('orderId', $this->fields)) {
            $data['orderId'] = $this->fields['orderId'];
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'];
        }
        if (array_key_exists('deliveryAddress', $this->fields)) {
            $data['deliveryAddress'] = $this->fields['deliveryAddress']?->jsonSerialize();
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
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
            $data['_links'] = $this->fields['_links'];
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

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setOrderId(null|string $orderId): static
    {
        $this->fields['orderId'] = $orderId;

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
