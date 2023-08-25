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

class OrganizationSettingsBilling implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('pendingOrderTtl', $data)) {
            $this->setPendingOrderTtl($data['pendingOrderTtl']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPendingOrderTtl(): ?string
    {
        return $this->fields['pendingOrderTtl'] ?? null;
    }

    public function setPendingOrderTtl(null|string $pendingOrderTtl): static
    {
        $this->fields['pendingOrderTtl'] = $pendingOrderTtl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('pendingOrderTtl', $this->fields)) {
            $data['pendingOrderTtl'] = $this->fields['pendingOrderTtl'];
        }

        return $data;
    }
}
