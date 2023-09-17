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

use JsonSerializable;

class ThreeDSecureIO3dsServer implements TestProcessor3dsServers, JsonSerializable
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
        if (array_key_exists('acquirerMerchantIdVisa', $data)) {
            $this->setAcquirerMerchantIdVisa($data['acquirerMerchantIdVisa']);
        }
        if (array_key_exists('acquirerMerchantIdMastercard', $data)) {
            $this->setAcquirerMerchantIdMastercard($data['acquirerMerchantIdMastercard']);
        }
        if (array_key_exists('acquirerMerchantIdAmex', $data)) {
            $this->setAcquirerMerchantIdAmex($data['acquirerMerchantIdAmex']);
        }
        if (array_key_exists('acquirerMerchantIdDiscover', $data)) {
            $this->setAcquirerMerchantIdDiscover($data['acquirerMerchantIdDiscover']);
        }
        if (array_key_exists('acquirerMerchantIdJcb', $data)) {
            $this->setAcquirerMerchantIdJcb($data['acquirerMerchantIdJcb']);
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
        if (array_key_exists('merchantAcquirerBinAmex', $data)) {
            $this->setMerchantAcquirerBinAmex($data['merchantAcquirerBinAmex']);
        }
        if (array_key_exists('merchantAcquirerBinDiscover', $data)) {
            $this->setMerchantAcquirerBinDiscover($data['merchantAcquirerBinDiscover']);
        }
        if (array_key_exists('merchantAcquirerBinJcb', $data)) {
            $this->setMerchantAcquirerBinJcb($data['merchantAcquirerBinJcb']);
        }
        if (array_key_exists('merchantCountry', $data)) {
            $this->setMerchantCountry($data['merchantCountry']);
        }
        if (array_key_exists('merchantUrl', $data)) {
            $this->setMerchantUrl($data['merchantUrl']);
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

    public function getName(): string
    {
        return 'ThreeDSecureIO3dsServer';
    }

    public function getAcquirerMerchantIdVisa(): string
    {
        return $this->fields['acquirerMerchantIdVisa'];
    }

    public function setAcquirerMerchantIdVisa(string $acquirerMerchantIdVisa): static
    {
        $this->fields['acquirerMerchantIdVisa'] = $acquirerMerchantIdVisa;

        return $this;
    }

    public function getAcquirerMerchantIdMastercard(): string
    {
        return $this->fields['acquirerMerchantIdMastercard'];
    }

    public function setAcquirerMerchantIdMastercard(string $acquirerMerchantIdMastercard): static
    {
        $this->fields['acquirerMerchantIdMastercard'] = $acquirerMerchantIdMastercard;

        return $this;
    }

    public function getAcquirerMerchantIdAmex(): ?string
    {
        return $this->fields['acquirerMerchantIdAmex'] ?? null;
    }

    public function setAcquirerMerchantIdAmex(null|string $acquirerMerchantIdAmex): static
    {
        $this->fields['acquirerMerchantIdAmex'] = $acquirerMerchantIdAmex;

        return $this;
    }

    public function getAcquirerMerchantIdDiscover(): ?string
    {
        return $this->fields['acquirerMerchantIdDiscover'] ?? null;
    }

    public function setAcquirerMerchantIdDiscover(null|string $acquirerMerchantIdDiscover): static
    {
        $this->fields['acquirerMerchantIdDiscover'] = $acquirerMerchantIdDiscover;

        return $this;
    }

    public function getAcquirerMerchantIdJcb(): ?string
    {
        return $this->fields['acquirerMerchantIdJcb'] ?? null;
    }

    public function setAcquirerMerchantIdJcb(null|string $acquirerMerchantIdJcb): static
    {
        $this->fields['acquirerMerchantIdJcb'] = $acquirerMerchantIdJcb;

        return $this;
    }

    public function getMerchantName(): string
    {
        return $this->fields['merchantName'];
    }

    public function setMerchantName(string $merchantName): static
    {
        $this->fields['merchantName'] = $merchantName;

        return $this;
    }

    public function getMerchantAcquirerBinVisa(): string
    {
        return $this->fields['merchantAcquirerBinVisa'];
    }

    public function setMerchantAcquirerBinVisa(string $merchantAcquirerBinVisa): static
    {
        $this->fields['merchantAcquirerBinVisa'] = $merchantAcquirerBinVisa;

        return $this;
    }

    public function getMerchantAcquirerBinMastercard(): string
    {
        return $this->fields['merchantAcquirerBinMastercard'];
    }

    public function setMerchantAcquirerBinMastercard(string $merchantAcquirerBinMastercard): static
    {
        $this->fields['merchantAcquirerBinMastercard'] = $merchantAcquirerBinMastercard;

        return $this;
    }

    public function getMerchantAcquirerBinAmex(): ?string
    {
        return $this->fields['merchantAcquirerBinAmex'] ?? null;
    }

    public function setMerchantAcquirerBinAmex(null|string $merchantAcquirerBinAmex): static
    {
        $this->fields['merchantAcquirerBinAmex'] = $merchantAcquirerBinAmex;

        return $this;
    }

    public function getMerchantAcquirerBinDiscover(): ?string
    {
        return $this->fields['merchantAcquirerBinDiscover'] ?? null;
    }

    public function setMerchantAcquirerBinDiscover(null|string $merchantAcquirerBinDiscover): static
    {
        $this->fields['merchantAcquirerBinDiscover'] = $merchantAcquirerBinDiscover;

        return $this;
    }

    public function getMerchantAcquirerBinJcb(): ?string
    {
        return $this->fields['merchantAcquirerBinJcb'] ?? null;
    }

    public function setMerchantAcquirerBinJcb(null|string $merchantAcquirerBinJcb): static
    {
        $this->fields['merchantAcquirerBinJcb'] = $merchantAcquirerBinJcb;

        return $this;
    }

    public function getMerchantCountry(): string
    {
        return $this->fields['merchantCountry'];
    }

    public function setMerchantCountry(string $merchantCountry): static
    {
        $this->fields['merchantCountry'] = $merchantCountry;

        return $this;
    }

    public function getMerchantUrl(): string
    {
        return $this->fields['merchantUrl'];
    }

    public function setMerchantUrl(string $merchantUrl): static
    {
        $this->fields['merchantUrl'] = $merchantUrl;

        return $this;
    }

    public function getTransactionType(): string
    {
        return $this->fields['transactionType'];
    }

    public function setTransactionType(string $transactionType): static
    {
        $this->fields['transactionType'] = $transactionType;

        return $this;
    }

    public function getDeclineNotEnrolled(): ?bool
    {
        return $this->fields['declineNotEnrolled'] ?? null;
    }

    public function setDeclineNotEnrolled(null|bool $declineNotEnrolled): static
    {
        $this->fields['declineNotEnrolled'] = $declineNotEnrolled;

        return $this;
    }

    public function getUse3dsForMerchantInitiated(): ?bool
    {
        return $this->fields['use3dsForMerchantInitiated'] ?? null;
    }

    public function setUse3dsForMerchantInitiated(null|bool $use3dsForMerchantInitiated): static
    {
        $this->fields['use3dsForMerchantInitiated'] = $use3dsForMerchantInitiated;

        return $this;
    }

    public function getThreeRIInd(): ?string
    {
        return $this->fields['threeRIInd'] ?? null;
    }

    public function setThreeRIInd(null|string $threeRIInd): static
    {
        $this->fields['threeRIInd'] = $threeRIInd;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'name' => 'ThreeDSecureIO3dsServer',
        ];
        if (array_key_exists('acquirerMerchantIdVisa', $this->fields)) {
            $data['acquirerMerchantIdVisa'] = $this->fields['acquirerMerchantIdVisa'];
        }
        if (array_key_exists('acquirerMerchantIdMastercard', $this->fields)) {
            $data['acquirerMerchantIdMastercard'] = $this->fields['acquirerMerchantIdMastercard'];
        }
        if (array_key_exists('acquirerMerchantIdAmex', $this->fields)) {
            $data['acquirerMerchantIdAmex'] = $this->fields['acquirerMerchantIdAmex'];
        }
        if (array_key_exists('acquirerMerchantIdDiscover', $this->fields)) {
            $data['acquirerMerchantIdDiscover'] = $this->fields['acquirerMerchantIdDiscover'];
        }
        if (array_key_exists('acquirerMerchantIdJcb', $this->fields)) {
            $data['acquirerMerchantIdJcb'] = $this->fields['acquirerMerchantIdJcb'];
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
        if (array_key_exists('merchantAcquirerBinAmex', $this->fields)) {
            $data['merchantAcquirerBinAmex'] = $this->fields['merchantAcquirerBinAmex'];
        }
        if (array_key_exists('merchantAcquirerBinDiscover', $this->fields)) {
            $data['merchantAcquirerBinDiscover'] = $this->fields['merchantAcquirerBinDiscover'];
        }
        if (array_key_exists('merchantAcquirerBinJcb', $this->fields)) {
            $data['merchantAcquirerBinJcb'] = $this->fields['merchantAcquirerBinJcb'];
        }
        if (array_key_exists('merchantCountry', $this->fields)) {
            $data['merchantCountry'] = $this->fields['merchantCountry'];
        }
        if (array_key_exists('merchantUrl', $this->fields)) {
            $data['merchantUrl'] = $this->fields['merchantUrl'];
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

        return $data;
    }
}
