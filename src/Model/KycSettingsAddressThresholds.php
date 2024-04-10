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

class KycSettingsAddressThresholds implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('rejectBelow', $data)) {
            $this->setRejectBelow($data['rejectBelow']);
        }
        if (array_key_exists('acceptAbove', $data)) {
            $this->setAcceptAbove($data['acceptAbove']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRejectBelow(): ?int
    {
        return $this->fields['rejectBelow'] ?? null;
    }

    public function setRejectBelow(null|int $rejectBelow): static
    {
        $this->fields['rejectBelow'] = $rejectBelow;

        return $this;
    }

    public function getAcceptAbove(): ?int
    {
        return $this->fields['acceptAbove'] ?? null;
    }

    public function setAcceptAbove(null|int $acceptAbove): static
    {
        $this->fields['acceptAbove'] = $acceptAbove;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('rejectBelow', $this->fields)) {
            $data['rejectBelow'] = $this->fields['rejectBelow'];
        }
        if (array_key_exists('acceptAbove', $this->fields)) {
            $data['acceptAbove'] = $this->fields['acceptAbove'];
        }

        return $data;
    }
}
