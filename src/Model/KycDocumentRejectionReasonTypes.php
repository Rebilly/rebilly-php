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

enum KycDocumentRejectionReasonTypes: string
{
    case DOCUMENT_UNREADABLE = 'document-unreadable';
    case DOCUMENT_EXPIRED = 'document-expired';
    case DOCUMENT_NOT_MATCHING = 'document-not-matching';
    case DOCUMENT_DUPLICATE = 'document-duplicate';
    case DOCUMENT_INVALID = 'document-invalid';
    case DOCUMENT_NOT_OPEN = 'document-not-open';
    case UNDERAGE_PERSON = 'underage-person';
    case THIRD_PARTY_OR_MISMATCH = 'third-party-or-mismatch';
    case EXPIRATION_DATE_MISSING = 'expiration-date-missing';
    case ISSUE_DATE_MISSING = 'issue-date-missing';
    case DOB_MISMATCH = 'dob-mismatch';
    case NAME_MISMATCH = 'name-mismatch';
    case CRITICAL_INFO_MISSING = 'critical-info-missing';
    case OLD_ADDRESS_ON_ID = 'old-address-on-id';
    case OTHER = 'other';
}
