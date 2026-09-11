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

class PostPayoutRequestsToBatchRequestExplicitIDs implements PostPayoutRequestsToBatchRequest
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('payoutRequestIds', $data)) {
            $this->setPayoutRequestIds($data['payoutRequestIds']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return string[]
     */
    public function getPayoutRequestIds(): array
    {
        return $this->fields['payoutRequestIds'];
    }

    /**
     * @param string[] $payoutRequestIds
     */
    public function setPayoutRequestIds(array $payoutRequestIds): static
    {
        $this->fields['payoutRequestIds'] = $payoutRequestIds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('payoutRequestIds', $this->fields)) {
            $data['payoutRequestIds'] = $this->fields['payoutRequestIds'];
        }

        return $data;
    }
}
