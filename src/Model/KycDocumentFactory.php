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
    public static function from(array $data = []): KycDocument
    {
        return match ($data['documentType']) {
            'address-proof' => ProofOfAddressKycDocument::from($data),
            'credit-file-proof' => ProofOfCreditFileKycDocument::from($data),
            'funds-proof' => ProofOfFundsKycDocument::from($data),
            'identity-proof' => ProofOfIdentityKycDocument::from($data),
            'purchase-proof' => ProofOfPurchaseKycDocument::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
