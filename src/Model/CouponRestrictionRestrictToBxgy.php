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

class CouponRestrictionRestrictToBxgy implements CouponRestriction, JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
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

    public function getType(): string
    {
        return 'restrict-to-bxgy';
    }

    /**
     * @return CouponRestrictionRestrictToBxgyBuy[]
     */
    public function getBuy(): array
    {
        return $this->fields['buy'];
    }

    /**
     * @param array[]|CouponRestrictionRestrictToBxgyBuy[] $buy
     */
    public function setBuy(array $buy): static
    {
        $buy = array_map(
            fn ($value) => $value instanceof CouponRestrictionRestrictToBxgyBuy ? $value : CouponRestrictionRestrictToBxgyBuy::from($value),
            $buy,
        );

        $this->fields['buy'] = $buy;

        return $this;
    }

    /**
     * @return CouponRestrictionRestrictToBxgyGet[]
     */
    public function getGet(): array
    {
        return $this->fields['get'];
    }

    /**
     * @param array[]|CouponRestrictionRestrictToBxgyGet[] $get
     */
    public function setGet(array $get): static
    {
        $get = array_map(
            fn ($value) => $value instanceof CouponRestrictionRestrictToBxgyGet ? $value : CouponRestrictionRestrictToBxgyGet::from($value),
            $get,
        );

        $this->fields['get'] = $get;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'restrict-to-bxgy',
        ];
        if (array_key_exists('buy', $this->fields)) {
            $data['buy'] = $this->fields['buy'];
        }
        if (array_key_exists('get', $this->fields)) {
            $data['get'] = $this->fields['get'];
        }

        return $data;
    }
}
