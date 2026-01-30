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

class RiskScoreBlocklist implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('permanentlyBlockList', $data)) {
            $this->setPermanentlyBlockList($data['permanentlyBlockList']);
        }
        if (array_key_exists('temporaryBlockList', $data)) {
            $this->setTemporaryBlockList($data['temporaryBlockList']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPermanentlyBlockList(): ?RiskScoreBlocklistPermanentRules
    {
        return $this->fields['permanentlyBlockList'] ?? null;
    }

    public function setPermanentlyBlockList(null|RiskScoreBlocklistPermanentRules|array $permanentlyBlockList): static
    {
        if ($permanentlyBlockList !== null && !($permanentlyBlockList instanceof RiskScoreBlocklistPermanentRules)) {
            $permanentlyBlockList = RiskScoreBlocklistPermanentRules::from($permanentlyBlockList);
        }

        $this->fields['permanentlyBlockList'] = $permanentlyBlockList;

        return $this;
    }

    public function getTemporaryBlockList(): ?RiskScoreBlocklistTemporaryRules
    {
        return $this->fields['temporaryBlockList'] ?? null;
    }

    public function setTemporaryBlockList(null|RiskScoreBlocklistTemporaryRules|array $temporaryBlockList): static
    {
        if ($temporaryBlockList !== null && !($temporaryBlockList instanceof RiskScoreBlocklistTemporaryRules)) {
            $temporaryBlockList = RiskScoreBlocklistTemporaryRules::from($temporaryBlockList);
        }

        $this->fields['temporaryBlockList'] = $temporaryBlockList;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('permanentlyBlockList', $this->fields)) {
            $data['permanentlyBlockList'] = $this->fields['permanentlyBlockList']?->jsonSerialize();
        }
        if (array_key_exists('temporaryBlockList', $this->fields)) {
            $data['temporaryBlockList'] = $this->fields['temporaryBlockList']?->jsonSerialize();
        }

        return $data;
    }
}
