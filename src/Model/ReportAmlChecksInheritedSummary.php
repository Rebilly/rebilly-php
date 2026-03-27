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
use Rebilly\Sdk\Trait\HasMetadata;

class ReportAmlChecksInheritedSummary implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('totalInherited', $data)) {
            $this->setTotalInherited($data['totalInherited']);
        }
        if (array_key_exists('categories', $data)) {
            $this->setCategories($data['categories']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getTotalInherited(): int
    {
        return $this->fields['totalInherited'];
    }

    public function setTotalInherited(int $totalInherited): static
    {
        $this->fields['totalInherited'] = $totalInherited;

        return $this;
    }

    /**
     * @return ReportAmlChecksInheritedSummaryCategories[]
     */
    public function getCategories(): array
    {
        return $this->fields['categories'];
    }

    /**
     * @param array[]|ReportAmlChecksInheritedSummaryCategories[] $categories
     */
    public function setCategories(array $categories): static
    {
        $categories = array_map(
            fn ($value) => $value instanceof ReportAmlChecksInheritedSummaryCategories ? $value : ReportAmlChecksInheritedSummaryCategories::from($value),
            $categories,
        );

        $this->fields['categories'] = $categories;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('totalInherited', $this->fields)) {
            $data['totalInherited'] = $this->fields['totalInherited'];
        }
        if (array_key_exists('categories', $this->fields)) {
            $data['categories'] = array_map(
                static fn (ReportAmlChecksInheritedSummaryCategories $reportAmlChecksInheritedSummaryCategories) => $reportAmlChecksInheritedSummaryCategories->jsonSerialize(),
                $this->fields['categories'],
            );
        }

        return $data;
    }
}
