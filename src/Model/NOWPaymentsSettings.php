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

class NOWPaymentsSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('tolerancePercentage', $data)) {
            $this->setTolerancePercentage($data['tolerancePercentage']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTolerancePercentage(): int
    {
        return $this->fields['tolerancePercentage'];
    }

    public function setTolerancePercentage(int $tolerancePercentage): static
    {
        $this->fields['tolerancePercentage'] = $tolerancePercentage;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('tolerancePercentage', $this->fields)) {
            $data['tolerancePercentage'] = $this->fields['tolerancePercentage'];
        }

        return $data;
    }
}
