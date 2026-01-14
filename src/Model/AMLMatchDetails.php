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

class AMLMatchDetails implements JsonSerializable
{
    public const CONFIDENCE_FACTORS_EXACT_COUNTRY = 'confidence_exact_country';

    public const CONFIDENCE_FACTORS_MISMATCH_COUNTRY = 'confidence_mismatch_country';

    public const CONFIDENCE_FACTORS_MISSING_COUNTRY = 'confidence_missing_country';

    public const CONFIDENCE_FACTORS_EXACT_DOB = 'confidence_exact_dob';

    public const CONFIDENCE_FACTORS_MISMATCH_DOB = 'confidence_mismatch_dob';

    public const CONFIDENCE_FACTORS_MISSING_DOB = 'confidence_missing_dob';

    public const CONFIDENCE_FACTORS_EXACT_YOB = 'confidence_exact_yob';

    public const CONFIDENCE_FACTORS_INEXACT_YOB = 'confidence_inexact_yob';

    public const CONFIDENCE_FACTORS_STRONG_HIT_RELEVANCE = 'confidence_strong_hit_relevance';

    public const CONFIDENCE_FACTORS_WEAK_HIT_RELEVANCE = 'confidence_weak_hit_relevance';

    public const CONFIDENCE_FACTORS_EXACT_FULL_NAME = 'confidence_exact_full_name';

    public const CONFIDENCE_FACTORS_FUZZY_FULL_NAME = 'confidence_fuzzy_full_name';

    public const MATCH_CRITERIA_EXACT_NAME = 'match_exact_name';

    public const MATCH_CRITERIA_PHONETIC_FIRST_NAME = 'match_phonetic_first_name';

    public const MATCH_CRITERIA_PHONETIC_LAST_NAME = 'match_phonetic_last_name';

    public const MATCH_CRITERIA_EXACT_FULL_NAME = 'match_exact_full_name';

    public const MATCH_CRITERIA_AKA_EXACT_NAME = 'match_aka_exact_name';

    public const MATCH_CRITERIA_AKA_PHONETIC_FIRST_NAME = 'match_aka_phonetic_first_name';

    public const MATCH_CRITERIA_AKA_PHONETIC_LAST_NAME = 'match_aka_phonetic_last_name';

    public const MATCH_CRITERIA_AKA_EXACT_FULL_NAME = 'match_aka_exact_full_name';

    public const MATCH_CRITERIA_FUZZY_NATIONALITY = 'match_fuzzy_nationality';

    public const MATCH_CRITERIA_EXACT_ADDRESS = 'match_exact_address';

    public const MATCH_CRITERIA_EXACT_CITY = 'match_exact_city';

    public const MATCH_CRITERIA_EXACT_REGION = 'match_exact_region';

    public const MATCH_CRITERIA_EXACT_COUNTRY = 'match_exact_country';

    public const MATCH_CRITERIA_EXACT_POST_CODE = 'match_exact_post_code';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('confidenceFactors', $data)) {
            $this->setConfidenceFactors($data['confidenceFactors']);
        }
        if (array_key_exists('matchCriteria', $data)) {
            $this->setMatchCriteria($data['matchCriteria']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|string[]
     */
    public function getConfidenceFactors(): ?array
    {
        return $this->fields['confidenceFactors'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getMatchCriteria(): ?array
    {
        return $this->fields['matchCriteria'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('confidenceFactors', $this->fields)) {
            $data['confidenceFactors'] = $this->fields['confidenceFactors'];
        }
        if (array_key_exists('matchCriteria', $this->fields)) {
            $data['matchCriteria'] = $this->fields['matchCriteria'];
        }

        return $data;
    }

    /**
     * @param null|string[] $confidenceFactors
     */
    private function setConfidenceFactors(null|array $confidenceFactors): static
    {
        $this->fields['confidenceFactors'] = $confidenceFactors;

        return $this;
    }

    /**
     * @param null|string[] $matchCriteria
     */
    private function setMatchCriteria(null|array $matchCriteria): static
    {
        $this->fields['matchCriteria'] = $matchCriteria;

        return $this;
    }
}
