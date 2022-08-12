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

use InvalidArgumentException;
use JsonSerializable;

abstract class Subscription implements JsonSerializable
{
    public const ORDER_TYPE_SUBSCRIPTION_ORDER = 'subscription-order';

    public const ORDER_TYPE_ONE_TIME_ORDER = 'one-time-order';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('orderType', $data)) {
            $this->setOrderType($data['orderType']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['orderType']) {
            case 'one-time-order':
                return new OneTimeOrder($data);
            case 'subscription-order':
                return new SubscriptionOrder($data);
        }

        throw new InvalidArgumentException("Unsupported orderType value: '{$data['orderType']}'");
    }

    /**
     * @psalm-return self::ORDER_TYPE_*|null $orderType
     */
    public function getOrderType(): ?string
    {
        return $this->fields['orderType'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('orderType', $this->fields)) {
            $data['orderType'] = $this->fields['orderType'];
        }

        return $data;
    }

    /**
     * @psalm-param self::ORDER_TYPE_*|null $orderType
     */
    private function setOrderType(null|string $orderType): self
    {
        $this->fields['orderType'] = $orderType;

        return $this;
    }
}
