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

interface PayoutRequestBatchOperationRequest extends JsonSerializable
{
    public function getType(): string;

    public function getBatchId(): string;

    public function setBatchId(string $batchId): static;
}
