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

class SubscriptionCancellationState implements JsonSerializable
{
    public const CANCELED_BY_MERCHANT = 'merchant';

    public const CANCELED_BY_CUSTOMER = 'customer';

    public const CANCELED_BY_REBILLY = 'rebilly';

    public const CANCEL_CATEGORY_BILLING_FAILURE = 'billing-failure';

    public const CANCEL_CATEGORY_DID_NOT_USE = 'did-not-use';

    public const CANCEL_CATEGORY_DID_NOT_WANT = 'did-not-want';

    public const CANCEL_CATEGORY_MISSING_FEATURES = 'missing-features';

    public const CANCEL_CATEGORY_BUGS_OR_PROBLEMS = 'bugs-or-problems';

    public const CANCEL_CATEGORY_DO_NOT_REMEMBER = 'do-not-remember';

    public const CANCEL_CATEGORY_RISK_WARNING = 'risk-warning';

    public const CANCEL_CATEGORY_CONTRACT_EXPIRED = 'contract-expired';

    public const CANCEL_CATEGORY_TOO_EXPENSIVE = 'too-expensive';

    public const CANCEL_CATEGORY_NEVER_STARTED = 'never-started';

    public const CANCEL_CATEGORY_SWITCHED_PLAN = 'switched-plan';

    public const CANCEL_CATEGORY_OTHER = 'other';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('canceledTime', $data)) {
            $this->setCanceledTime($data['canceledTime']);
        }
        if (array_key_exists('canceledBy', $data)) {
            $this->setCanceledBy($data['canceledBy']);
        }
        if (array_key_exists('cancelCategory', $data)) {
            $this->setCancelCategory($data['cancelCategory']);
        }
        if (array_key_exists('cancelDescription', $data)) {
            $this->setCancelDescription($data['cancelDescription']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCanceledTime(): ?DateTimeImmutable
    {
        return $this->fields['canceledTime'] ?? null;
    }

    public function setCanceledTime(null|DateTimeImmutable|string $canceledTime): self
    {
        if ($canceledTime !== null && !($canceledTime instanceof DateTimeImmutable)) {
            $canceledTime = new DateTimeImmutable($canceledTime);
        }

        $this->fields['canceledTime'] = $canceledTime;

        return $this;
    }

    /**
     * @psalm-return self::CANCELED_BY_*|null $canceledBy
     */
    public function getCanceledBy(): ?string
    {
        return $this->fields['canceledBy'] ?? null;
    }

    /**
     * @psalm-return self::CANCEL_CATEGORY_*|null $cancelCategory
     */
    public function getCancelCategory(): ?string
    {
        return $this->fields['cancelCategory'] ?? null;
    }

    public function getCancelDescription(): ?string
    {
        return $this->fields['cancelDescription'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('canceledTime', $this->fields)) {
            $data['canceledTime'] = $this->fields['canceledTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('canceledBy', $this->fields)) {
            $data['canceledBy'] = $this->fields['canceledBy'];
        }
        if (array_key_exists('cancelCategory', $this->fields)) {
            $data['cancelCategory'] = $this->fields['cancelCategory'];
        }
        if (array_key_exists('cancelDescription', $this->fields)) {
            $data['cancelDescription'] = $this->fields['cancelDescription'];
        }

        return $data;
    }

    /**
     * @psalm-param self::CANCELED_BY_*|null $canceledBy
     */
    private function setCanceledBy(null|string $canceledBy): self
    {
        $this->fields['canceledBy'] = $canceledBy;

        return $this;
    }

    /**
     * @psalm-param self::CANCEL_CATEGORY_*|null $cancelCategory
     */
    private function setCancelCategory(null|string $cancelCategory): self
    {
        $this->fields['cancelCategory'] = $cancelCategory;

        return $this;
    }

    private function setCancelDescription(null|string $cancelDescription): self
    {
        $this->fields['cancelDescription'] = $cancelDescription;

        return $this;
    }
}
