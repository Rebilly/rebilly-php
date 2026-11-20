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

interface AmlCheckReview extends JsonSerializable
{
    public function getStatus(): ?string;

    public function setStatus(string $status): static;

    /**
     * @return null|AmlHitDecision[]
     */
    public function getHits(): ?array;

    /**
     * @param AmlHitDecision[]|array[] $hits
     */
    public function setHits(array $hits): static;
}
