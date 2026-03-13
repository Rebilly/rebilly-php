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

use Rebilly\Sdk\Trait\HasMetadata;

class CouponRestrictionRestrictToCustomers implements CouponRestriction
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('customerIds', $data)) {
            $this->setCustomerIds($data['customerIds']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getType(): string
    {
        return 'restrict-to-customers';
    }

    /**
     * @return string[]
     */
    public function getCustomerIds(): array
    {
        return $this->fields['customerIds'];
    }

    /**
     * @param string[] $customerIds
     */
    public function setCustomerIds(array $customerIds): static
    {
        $this->fields['customerIds'] = $customerIds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'restrict-to-customers',
        ];
        if (array_key_exists('customerIds', $this->fields)) {
            $data['customerIds'] = $this->fields['customerIds'];
        }

        return $data;
    }
}
