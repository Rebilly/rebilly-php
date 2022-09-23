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

enum KycDocumentSubtypes: string
{
    case PASSPORT = 'passport';
    case ID_CARD = 'id-card';
    case DRIVER_LICENSE = 'driver-license';
    case BIRTH_CERTIFICATE = 'birth-certificate';
    case UTILITY_BILL = 'utility-bill';
    case RENTAL_RECEIPT = 'rental-receipt';
    case LEASE_AGREEMENT = 'lease-agreement';
    case COPY_CREDIT_CARD = 'copy-credit-card';
    case CREDIT_CARD_STATEMENT = 'credit-card-statement';
    case BANK_STATEMENT = 'bank-statement';
    case INHERITANCE_DOCUMENTATION = 'inheritance-documentation';
    case TAX_RETURN = 'tax-return';
    case SALARY_SLIP = 'salary-slip';
    case SALE_OF_ASSETS = 'sale-of-assets';
    case PUBLIC_HEALTH_CARD = 'public-health-card';
    case PROOF_OF_AGE_CARD = 'proof-of-age-card';
    case REVERSE_OF_ID = 'reverse-of-id';
    case PUBLIC_SERVICE = 'public-service';
    case EWALLET_HOLDER_DETAILS = 'ewallet-holder-details';
    case EWALLET_TRANSACTION_STATEMENT = 'ewallet-transaction-statement';
    case MARRIAGE_CERTIFICATE = 'marriage-certificate';
    case FIREARMS_LICENSE = 'firearms-license';
    case INSURANCE_LETTER = 'insurance-letter';
    case INCOME_STATEMENT = 'income-statement';
    case DEBTORS_LETTER = 'debtors-letter';
    case OTHER = 'other';
}
