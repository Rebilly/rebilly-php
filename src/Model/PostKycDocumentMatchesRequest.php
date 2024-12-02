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

interface PostKycDocumentMatchesRequest extends JsonSerializable
{
    public function getFirstName(): ?string;

    public function setFirstName(null|string $firstName): static;

    public function getLastName(): ?string;

    public function setLastName(null|string $lastName): static;

    public function getDocumentSubtype(): ?string;

    public function setDocumentSubtype(null|string $documentSubtype): static;

    public function getIsTampered(): ?bool;

    public function setIsTampered(null|bool $isTampered): static;
}
