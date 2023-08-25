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

class PostTagAmlCheckCollectionRequest implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('amlCheckIds', $data)) {
            $this->setAmlCheckIds($data['amlCheckIds']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return string[]
     */
    public function getAmlCheckIds(): array
    {
        return $this->fields['amlCheckIds'];
    }

    /**
     * @param string[] $amlCheckIds
     */
    public function setAmlCheckIds(array $amlCheckIds): static
    {
        $amlCheckIds = array_map(
            fn ($value) => $value,
            $amlCheckIds,
        );

        $this->fields['amlCheckIds'] = $amlCheckIds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('amlCheckIds', $this->fields)) {
            $data['amlCheckIds'] = $this->fields['amlCheckIds'];
        }

        return $data;
    }
}
