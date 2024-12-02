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

class AmlCompoundConfidenceAddressMatch implements JsonSerializable
{
    public const MATCHING_COUNTRY_WEAK = 'weak';

    public const MATCHING_COUNTRY_MEDIUM = 'medium';

    public const MATCHING_COUNTRY_STRONG = 'strong';

    public const MATCHING_COUNTRY_VERY_STRONG = 'very-strong';

    public const MISMATCHING_COUNTRY_WEAK = 'weak';

    public const MISMATCHING_COUNTRY_MEDIUM = 'medium';

    public const MISMATCHING_COUNTRY_STRONG = 'strong';

    public const MISMATCHING_COUNTRY_VERY_STRONG = 'very-strong';

    public const NO_COUNTRY_WEAK = 'weak';

    public const NO_COUNTRY_MEDIUM = 'medium';

    public const NO_COUNTRY_STRONG = 'strong';

    public const NO_COUNTRY_VERY_STRONG = 'very-strong';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('matchingCountry', $data)) {
            $this->setMatchingCountry($data['matchingCountry']);
        }
        if (array_key_exists('mismatchingCountry', $data)) {
            $this->setMismatchingCountry($data['mismatchingCountry']);
        }
        if (array_key_exists('noCountry', $data)) {
            $this->setNoCountry($data['noCountry']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMatchingCountry(): ?string
    {
        return $this->fields['matchingCountry'] ?? null;
    }

    public function setMatchingCountry(null|string $matchingCountry): static
    {
        $this->fields['matchingCountry'] = $matchingCountry;

        return $this;
    }

    public function getMismatchingCountry(): ?string
    {
        return $this->fields['mismatchingCountry'] ?? null;
    }

    public function setMismatchingCountry(null|string $mismatchingCountry): static
    {
        $this->fields['mismatchingCountry'] = $mismatchingCountry;

        return $this;
    }

    public function getNoCountry(): ?string
    {
        return $this->fields['noCountry'] ?? null;
    }

    public function setNoCountry(null|string $noCountry): static
    {
        $this->fields['noCountry'] = $noCountry;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('matchingCountry', $this->fields)) {
            $data['matchingCountry'] = $this->fields['matchingCountry'];
        }
        if (array_key_exists('mismatchingCountry', $this->fields)) {
            $data['mismatchingCountry'] = $this->fields['mismatchingCountry'];
        }
        if (array_key_exists('noCountry', $this->fields)) {
            $data['noCountry'] = $this->fields['noCountry'];
        }

        return $data;
    }
}
