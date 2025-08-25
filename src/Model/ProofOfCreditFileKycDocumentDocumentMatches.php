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

class ProofOfCreditFileKycDocumentDocumentMatches implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('data', $data)) {
            $this->setData($data['data']);
        }
        if (array_key_exists('checkList', $data)) {
            $this->setCheckList($data['checkList']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getData(): ?CreditFileMatches
    {
        return $this->fields['data'] ?? null;
    }

    public function setData(null|CreditFileMatches|array $data): static
    {
        if ($data !== null && !($data instanceof CreditFileMatches)) {
            $data = CreditFileMatches::from($data);
        }

        $this->fields['data'] = $data;

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('data', $this->fields)) {
            $data['data'] = $this->fields['data']?->jsonSerialize();
        }
        if (array_key_exists('checkList', $this->fields)) {
            $data['checkList'] = $this->fields['checkList'] !== null
                ? array_map(
                    static fn (KycDocumentCheck $kycDocumentCheck) => $kycDocumentCheck->jsonSerialize(),
                    $this->fields['checkList'],
                )
                : null;
        }

        return $data;
    }
}
