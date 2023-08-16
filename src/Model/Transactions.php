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

class Transactions extends DataExport
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'resource' => 'transactions',
        ] + $data);

        if (array_key_exists('dateRange', $data)) {
            $this->setDateRange($data['dateRange']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDateRange(): ?DataExportDateRange
    {
        return $this->fields['dateRange'] ?? null;
    }

    public function setDateRange(null|DataExportDateRange|array $dateRange): static
    {
        if ($dateRange !== null && !($dateRange instanceof DataExportDateRange)) {
            $dateRange = DataExportDateRange::from($dateRange);
        }

        $this->fields['dateRange'] = $dateRange;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('dateRange', $this->fields)) {
            $data['dateRange'] = $this->fields['dateRange']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
