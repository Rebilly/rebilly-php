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

class PostPayoutRequestBatchRequestFactory
{
    public static function from(array $data = [], array $metadata = []): PostPayoutRequestBatchRequest
    {
        if (isset($data['payoutRequestIds'])) {
            return PostPayoutRequestBatchRequestExplicitIDs::from($data, $metadata);
        }
        if (isset($data['filter'])) {
            return PostPayoutRequestBatchRequestFilterBased::from($data, $metadata);
        }

        throw new UnknownDiscriminatorValueException();
    }
}
