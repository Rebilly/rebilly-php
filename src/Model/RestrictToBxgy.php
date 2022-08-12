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

class RestrictToBxgy extends CouponRestriction
{
    public const TYPE_DISCOUNTS_PER_REDEMPTION = 'discounts-per-redemption';

    public const TYPE_MINIMUM_ORDER_AMOUNT = 'minimum-order-amount';

    public const TYPE_RESTRICT_TO_INVOICES = 'restrict-to-invoices';

    public const TYPE_RESTRICT_TO_PLANS = 'restrict-to-plans';

    public const TYPE_RESTRICT_TO_SUBSCRIPTIONS = 'restrict-to-subscriptions';

    public const TYPE_RESTRICT_TO_PRODUCTS = 'restrict-to-products';

    public const TYPE_PAID_BY_TIME = 'paid-by-time';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'type' => 'restrict-to-bxgy',
        ] + $data);

        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('buy', $data)) {
            $this->setBuy($data['buy']);
        }
        if (array_key_exists('get', $data)) {
            $this->setGet($data['get']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::TYPE_* $type
     */
    public function getType(): string
    {
        return $this->fields['type'];
    }

    /**
     * @psalm-param self::TYPE_* $type
     */
    public function setType(string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }

    /**
     * @return \Rebilly\Sdk\Model\RestrictBuy[]
     */
    public function getBuy(): array
    {
        return $this->fields['buy'];
    }

    /**
     * @param \Rebilly\Sdk\Model\RestrictBuy[] $buy
     */
    public function setBuy(array $buy): self
    {
        $buy = array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\RestrictBuy ? $value : \Rebilly\Sdk\Model\RestrictBuy::from($value)) : null, $buy);

        $this->fields['buy'] = $buy;

        return $this;
    }

    /**
     * @return \Rebilly\Sdk\Model\RestrictGet[]
     */
    public function getGet(): array
    {
        return $this->fields['get'];
    }

    /**
     * @param \Rebilly\Sdk\Model\RestrictGet[] $get
     */
    public function setGet(array $get): self
    {
        $get = array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\RestrictGet ? $value : \Rebilly\Sdk\Model\RestrictGet::from($value)) : null, $get);

        $this->fields['get'] = $get;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('buy', $this->fields)) {
            $data['buy'] = $this->fields['buy'];
        }
        if (array_key_exists('get', $this->fields)) {
            $data['get'] = $this->fields['get'];
        }

        return parent::jsonSerialize() + $data;
    }
}
