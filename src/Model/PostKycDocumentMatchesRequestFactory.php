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

class PostKycDocumentMatchesRequestFactory
{
    public static function from(array $data = [], array $metadata = []): PostKycDocumentMatchesRequest
    {
        return match ($data['type']) {
            'address-proof' => KycAddressMatchesOverwrite::from($data, $metadata),
            'funds-proof' => KycFundsMatchesOverwrite::from($data, $metadata),
            'identity-proof' => KycIdentityMatchesOverwrite::from($data, $metadata),
            'purchase-proof' => KycPurchaseMatchesOverwrite::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
