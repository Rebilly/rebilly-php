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

interface ReadyToPayMethods
{
    /**
     * @return null|string[]
     */
    public function getFilters(): ?array;

    /**
     * @param null|string[] $filters
     */
    public function setFilters(null|array $filters): static;
}
