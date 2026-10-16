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

use Rebilly\Sdk\Exception\UnknownDiscriminatorValueException;

class PayoutRequestBatchOperationRequestFactory
{
    public static function from(array $data = [], array $metadata = []): PayoutRequestBatchOperationRequest
    {
        return match ($data['type']) {
            'add' => AddPayoutRequestBatchOperationFactory::from($data, $metadata),
            'approve' => ApprovePayoutRequestBatchOperation::from($data, $metadata),
            'auto-allocate' => AutoAllocatePayoutRequestBatchOperation::from($data, $metadata),
            'block' => BlockPayoutRequestBatchOperation::from($data, $metadata),
            'process' => ProcessPayoutRequestBatchOperation::from($data, $metadata),
            'remove' => RemovePayoutRequestBatchOperation::from($data, $metadata),
            'unblock' => UnblockPayoutRequestBatchOperation::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
