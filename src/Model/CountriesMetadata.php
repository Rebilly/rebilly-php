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

interface CountriesMetadata
{
    public function getMode(): string;

    /**
     * @return null|string[]
     */
    public function getValues(): ?array;

    /**
     * @param string[] $values
     */
    public function setValues(array $values): static;
}
