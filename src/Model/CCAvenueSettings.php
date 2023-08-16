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

class CCAvenueSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('useStandingInstructionApi', $data)) {
            $this->setUseStandingInstructionApi($data['useStandingInstructionApi']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUseStandingInstructionApi(): ?bool
    {
        return $this->fields['useStandingInstructionApi'] ?? null;
    }

    public function setUseStandingInstructionApi(null|bool $useStandingInstructionApi): static
    {
        $this->fields['useStandingInstructionApi'] = $useStandingInstructionApi;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('useStandingInstructionApi', $this->fields)) {
            $data['useStandingInstructionApi'] = $this->fields['useStandingInstructionApi'];
        }

        return $data;
    }
}
