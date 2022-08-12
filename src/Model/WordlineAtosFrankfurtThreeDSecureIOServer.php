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

class WordlineAtosFrankfurtThreeDSecureIOServer extends WorldlineAtosFrankfurt3dsServers
{
    public const TRANSACTION_TYPE__01 = '01';

    public const TRANSACTION_TYPE__03 = '03';

    public const TRANSACTION_TYPE__10 = '10';

    public const TRANSACTION_TYPE__11 = '11';

    public const TRANSACTION_TYPE__28 = '28';

    public const THREE_RI_IND__01 = '01';

    public const THREE_RI_IND__02 = '02';

    public const THREE_RI_IND__03 = '03';

    public const THREE_RI_IND__04 = '04';

    public const THREE_RI_IND__05 = '05';

    public const THREE_RI_IND__06 = '06';

    public const THREE_RI_IND__07 = '07';

    public const THREE_RI_IND__08 = '08';

    public const THREE_RI_IND__09 = '09';

    public const THREE_RI_IND__10 = '10';

    public const THREE_RI_IND__11 = '11';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'ThreeDSecureIO3dsServer',
        ] + $data);

        if (array_key_exists('acquirerMerchantIdVisa', $data)) {
            $this->setAcquirerMerchantIdVisa($data['acquirerMerchantIdVisa']);
        }
        if (array_key_exists('acquirerMerchantIdMastercard', $data)) {
            $this->setAcquirerMerchantIdMastercard($data['acquirerMerchantIdMastercard']);
        }
        if (array_key_exists('merchantName', $data)) {
            $this->setMerchantName($data['merchantName']);
        }
        if (array_key_exists('merchantAcquirerBinVisa', $data)) {
            $this->setMerchantAcquirerBinVisa($data['merchantAcquirerBinVisa']);
        }
        if (array_key_exists('merchantAcquirerBinMastercard', $data)) {
            $this->setMerchantAcquirerBinMastercard($data['merchantAcquirerBinMastercard']);
        }
        if (array_key_exists('merchantCountry', $data)) {
            $this->setMerchantCountry($data['merchantCountry']);
        }
        if (array_key_exists('merchantUrl', $data)) {
            $this->setMerchantUrl($data['merchantUrl']);
        }
        if (array_key_exists('v1', $data)) {
            $this->setV1($data['v1']);
        }
        if (array_key_exists('v2', $data)) {
            $this->setV2($data['v2']);
        }
        if (array_key_exists('transactionType', $data)) {
            $this->setTransactionType($data['transactionType']);
        }
        if (array_key_exists('declineNotEnrolled', $data)) {
            $this->setDeclineNotEnrolled($data['declineNotEnrolled']);
        }
        if (array_key_exists('use3dsForMerchantInitiated', $data)) {
            $this->setUse3dsForMerchantInitiated($data['use3dsForMerchantInitiated']);
        }
        if (array_key_exists('threeRIInd', $data)) {
            $this->setThreeRIInd($data['threeRIInd']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAcquirerMerchantIdVisa(): string
    {
        return $this->fields['acquirerMerchantIdVisa'];
    }

    public function setAcquirerMerchantIdVisa(string $acquirerMerchantIdVisa): self
    {
        $this->fields['acquirerMerchantIdVisa'] = $acquirerMerchantIdVisa;

        return $this;
    }

    public function getAcquirerMerchantIdMastercard(): string
    {
        return $this->fields['acquirerMerchantIdMastercard'];
    }

    public function setAcquirerMerchantIdMastercard(string $acquirerMerchantIdMastercard): self
    {
        $this->fields['acquirerMerchantIdMastercard'] = $acquirerMerchantIdMastercard;

        return $this;
    }

    public function getMerchantName(): string
    {
        return $this->fields['merchantName'];
    }

    public function setMerchantName(string $merchantName): self
    {
        $this->fields['merchantName'] = $merchantName;

        return $this;
    }

    public function getMerchantAcquirerBinVisa(): string
    {
        return $this->fields['merchantAcquirerBinVisa'];
    }

    public function setMerchantAcquirerBinVisa(string $merchantAcquirerBinVisa): self
    {
        $this->fields['merchantAcquirerBinVisa'] = $merchantAcquirerBinVisa;

        return $this;
    }

    public function getMerchantAcquirerBinMastercard(): string
    {
        return $this->fields['merchantAcquirerBinMastercard'];
    }

    public function setMerchantAcquirerBinMastercard(string $merchantAcquirerBinMastercard): self
    {
        $this->fields['merchantAcquirerBinMastercard'] = $merchantAcquirerBinMastercard;

        return $this;
    }

    public function getMerchantCountry(): string
    {
        return $this->fields['merchantCountry'];
    }

    public function setMerchantCountry(string $merchantCountry): self
    {
        $this->fields['merchantCountry'] = $merchantCountry;

        return $this;
    }

    public function getMerchantUrl(): string
    {
        return $this->fields['merchantUrl'];
    }

    public function setMerchantUrl(string $merchantUrl): self
    {
        $this->fields['merchantUrl'] = $merchantUrl;

        return $this;
    }

    public function getV1(): ?bool
    {
        return $this->fields['v1'] ?? null;
    }

    public function setV1(null|bool $v1): self
    {
        $this->fields['v1'] = $v1;

        return $this;
    }

    public function getV2(): ?bool
    {
        return $this->fields['v2'] ?? null;
    }

    public function setV2(null|bool $v2): self
    {
        $this->fields['v2'] = $v2;

        return $this;
    }

    /**
     * @psalm-return self::TRANSACTION_TYPE_*|null $transactionType
     */
    public function getTransactionType(): ?string
    {
        return $this->fields['transactionType'] ?? null;
    }

    /**
     * @psalm-param self::TRANSACTION_TYPE_*|null $transactionType
     */
    public function setTransactionType(null|string $transactionType): self
    {
        $this->fields['transactionType'] = $transactionType;

        return $this;
    }

    public function getDeclineNotEnrolled(): ?bool
    {
        return $this->fields['declineNotEnrolled'] ?? null;
    }

    public function setDeclineNotEnrolled(null|bool $declineNotEnrolled): self
    {
        $this->fields['declineNotEnrolled'] = $declineNotEnrolled;

        return $this;
    }

    public function getUse3dsForMerchantInitiated(): ?bool
    {
        return $this->fields['use3dsForMerchantInitiated'] ?? null;
    }

    public function setUse3dsForMerchantInitiated(null|bool $use3dsForMerchantInitiated): self
    {
        $this->fields['use3dsForMerchantInitiated'] = $use3dsForMerchantInitiated;

        return $this;
    }

    /**
     * @psalm-return self::THREE_RI_IND_*|null $threeRIInd
     */
    public function getThreeRIInd(): ?string
    {
        return $this->fields['threeRIInd'] ?? null;
    }

    /**
     * @psalm-param self::THREE_RI_IND_*|null $threeRIInd
     */
    public function setThreeRIInd(null|string $threeRIInd): self
    {
        $this->fields['threeRIInd'] = $threeRIInd;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('acquirerMerchantIdVisa', $this->fields)) {
            $data['acquirerMerchantIdVisa'] = $this->fields['acquirerMerchantIdVisa'];
        }
        if (array_key_exists('acquirerMerchantIdMastercard', $this->fields)) {
            $data['acquirerMerchantIdMastercard'] = $this->fields['acquirerMerchantIdMastercard'];
        }
        if (array_key_exists('merchantName', $this->fields)) {
            $data['merchantName'] = $this->fields['merchantName'];
        }
        if (array_key_exists('merchantAcquirerBinVisa', $this->fields)) {
            $data['merchantAcquirerBinVisa'] = $this->fields['merchantAcquirerBinVisa'];
        }
        if (array_key_exists('merchantAcquirerBinMastercard', $this->fields)) {
            $data['merchantAcquirerBinMastercard'] = $this->fields['merchantAcquirerBinMastercard'];
        }
        if (array_key_exists('merchantCountry', $this->fields)) {
            $data['merchantCountry'] = $this->fields['merchantCountry'];
        }
        if (array_key_exists('merchantUrl', $this->fields)) {
            $data['merchantUrl'] = $this->fields['merchantUrl'];
        }
        if (array_key_exists('v1', $this->fields)) {
            $data['v1'] = $this->fields['v1'];
        }
        if (array_key_exists('v2', $this->fields)) {
            $data['v2'] = $this->fields['v2'];
        }
        if (array_key_exists('transactionType', $this->fields)) {
            $data['transactionType'] = $this->fields['transactionType'];
        }
        if (array_key_exists('declineNotEnrolled', $this->fields)) {
            $data['declineNotEnrolled'] = $this->fields['declineNotEnrolled'];
        }
        if (array_key_exists('use3dsForMerchantInitiated', $this->fields)) {
            $data['use3dsForMerchantInitiated'] = $this->fields['use3dsForMerchantInitiated'];
        }
        if (array_key_exists('threeRIInd', $this->fields)) {
            $data['threeRIInd'] = $this->fields['threeRIInd'];
        }

        return parent::jsonSerialize() + $data;
    }
}
