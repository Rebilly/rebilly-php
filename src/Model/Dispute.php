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

class Dispute implements JsonSerializable
{
    public const REASON_CODE__1000 = '1000';

    public const REASON_CODE__10_1 = '10.1';

    public const REASON_CODE__10_2 = '10.2';

    public const REASON_CODE__10_3 = '10.3';

    public const REASON_CODE__10_4 = '10.4';

    public const REASON_CODE__10_5 = '10.5';

    public const REASON_CODE__11_1 = '11.1';

    public const REASON_CODE__11_2 = '11.2';

    public const REASON_CODE__11_3 = '11.3';

    public const REASON_CODE__12 = '12';

    public const REASON_CODE__12_1 = '12.1';

    public const REASON_CODE__12_2 = '12.2';

    public const REASON_CODE__12_3 = '12.3';

    public const REASON_CODE__12_4 = '12.4';

    public const REASON_CODE__12_5 = '12.5';

    public const REASON_CODE__12_6 = '12.6';

    public const REASON_CODE__12_7 = '12.7';

    public const REASON_CODE__13_1 = '13.1';

    public const REASON_CODE__13_2 = '13.2';

    public const REASON_CODE__13_3 = '13.3';

    public const REASON_CODE__13_4 = '13.4';

    public const REASON_CODE__13_5 = '13.5';

    public const REASON_CODE__13_6 = '13.6';

    public const REASON_CODE__13_7 = '13.7';

    public const REASON_CODE__13_8 = '13.8';

    public const REASON_CODE__13_9 = '13.9';

    public const REASON_CODE__30 = '30';

    public const REASON_CODE__31 = '31';

    public const REASON_CODE__35 = '35';

    public const REASON_CODE__37 = '37';

    public const REASON_CODE__40 = '40';

    public const REASON_CODE__41 = '41';

    public const REASON_CODE__42 = '42';

    public const REASON_CODE__46 = '46';

    public const REASON_CODE__47 = '47';

    public const REASON_CODE__49 = '49';

    public const REASON_CODE__50 = '50';

    public const REASON_CODE__53 = '53';

    public const REASON_CODE__54 = '54';

    public const REASON_CODE__55 = '55';

    public const REASON_CODE__57 = '57';

    public const REASON_CODE__59 = '59';

    public const REASON_CODE__60 = '60';

    public const REASON_CODE__62 = '62';

    public const REASON_CODE__70 = '70';

    public const REASON_CODE__71 = '71';

    public const REASON_CODE__72 = '72';

    public const REASON_CODE__73 = '73';

    public const REASON_CODE__74 = '74';

    public const REASON_CODE__75 = '75';

    public const REASON_CODE__76 = '76';

    public const REASON_CODE__77 = '77';

    public const REASON_CODE__79 = '79';

    public const REASON_CODE__80 = '80';

    public const REASON_CODE__81 = '81';

    public const REASON_CODE__82 = '82';

    public const REASON_CODE__83 = '83';

    public const REASON_CODE__85 = '85';

    public const REASON_CODE__86 = '86';

    public const REASON_CODE__93 = '93';

    public const REASON_CODE__00 = '00';

    public const REASON_CODE__63 = '63';

    public const REASON_CODE_A01 = 'A01';

    public const REASON_CODE_A02 = 'A02';

    public const REASON_CODE_A08 = 'A08';

    public const REASON_CODE_F10 = 'F10';

    public const REASON_CODE_F14 = 'F14';

    public const REASON_CODE_F22 = 'F22';

    public const REASON_CODE_F24 = 'F24';

    public const REASON_CODE_F29 = 'F29';

    public const REASON_CODE_C02 = 'C02';

    public const REASON_CODE_C04 = 'C04';

    public const REASON_CODE_C05 = 'C05';

    public const REASON_CODE_C08 = 'C08';

    public const REASON_CODE_C14 = 'C14';

    public const REASON_CODE_C18 = 'C18';

    public const REASON_CODE_C28 = 'C28';

    public const REASON_CODE_C31 = 'C31';

    public const REASON_CODE_C32 = 'C32';

    public const REASON_CODE_M10 = 'M10';

    public const REASON_CODE_M49 = 'M49';

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

    public const REASON_CODE_M01 = 'M01';

    public const REASON_CODE_FR1 = 'FR1';

    public const REASON_CODE_FR4 = 'FR4';

    public const REASON_CODE_FR6 = 'FR6';

    public const REASON_CODE_AL = 'AL';

    public const REASON_CODE_AP = 'AP';

    public const REASON_CODE_AW = 'AW';

    public const REASON_CODE_CA = 'CA';

    public const REASON_CODE_CD = 'CD';

    public const REASON_CODE_CR = 'CR';

    public const REASON_CODE_DA = 'DA';

    public const REASON_CODE_DP = 'DP';

    public const REASON_CODE_DP1 = 'DP1';

    public const REASON_CODE_EX = 'EX';

    public const REASON_CODE_IC = 'IC';

    public const REASON_CODE_IN = 'IN';

    public const REASON_CODE_IS = 'IS';

    public const REASON_CODE_LP = 'LP';

    public const REASON_CODE_N = 'N';

    public const REASON_CODE_NA = 'NA';

    public const REASON_CODE_NC = 'NC';

    public const REASON_CODE_P = 'P';

    public const REASON_CODE_RG = 'RG';

    public const REASON_CODE_RM = 'RM';

    public const REASON_CODE_RN1 = 'RN1';

    public const REASON_CODE_RN2 = 'RN2';

    public const REASON_CODE_SV = 'SV';

    public const REASON_CODE_TF = 'TF';

    public const REASON_CODE_TNM = 'TNM';

    public const REASON_CODE_UA01 = 'UA01';

    public const REASON_CODE_UA02 = 'UA02';

    public const REASON_CODE_UA32 = 'UA32';

    public const REASON_CODE_UA99 = 'UA99';

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

    public const REASON_CODE_UA38 = 'UA38';

    public const REASON_CODE_DUPLICATE = 'duplicate';

    public const REASON_CODE_FRAUDULENT = 'fraudulent';

    public const REASON_CODE_SUBSCRIPTION_CANCELED = 'subscription_canceled';

    public const REASON_CODE_PRODUCT_UNACCEPTABLE = 'product_unacceptable';

    public const REASON_CODE_PRODUCT_NOT_RECEIVED = 'product_not_received';

    public const REASON_CODE_UNRECOGNIZED = 'unrecognized';

    public const REASON_CODE_CREDIT_NOT_PROCESSED = 'credit_not_processed';

    public const REASON_CODE_CUSTOMER_INITIATED = 'customer_initiated';

    public const REASON_CODE_INCORRECT_ACCOUNT_DETAILS = 'incorrect_account_details';

    public const REASON_CODE_INSUFFICIENT_FUNDS = 'insufficient_funds';

    public const REASON_CODE_BANK_CANNOT_PROCESS = 'bank_cannot_process';

    public const REASON_CODE_DEBIT_NOT_AUTHORIZED = 'debit_not_authorized';

    public const REASON_CODE_GENERAL = 'general';

    public const REASON_CODE_PRE_CHARGEBACK_ALERT = 'pre-chargeback-alert';

    public const REASON_CODE__0 = '0';

    public const REASON_CODE__1 = '1';

    public const REASON_CODE__2 = '2';

    public const REASON_CODE__3 = '3';

    public const REASON_CODE__4 = '4';

    public const REASON_CODE__5 = '5';

    public const REASON_CODE__6 = '6';

    public const REASON_CODE__7 = '7';

    public const REASON_CODE__8 = '8';

    public const REASON_CODE__9 = '9';

    public const REASON_CODE__51 = '51';

    public const REASON_CODE_A = 'A';

    public const REASON_CODE_B = 'B';

    public const CATEGORY_FRAUD = 'fraud';

    public const CATEGORY_AUTHORIZATION = 'authorization';

    public const CATEGORY_PROCESSING_ERRORS = 'processing-errors';

    public const CATEGORY_CONSUMER_DISPUTES = 'consumer-disputes';

    public const CATEGORY_UNCATEGORIZED = 'uncategorized';

    public const TYPE_INFORMATION_REQUEST = 'information-request';

    public const TYPE_FIRST_CHARGEBACK = 'first-chargeback';

    public const TYPE_SECOND_CHARGEBACK = 'second-chargeback';

    public const TYPE_ARBITRATION = 'arbitration';

    public const TYPE_FRAUD = 'fraud';

    public const TYPE_ETHOCA_ALERT = 'ethoca-alert';

    public const TYPE_VERIFI_ALERT = 'verifi-alert';

    public const STATUS_RESPONSE_NEEDED = 'response-needed';

    public const STATUS_UNDER_REVIEW = 'under-review';

    public const STATUS_FORFEITED = 'forfeited';

    public const STATUS_WON = 'won';

    public const STATUS_LOST = 'lost';

    public const STATUS_UNKNOWN = 'unknown';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
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
        if (array_key_exists('category', $data)) {
            $this->setCategory($data['category']);
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
        if (array_key_exists('rawResponse', $data)) {
            $this->setRawResponse($data['rawResponse']);
        }
        if (array_key_exists('resolvedTime', $data)) {
            $this->setResolvedTime($data['resolvedTime']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getCustomerId(): ?string
    {
        return $this->fields['customerId'] ?? null;
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

    public function getCategory(): ?string
    {
        return $this->fields['category'] ?? null;
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

    public function getRawResponse(): ?string
    {
        return $this->fields['rawResponse'] ?? null;
    }

    public function getResolvedTime(): ?DateTimeImmutable
    {
        return $this->fields['resolvedTime'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getEmbedded(): ?DisputeEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|DisputeEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof DisputeEmbedded)) {
            $embedded = DisputeEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
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
        if (array_key_exists('category', $this->fields)) {
            $data['category'] = $this->fields['category'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('postedTime', $this->fields)) {
            $data['postedTime'] = $this->fields['postedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('deadlineTime', $this->fields)) {
            $data['deadlineTime'] = $this->fields['deadlineTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('rawResponse', $this->fields)) {
            $data['rawResponse'] = $this->fields['rawResponse'];
        }
        if (array_key_exists('resolvedTime', $this->fields)) {
            $data['resolvedTime'] = $this->fields['resolvedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setCustomerId(null|string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    private function setCategory(null|string $category): static
    {
        $this->fields['category'] = $category;

        return $this;
    }

    private function setRawResponse(null|string $rawResponse): static
    {
        $this->fields['rawResponse'] = $rawResponse;

        return $this;
    }

    private function setResolvedTime(null|DateTimeImmutable|string $resolvedTime): static
    {
        if ($resolvedTime !== null && !($resolvedTime instanceof DateTimeImmutable)) {
            $resolvedTime = new DateTimeImmutable($resolvedTime);
        }

        $this->fields['resolvedTime'] = $resolvedTime;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
