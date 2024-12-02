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

class QuickBooksOnlineTransactionExternalServiceSettings implements JsonSerializable
{
    public const SYNC_PAYMENTS_MANUALLY = 'manually';

    public const SYNC_PAYMENTS_ALWAYS = 'always';

    public const SYNC_REFUND_RECEIPTS_MANUALLY = 'manually';

    public const SYNC_REFUND_RECEIPTS_ALWAYS = 'always';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('syncPayments', $data)) {
            $this->setSyncPayments($data['syncPayments']);
        }
        if (array_key_exists('syncRefundReceipts', $data)) {
            $this->setSyncRefundReceipts($data['syncRefundReceipts']);
        }
        if (array_key_exists('depositAccountId', $data)) {
            $this->setDepositAccountId($data['depositAccountId']);
        }
        if (array_key_exists('department', $data)) {
            $this->setDepartment($data['department']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSyncPayments(): ?string
    {
        return $this->fields['syncPayments'] ?? null;
    }

    public function setSyncPayments(null|string $syncPayments): static
    {
        $this->fields['syncPayments'] = $syncPayments;

        return $this;
    }

    public function getSyncRefundReceipts(): ?string
    {
        return $this->fields['syncRefundReceipts'] ?? null;
    }

    public function setSyncRefundReceipts(null|string $syncRefundReceipts): static
    {
        $this->fields['syncRefundReceipts'] = $syncRefundReceipts;

        return $this;
    }

    public function getDepositAccountId(): ?string
    {
        return $this->fields['depositAccountId'] ?? null;
    }

    public function setDepositAccountId(null|string $depositAccountId): static
    {
        $this->fields['depositAccountId'] = $depositAccountId;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->fields['department'] ?? null;
    }

    public function setDepartment(null|string $department): static
    {
        $this->fields['department'] = $department;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('syncPayments', $this->fields)) {
            $data['syncPayments'] = $this->fields['syncPayments'];
        }
        if (array_key_exists('syncRefundReceipts', $this->fields)) {
            $data['syncRefundReceipts'] = $this->fields['syncRefundReceipts'];
        }
        if (array_key_exists('depositAccountId', $this->fields)) {
            $data['depositAccountId'] = $this->fields['depositAccountId'];
        }
        if (array_key_exists('department', $this->fields)) {
            $data['department'] = $this->fields['department'];
        }

        return $data;
    }
}
