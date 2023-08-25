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

class GetKycAcceptanceSummaryResponseDataStatusStatisticsPending implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('total', $data)) {
            $this->setTotal($data['total']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTotal(): ?int
    {
        return $this->fields['total'] ?? null;
    }

    public function setTotal(null|int $total): static
    {
        $this->fields['total'] = $total;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('total', $this->fields)) {
            $data['total'] = $this->fields['total'];
        }

        return $data;
    }
}
