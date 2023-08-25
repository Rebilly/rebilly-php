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

class ProofOfIdentityKycDocumentParsedData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('score', $data)) {
            $this->setScore($data['score']);
        }
        if (array_key_exists('data', $data)) {
            $this->setData($data['data']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getScore(): ?float
    {
        return $this->fields['score'] ?? null;
    }

    public function setScore(null|float|string $score): static
    {
        if (is_string($score)) {
            $score = (float) $score;
        }

        $this->fields['score'] = $score;

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
        if (array_key_exists('data', $this->fields)) {
            $data['data'] = $this->fields['data']?->jsonSerialize();
        }

        return $data;
    }
}
