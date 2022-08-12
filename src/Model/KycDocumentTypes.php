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

enum KycDocumentTypes: string
{
    case IDENTITY_PROOF = 'identity-proof';
    case ADDRESS_PROOF = 'address-proof';
    case FUNDS_PROOF = 'funds-proof';
    case PURCHASE_PROOF = 'purchase-proof';
    case CREDIT_FILE_PROOF = 'credit-file-proof';
}
