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

class AddPayoutRequestBatchOperationFactory
{
    public static function from(array $data = [], array $metadata = []): AddPayoutRequestBatchOperation
    {
        if (isset($data['filter'])) {
            return AddPayoutRequestBatchOperationByFilter::from($data, $metadata);
        }
        if (isset($data['payoutRequestIds'])) {
            return AddPayoutRequestBatchOperationByIds::from($data, $metadata);
        }

        throw new UnknownDiscriminatorValueException();
    }
}
