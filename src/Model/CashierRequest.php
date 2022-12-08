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

class CashierRequest implements JsonSerializable
{
    public const STATUS_CREATED = 'created';

    public const STATUS_PENDING = 'pending';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_EXPIRED = 'expired';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('transactionId', $data)) {
            $this->setTransactionId($data['transactionId']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('amounts', $data)) {
            $this->setAmounts($data['amounts']);
        }
        if (array_key_exists('customAmount', $data)) {
            $this->setCustomAmount($data['customAmount']);
        }
        if (array_key_exists('redirectUrl', $data)) {
            $this->setRedirectUrl($data['redirectUrl']);
        }
        if (array_key_exists('expirationTime', $data)) {
            $this->setExpirationTime($data['expirationTime']);
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

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): self
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): self
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->fields['transactionId'] ?? null;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
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

    /**
     * @return null|float[]
     */
    public function getAmounts(): ?array
    {
        return $this->fields['amounts'] ?? null;
    }

    /**
     * @param null|float[] $amounts
     */
    public function setAmounts(null|array $amounts): self
    {
        $amounts = $amounts !== null ? array_map(fn ($value) => $value ?? null, $amounts) : null;

        $this->fields['amounts'] = $amounts;

        return $this;
    }

    public function getCustomAmount(): ?CashierStrategyCustomAmount
    {
        return $this->fields['customAmount'] ?? null;
    }

    public function setCustomAmount(null|CashierStrategyCustomAmount|array $customAmount): self
    {
        if ($customAmount !== null && !($customAmount instanceof CashierStrategyCustomAmount)) {
            $customAmount = CashierStrategyCustomAmount::from($customAmount);
        }

        $this->fields['customAmount'] = $customAmount;

        return $this;
    }

    public function getRedirectUrl(): ?string
    {
        return $this->fields['redirectUrl'] ?? null;
    }

    public function setRedirectUrl(null|string $redirectUrl): self
    {
        $this->fields['redirectUrl'] = $redirectUrl;

        return $this;
    }

    public function getExpirationTime(): ?DateTimeImmutable
    {
        return $this->fields['expirationTime'] ?? null;
    }

    public function setExpirationTime(null|DateTimeImmutable|string $expirationTime): self
    {
        if ($expirationTime !== null && !($expirationTime instanceof DateTimeImmutable)) {
            $expirationTime = new DateTimeImmutable($expirationTime);
        }

        $this->fields['expirationTime'] = $expirationTime;

        return $this;
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
     * @return null|array<CashierLink|SelfLink|TransactionLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @return null|array{customer:Customer,website:Website,transaction:Transaction}
     */
    public function getEmbedded(): ?array
    {
        return $this->fields['_embedded'] ?? null;
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
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('transactionId', $this->fields)) {
            $data['transactionId'] = $this->fields['transactionId'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('amounts', $this->fields)) {
            $data['amounts'] = $this->fields['amounts'];
        }
        if (array_key_exists('customAmount', $this->fields)) {
            $data['customAmount'] = $this->fields['customAmount']?->jsonSerialize();
        }
        if (array_key_exists('redirectUrl', $this->fields)) {
            $data['redirectUrl'] = $this->fields['redirectUrl'];
        }
        if (array_key_exists('expirationTime', $this->fields)) {
            $data['expirationTime'] = $this->fields['expirationTime']?->format(DateTimeInterface::RFC3339);
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
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded'];
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setTransactionId(null|string $transactionId): self
    {
        $this->fields['transactionId'] = $transactionId;

        return $this;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    private function setStatus(null|string $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

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

    /**
     * @param null|array<CashierLink|SelfLink|TransactionLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    /**
     * @param null|array{customer:Customer,website:Website,transaction:Transaction} $embedded
     */
    private function setEmbedded(null|array $embedded): self
    {
        if ($embedded !== null) {
            $embedded['customer'] = isset($embedded['customer']) ? ($embedded['customer'] instanceof Customer ? $embedded['customer'] : Customer::from($embedded['customer'])) : null;
            $embedded['website'] = isset($embedded['website']) ? ($embedded['website'] instanceof Website ? $embedded['website'] : Website::from($embedded['website'])) : null;
            $embedded['transaction'] = isset($embedded['transaction']) ? ($embedded['transaction'] instanceof Transaction ? $embedded['transaction'] : Transaction::from($embedded['transaction'])) : null;
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }
}
