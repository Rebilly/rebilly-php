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

class PatchCustomerEddScoreRequest implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('score', $data)) {
            $this->setScore($data['score']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getScore(): PatchCustomerEddScoreRequestScore
    {
        return $this->fields['score'];
    }

    public function setScore(PatchCustomerEddScoreRequestScore|array $score): static
    {
        if (!($score instanceof PatchCustomerEddScoreRequestScore)) {
            $score = PatchCustomerEddScoreRequestScore::from($score);
        }

        $this->fields['score'] = $score;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('score', $this->fields)) {
            $data['score'] = $this->fields['score']->jsonSerialize();
        }

        return $data;
    }
}
