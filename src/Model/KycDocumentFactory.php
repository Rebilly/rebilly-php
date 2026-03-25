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

class KycDocumentFactory
{
    public static function from(array $data = [], array $metadata = []): KycDocument
    {
        return match ($data['documentType']) {
            'address-proof' => ProofOfAddressKycDocument::from($data, $metadata),
            'credit-file-proof' => ProofOfCreditFileKycDocument::from($data, $metadata),
            'funds-proof' => ProofOfFundsKycDocument::from($data, $metadata),
            'identity-proof' => ProofOfIdentityKycDocument::from($data, $metadata),
            'purchase-proof' => ProofOfPurchaseKycDocument::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
