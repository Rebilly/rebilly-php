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

class ProofOfIdentityKycDocumentDocumentMatches implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('score', $data)) {
            $this->setScore($data['score']);
        }
        if (array_key_exists('checkList', $data)) {
            $this->setCheckList($data['checkList']);
        }
        if (array_key_exists('data', $data)) {
            $this->setData($data['data']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getScore(): ?int
    {
        return $this->fields['score'] ?? null;
    }

    public function setScore(null|int $score): static
    {
        $this->fields['score'] = $score;

        return $this;
    }

    /**
     * @return null|KycDocumentCheck[]
     */
    public function getCheckList(): ?array
    {
        return $this->fields['checkList'] ?? null;
    }

    /**
     * @param null|array[]|KycDocumentCheck[] $checkList
     */
    public function setCheckList(null|array $checkList): static
    {
        $checkList = $checkList !== null ? array_map(
            fn ($value) => $value instanceof KycDocumentCheck ? $value : KycDocumentCheck::from($value),
            $checkList,
        ) : null;

        $this->fields['checkList'] = $checkList;

        return $this;
    }

    public function getData(): ?KycIdentityMatches
    {
        return $this->fields['data'] ?? null;
    }

    public function setData(null|KycIdentityMatches|array $data): static
    {
        if ($data !== null && !($data instanceof KycIdentityMatches)) {
            $data = KycIdentityMatches::from($data);
        }

        $this->fields['data'] = $data;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('score', $this->fields)) {
            $data['score'] = $this->fields['score'];
        }
        if (array_key_exists('checkList', $this->fields)) {
            $data['checkList'] = $this->fields['checkList'] !== null
                ? array_map(
                    static fn (KycDocumentCheck $kycDocumentCheck) => $kycDocumentCheck->jsonSerialize(),
                    $this->fields['checkList'],
                )
                : null;
        }
        if (array_key_exists('data', $this->fields)) {
            $data['data'] = $this->fields['data']?->jsonSerialize();
        }

        return $data;
    }
}
