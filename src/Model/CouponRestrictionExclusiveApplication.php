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

class CouponRestrictionExclusiveApplication implements CouponRestriction
{
    public function __construct(array $data = [])
    {
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'restrict-to-exclusive-application';
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'restrict-to-exclusive-application',
        ];

        return $data;
    }
}
