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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class PostDisputeRequest implements JsonSerializable
{
    public const REASON_CODE_0 = '0';

    public const REASON_CODE_00 = '00';

    public const REASON_CODE_1 = '1';

    public const REASON_CODE_2 = '2';

    public const REASON_CODE_3 = '3';

    public const REASON_CODE_4 = '4';

    public const REASON_CODE_5 = '5';

    public const REASON_CODE_6 = '6';

    public const REASON_CODE_7 = '7';

    public const REASON_CODE_8 = '8';

    public const REASON_CODE_9 = '9';

    public const REASON_CODE_10_1 = '10.1';

    public const REASON_CODE_10_2 = '10.2';

    public const REASON_CODE_10_3 = '10.3';

    public const REASON_CODE_10_4 = '10.4';

    public const REASON_CODE_10_5 = '10.5';

    public const REASON_CODE_11_1 = '11.1';

    public const REASON_CODE_11_2 = '11.2';

    public const REASON_CODE_11_3 = '11.3';

    public const REASON_CODE_12 = '12';

    public const REASON_CODE_12_1 = '12.1';

    public const REASON_CODE_12_2 = '12.2';

    public const REASON_CODE_12_3 = '12.3';

    public const REASON_CODE_12_4 = '12.4';

    public const REASON_CODE_12_5 = '12.5';

    public const REASON_CODE_12_6 = '12.6';

    public const REASON_CODE_12_6_1 = '12.6.1';

    public const REASON_CODE_12_6_2 = '12.6.2';

    public const REASON_CODE_12_7 = '12.7';

    public const REASON_CODE_13_1 = '13.1';

    public const REASON_CODE_13_2 = '13.2';

    public const REASON_CODE_13_3 = '13.3';

    public const REASON_CODE_13_4 = '13.4';

    public const REASON_CODE_13_5 = '13.5';

    public const REASON_CODE_13_6 = '13.6';

    public const REASON_CODE_13_7 = '13.7';

    public const REASON_CODE_13_8 = '13.8';

    public const REASON_CODE_13_9 = '13.9';

    public const REASON_CODE_30 = '30';

    public const REASON_CODE_31 = '31';

    public const REASON_CODE_34 = '34';

    public const REASON_CODE_35 = '35';

    public const REASON_CODE_37 = '37';

    public const REASON_CODE_40 = '40';

    public const REASON_CODE_41 = '41';

    public const REASON_CODE_42 = '42';

    public const REASON_CODE_46 = '46';

    public const REASON_CODE_47 = '47';

    public const REASON_CODE_49 = '49';

    public const REASON_CODE_50 = '50';

    public const REASON_CODE_51 = '51';

    public const REASON_CODE_53 = '53';

    public const REASON_CODE_54 = '54';

    public const REASON_CODE_55 = '55';

    public const REASON_CODE_56 = '56';

    public const REASON_CODE_57 = '57';

    public const REASON_CODE_59 = '59';

    public const REASON_CODE_60 = '60';

    public const REASON_CODE_62 = '62';

    public const REASON_CODE_63 = '63';

    public const REASON_CODE_70 = '70';

    public const REASON_CODE_71 = '71';

    public const REASON_CODE_72 = '72';

    public const REASON_CODE_73 = '73';

    public const REASON_CODE_74 = '74';

    public const REASON_CODE_75 = '75';

    public const REASON_CODE_76 = '76';

    public const REASON_CODE_77 = '77';

    public const REASON_CODE_78 = '78';

    public const REASON_CODE_79 = '79';

    public const REASON_CODE_80 = '80';

    public const REASON_CODE_81 = '81';

    public const REASON_CODE_82 = '82';

    public const REASON_CODE_83 = '83';

    public const REASON_CODE_85 = '85';

    public const REASON_CODE_86 = '86';

    public const REASON_CODE_93 = '93';

    public const REASON_CODE_98 = '98';

    public const REASON_CODE_004 = '004';

    public const REASON_CODE_021 = '021';

    public const REASON_CODE_024 = '024';

    public const REASON_CODE_059 = '059';

    public const REASON_CODE_062 = '062';

    public const REASON_CODE_063 = '063';

    public const REASON_CODE_127 = '127';

    public const REASON_CODE_154 = '154';

    public const REASON_CODE_155 = '155';

    public const REASON_CODE_158 = '158';

    public const REASON_CODE_173 = '173';

    public const REASON_CODE_175 = '175';

    public const REASON_CODE_176 = '176';

    public const REASON_CODE_193 = '193';

    public const REASON_CODE_680 = '680';

    public const REASON_CODE_684 = '684';

    public const REASON_CODE_691 = '691';

    public const REASON_CODE_693 = '693';

    public const REASON_CODE_1000 = '1000';

    public const REASON_CODE_2001 = '2001';

    public const REASON_CODE_2002 = '2002';

    public const REASON_CODE_2003 = '2003';

    public const REASON_CODE_2004 = '2004';

    public const REASON_CODE_2005 = '2005';

    public const REASON_CODE_2008 = '2008';

    public const REASON_CODE_2011 = '2011';

    public const REASON_CODE_2700 = '2700';

    public const REASON_CODE_2701 = '2701';

    public const REASON_CODE_2702 = '2702';

    public const REASON_CODE_2703 = '2703';

    public const REASON_CODE_2704 = '2704';

    public const REASON_CODE_2705 = '2705';

    public const REASON_CODE_2706 = '2706';

    public const REASON_CODE_2707 = '2707';

    public const REASON_CODE_2708 = '2708';

    public const REASON_CODE_2709 = '2709';

    public const REASON_CODE_2710 = '2710';

    public const REASON_CODE_2713 = '2713';

    public const REASON_CODE_2870 = '2870';

    public const REASON_CODE_2871 = '2871';

    public const REASON_CODE_4807 = '4807';

    public const REASON_CODE_4808 = '4808';

    public const REASON_CODE_4812 = '4812';

    public const REASON_CODE_4831 = '4831';

    public const REASON_CODE_4834 = '4834';

    public const REASON_CODE_4837 = '4837';

    public const REASON_CODE_4840 = '4840';

    public const REASON_CODE_4841 = '4841';

    public const REASON_CODE_4842 = '4842';

    public const REASON_CODE_4846 = '4846';

    public const REASON_CODE_4849 = '4849';

    public const REASON_CODE_4850 = '4850';

    public const REASON_CODE_4853 = '4853';

    public const REASON_CODE_4854 = '4854';

    public const REASON_CODE_4855 = '4855';

    public const REASON_CODE_4859 = '4859';

    public const REASON_CODE_4860 = '4860';

    public const REASON_CODE_4863 = '4863';

    public const REASON_CODE_4870 = '4870';

    public const REASON_CODE_4871 = '4871';

    public const REASON_CODE_4901 = '4901';

    public const REASON_CODE_4902 = '4902';

    public const REASON_CODE_4903 = '4903';

    public const REASON_CODE_4904 = '4904';

    public const REASON_CODE_4905 = '4905';

    public const REASON_CODE_4908 = '4908';

    public const REASON_CODE_4999 = '4999';

    public const REASON_CODE_A = 'A';

    public const REASON_CODE_A01 = 'A01';

    public const REASON_CODE_A02 = 'A02';

    public const REASON_CODE_A08 = 'A08';

    public const REASON_CODE_AL = 'AL';

    public const REASON_CODE_AP = 'AP';

    public const REASON_CODE_AW = 'AW';

    public const REASON_CODE_B = 'B';

    public const REASON_CODE_C = 'C';

    public const REASON_CODE_C02 = 'C02';

    public const REASON_CODE_C04 = 'C04';

    public const REASON_CODE_C05 = 'C05';

    public const REASON_CODE_C08 = 'C08';

    public const REASON_CODE_C14 = 'C14';

    public const REASON_CODE_C18 = 'C18';

    public const REASON_CODE_C28 = 'C28';

    public const REASON_CODE_C31 = 'C31';

    public const REASON_CODE_C32 = 'C32';

    public const REASON_CODE_CA = 'CA';

    public const REASON_CODE_CD = 'CD';

    public const REASON_CODE_CR = 'CR';

    public const REASON_CODE_D = 'D';

    public const REASON_CODE_DA = 'DA';

    public const REASON_CODE_DP = 'DP';

    public const REASON_CODE_DP1 = 'DP1';

    public const REASON_CODE_EX = 'EX';

    public const REASON_CODE_F10 = 'F10';

    public const REASON_CODE_F14 = 'F14';

    public const REASON_CODE_F22 = 'F22';

    public const REASON_CODE_F24 = 'F24';

    public const REASON_CODE_F29 = 'F29';

    public const REASON_CODE_F30 = 'F30';

    public const REASON_CODE_F31 = 'F31';

    public const REASON_CODE_FR1 = 'FR1';

    public const REASON_CODE_FR2 = 'FR2';

    public const REASON_CODE_FR4 = 'FR4';

    public const REASON_CODE_FR6 = 'FR6';

    public const REASON_CODE_IC = 'IC';

    public const REASON_CODE_IN = 'IN';

    public const REASON_CODE_IS = 'IS';

    public const REASON_CODE_ITA = 'ITA';

    public const REASON_CODE_LP = 'LP';

    public const REASON_CODE_M01 = 'M01';

    public const REASON_CODE_M10 = 'M10';

    public const REASON_CODE_M49 = 'M49';

    public const REASON_CODE_N = 'N';

    public const REASON_CODE_NA = 'NA';

    public const REASON_CODE_NC = 'NC';

    public const REASON_CODE_P = 'P';

    public const REASON_CODE_P01 = 'P01';

    public const REASON_CODE_P03 = 'P03';

    public const REASON_CODE_P04 = 'P04';

    public const REASON_CODE_P05 = 'P05';

    public const REASON_CODE_P07 = 'P07';

    public const REASON_CODE_P08 = 'P08';

    public const REASON_CODE_P22 = 'P22';

    public const REASON_CODE_P23 = 'P23';

    public const REASON_CODE_R03 = 'R03';

    public const REASON_CODE_R13 = 'R13';

    public const REASON_CODE_RG = 'RG';

    public const REASON_CODE_RM = 'RM';

    public const REASON_CODE_RN1 = 'RN1';

    public const REASON_CODE_RN2 = 'RN2';

    public const REASON_CODE_SV = 'SV';

    public const REASON_CODE_TF = 'TF';

    public const REASON_CODE_TNM = 'TNM';

    public const REASON_CODE_UA01 = 'UA01';

    public const REASON_CODE_UA02 = 'UA02';

    public const REASON_CODE_UA03 = 'UA03';

    public const REASON_CODE_UA10 = 'UA10';

    public const REASON_CODE_UA11 = 'UA11';

    public const REASON_CODE_UA12 = 'UA12';

    public const REASON_CODE_UA18 = 'UA18';

    public const REASON_CODE_UA20 = 'UA20';

    public const REASON_CODE_UA21 = 'UA21';

    public const REASON_CODE_UA22 = 'UA22';

    public const REASON_CODE_UA23 = 'UA23';

    public const REASON_CODE_UA28 = 'UA28';

    public const REASON_CODE_UA30 = 'UA30';

    public const REASON_CODE_UA31 = 'UA31';

    public const REASON_CODE_UA32 = 'UA32';

    public const REASON_CODE_UA38 = 'UA38';

    public const REASON_CODE_UA99 = 'UA99';

    public const REASON_CODE_BANK_CANNOT_PROCESS = 'bank_cannot_process';

    public const REASON_CODE_CREDIT_NOT_PROCESSED = 'credit_not_processed';

    public const REASON_CODE_CUSTOMER_INITIATED = 'customer_initiated';

    public const REASON_CODE_DEBIT_NOT_AUTHORIZED = 'debit_not_authorized';

    public const REASON_CODE_DUPLICATE = 'duplicate';

    public const REASON_CODE_FRAUDULENT = 'fraudulent';

    public const REASON_CODE_GENERAL = 'general';

    public const REASON_CODE_INCORRECT_ACCOUNT_DETAILS = 'incorrect_account_details';

    public const REASON_CODE_INSUFFICIENT_FUNDS = 'insufficient_funds';

    public const REASON_CODE_MERCHANDISE = 'merchandise';

    public const REASON_CODE_NON_RECEIPT = 'non_receipt';

    public const REASON_CODE_NOT_AS_DESCRIBED = 'not_as_described';

    public const REASON_CODE_PRE_CHARGEBACK_ALERT = 'pre-chargeback-alert';

    public const REASON_CODE_PRODUCT_NOT_RECEIVED = 'product_not_received';

    public const REASON_CODE_PRODUCT_UNACCEPTABLE = 'product_unacceptable';

    public const REASON_CODE_SPECIAL = 'special';

    public const REASON_CODE_SUBSCRIPTION_CANCELED = 'subscription_canceled';

    public const REASON_CODE_UNAUTHORIZED = 'unauthorized';

    public const REASON_CODE_UNAUTHORIZED_CLAIM = 'unauthorized_claim';

    public const REASON_CODE_UNRECOGNIZED = 'unrecognized';

    public const TYPE_INFORMATION_REQUEST = 'information-request';

    public const TYPE_FIRST_CHARGEBACK = 'first-chargeback';

    public const TYPE_SECOND_CHARGEBACK = 'second-chargeback';

    public const TYPE_ARBITRATION = 'arbitration';

    public const TYPE_FRAUD = 'fraud';

    public const TYPE_ETHOCA_ALERT = 'ethoca-alert';

    public const TYPE_VERIFI_ALERT = 'verifi-alert';

    public const TYPE_BANK_RETURN = 'bank-return';

    public const TYPE_PAYPAL_CLAIM = 'paypal-claim';

    public const TYPE_REPRESENTMENT = 'representment';

    public const TYPE_INQUIRY = 'inquiry';

    public const TYPE_FORCED_REFUND = 'forced-refund';

    public const STATUS_RESPONSE_NEEDED = 'response-needed';

    public const STATUS_UNDER_REVIEW = 'under-review';

    public const STATUS_FORFEITED = 'forfeited';

    public const STATUS_WON = 'won';

    public const STATUS_LOST = 'lost';

    public const STATUS_UNKNOWN = 'unknown';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('transactionId', $data)) {
            $this->setTransactionId($data['transactionId']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('acquirerReferenceNumber', $data)) {
            $this->setAcquirerReferenceNumber($data['acquirerReferenceNumber']);
        }
        if (array_key_exists('caseId', $data)) {
            $this->setCaseId($data['caseId']);
        }
        if (array_key_exists('reasonCode', $data)) {
            $this->setReasonCode($data['reasonCode']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('postedTime', $data)) {
            $this->setPostedTime($data['postedTime']);
        }
        if (array_key_exists('deadlineTime', $data)) {
            $this->setDeadlineTime($data['deadlineTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTransactionId(): string
    {
        return $this->fields['transactionId'];
    }

    public function setTransactionId(string $transactionId): static
    {
        $this->fields['transactionId'] = $transactionId;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getAmount(): float
    {
        return $this->fields['amount'];
    }

    public function setAmount(float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getAcquirerReferenceNumber(): ?string
    {
        return $this->fields['acquirerReferenceNumber'] ?? null;
    }

    public function setAcquirerReferenceNumber(null|string $acquirerReferenceNumber): static
    {
        $this->fields['acquirerReferenceNumber'] = $acquirerReferenceNumber;

        return $this;
    }

    public function getCaseId(): ?string
    {
        return $this->fields['caseId'] ?? null;
    }

    public function setCaseId(null|string $caseId): static
    {
        $this->fields['caseId'] = $caseId;

        return $this;
    }

    public function getReasonCode(): string
    {
        return $this->fields['reasonCode'];
    }

    public function setReasonCode(string $reasonCode): static
    {
        $this->fields['reasonCode'] = $reasonCode;

        return $this;
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->fields['status'];
    }

    public function setStatus(string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function getPostedTime(): DateTimeImmutable
    {
        return $this->fields['postedTime'];
    }

    public function setPostedTime(DateTimeImmutable|string $postedTime): static
    {
        if (!($postedTime instanceof DateTimeImmutable)) {
            $postedTime = new DateTimeImmutable($postedTime);
        }

        $this->fields['postedTime'] = $postedTime;

        return $this;
    }

    public function getDeadlineTime(): ?DateTimeImmutable
    {
        return $this->fields['deadlineTime'] ?? null;
    }

    public function setDeadlineTime(null|DateTimeImmutable|string $deadlineTime): static
    {
        if ($deadlineTime !== null && !($deadlineTime instanceof DateTimeImmutable)) {
            $deadlineTime = new DateTimeImmutable($deadlineTime);
        }

        $this->fields['deadlineTime'] = $deadlineTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transactionId', $this->fields)) {
            $data['transactionId'] = $this->fields['transactionId'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('acquirerReferenceNumber', $this->fields)) {
            $data['acquirerReferenceNumber'] = $this->fields['acquirerReferenceNumber'];
        }
        if (array_key_exists('caseId', $this->fields)) {
            $data['caseId'] = $this->fields['caseId'];
        }
        if (array_key_exists('reasonCode', $this->fields)) {
            $data['reasonCode'] = $this->fields['reasonCode'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('postedTime', $this->fields)) {
            $data['postedTime'] = $this->fields['postedTime']->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('deadlineTime', $this->fields)) {
            $data['deadlineTime'] = $this->fields['deadlineTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
