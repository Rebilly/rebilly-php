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

class OnlineueberweisenSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('payformCode', $data)) {
            $this->setPayformCode($data['payformCode']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPayformCode(): ?string
    {
        return $this->fields['payformCode'] ?? null;
    }

    public function setPayformCode(null|string $payformCode): self
    {
        $this->fields['payformCode'] = $payformCode;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('payformCode', $this->fields)) {
            $data['payformCode'] = $this->fields['payformCode'];
        }

        return $data;
    }
}
