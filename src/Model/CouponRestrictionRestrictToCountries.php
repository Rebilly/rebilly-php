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

class CouponRestrictionRestrictToCountries implements CouponRestriction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('countries', $data)) {
            $this->setCountries($data['countries']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'restrict-to-countries';
    }

    /**
     * @return string[]
     */
    public function getCountries(): array
    {
        return $this->fields['countries'];
    }

    /**
     * @param string[] $countries
     */
    public function setCountries(array $countries): static
    {
        $this->fields['countries'] = $countries;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'restrict-to-countries',
        ];
        if (array_key_exists('countries', $this->fields)) {
            $data['countries'] = $this->fields['countries'];
        }

        return $data;
    }
}
