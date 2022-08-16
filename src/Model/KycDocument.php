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

use InvalidArgumentException;
use JsonSerializable;

abstract class KycDocument implements JsonSerializable
{
    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('documentType', $data)) {
            $this->setDocumentType($data['documentType']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['documentType']) {
            case 'identity-proof':
                return new ProofOfIdentityKycDocument($data);
            case 'funds-proof':
                return new ProofOfFundsKycDocument($data);
            case 'address-proof':
                return new ProofOfAddressKycDocument($data);
            case 'credit-file-proof':
                return new ProofOfCreditFileKycDocument($data);
            case 'purchase-proof':
                return new ProofOfPurchaseKycDocument($data);
        }

        throw new InvalidArgumentException("Unsupported documentType value: '{$data['documentType']}'");
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('documentType', $this->fields)) {
            $data['documentType'] = $this->fields['documentType'];
        }

        return $data;
    }
}
