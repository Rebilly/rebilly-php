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

class ResolveScopedKycSettingsResponse implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('subtypeRestrictions', $data)) {
            $this->setSubtypeRestrictions($data['subtypeRestrictions']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getSubtypeRestrictions(): KycSubtypeRestrictions
    {
        return $this->fields['subtypeRestrictions'];
    }

    public function setSubtypeRestrictions(KycSubtypeRestrictions|array $subtypeRestrictions): static
    {
        if (!($subtypeRestrictions instanceof KycSubtypeRestrictions)) {
            $subtypeRestrictions = KycSubtypeRestrictions::from($subtypeRestrictions);
        }

        $this->fields['subtypeRestrictions'] = $subtypeRestrictions;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('subtypeRestrictions', $this->fields)) {
            $data['subtypeRestrictions'] = $this->fields['subtypeRestrictions']->jsonSerialize();
        }

        return $data;
    }
}
