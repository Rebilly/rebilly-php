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

class ScopedKycSettingsProofBlock implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('prohibitedSubtypes', $data)) {
            $this->setProhibitedSubtypes($data['prohibitedSubtypes']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return null|array<string,KycProhibitedSubtypeRule|mixed>
     */
    public function getProhibitedSubtypes(): ?array
    {
        return $this->fields['prohibitedSubtypes'] ?? null;
    }

    /**
     * @param null|array<string,array|KycProhibitedSubtypeRule|mixed> $prohibitedSubtypes
     */
    public function setProhibitedSubtypes(null|array $prohibitedSubtypes): static
    {
        if ($prohibitedSubtypes !== null) {
            foreach ($prohibitedSubtypes as $_key => $_value) {
                if (!($_value instanceof KycProhibitedSubtypeRule)) {
                    $prohibitedSubtypes[$_key] = KycProhibitedSubtypeRule::from($_value);
                }
            }
        }
        $this->fields['prohibitedSubtypes'] = $prohibitedSubtypes;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('prohibitedSubtypes', $this->fields)) {
            $data['prohibitedSubtypes'] = $this->fields['prohibitedSubtypes'] !== null
                ? array_map(
                    static fn (KycProhibitedSubtypeRule|mixed $kycProhibitedSubtypeRule) => $kycProhibitedSubtypeRule->jsonSerialize(),
                    $this->fields['prohibitedSubtypes'],
                )
                : null;
        }

        return $data;
    }
}
