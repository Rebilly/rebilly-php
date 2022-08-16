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

class PaymentCard extends CommonPaymentCard
{
    public const DIGITAL_WALLET_APPLE_PAY = 'Apple Pay';

    public const DIGITAL_WALLET_GOOGLE_PAY = 'Google Pay';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('stickyGatewayAccountId', $data)) {
            $this->setStickyGatewayAccountId($data['stickyGatewayAccountId']);
        }
        if (array_key_exists('expirationReminderTime', $data)) {
            $this->setExpirationReminderTime($data['expirationReminderTime']);
        }
        if (array_key_exists('expirationReminderNumber', $data)) {
            $this->setExpirationReminderNumber($data['expirationReminderNumber']);
        }
        if (array_key_exists('referenceData', $data)) {
            $this->setReferenceData($data['referenceData']);
        }
        if (array_key_exists('digitalWallet', $data)) {
            $this->setDigitalWallet($data['digitalWallet']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
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

    public function getCustomerId(): ?string
    {
        return $this->fields['customerId'] ?? null;
    }

    public function setCustomerId(null|string $customerId): self
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getStickyGatewayAccountId(): ?string
    {
        return $this->fields['stickyGatewayAccountId'] ?? null;
    }

    public function getExpirationReminderTime(): ?DateTimeImmutable
    {
        return $this->fields['expirationReminderTime'] ?? null;
    }

    public function setExpirationReminderTime(null|DateTimeImmutable|string $expirationReminderTime): self
    {
        if ($expirationReminderTime !== null && !($expirationReminderTime instanceof DateTimeImmutable)) {
            $expirationReminderTime = new DateTimeImmutable($expirationReminderTime);
        }

        $this->fields['expirationReminderTime'] = $expirationReminderTime;

        return $this;
    }

    public function getExpirationReminderNumber(): ?int
    {
        return $this->fields['expirationReminderNumber'] ?? null;
    }

    /**
     * @return null|array<string,string>
     */
    public function getReferenceData(): ?array
    {
        return $this->fields['referenceData'] ?? null;
    }

    /**
     * @param null|array<string,string> $referenceData
     */
    public function setReferenceData(null|array $referenceData): self
    {
        $this->fields['referenceData'] = $referenceData;

        return $this;
    }

    /**
     * @psalm-return self::DIGITAL_WALLET_*|null $digitalWallet
     */
    public function getDigitalWallet(): ?string
    {
        return $this->fields['digitalWallet'] ?? null;
    }

    public function getRiskMetadata(): ?RiskMetadata
    {
        return $this->fields['riskMetadata'] ?? null;
    }

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): self
    {
        if ($riskMetadata !== null && !($riskMetadata instanceof RiskMetadata)) {
            $riskMetadata = RiskMetadata::from($riskMetadata);
        }

        $this->fields['riskMetadata'] = $riskMetadata;

        return $this;
    }

    /**
     * @return null|array<ApprovalUrlLink|AuthTransactionLink|CustomerLink|SelfLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @return null|array{authTransaction:Transaction,customer:Customer}
     */
    public function getEmbedded(): ?array
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('stickyGatewayAccountId', $this->fields)) {
            $data['stickyGatewayAccountId'] = $this->fields['stickyGatewayAccountId'];
        }
        if (array_key_exists('expirationReminderTime', $this->fields)) {
            $data['expirationReminderTime'] = $this->fields['expirationReminderTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('expirationReminderNumber', $this->fields)) {
            $data['expirationReminderNumber'] = $this->fields['expirationReminderNumber'];
        }
        if (array_key_exists('referenceData', $this->fields)) {
            $data['referenceData'] = $this->fields['referenceData'];
        }
        if (array_key_exists('digitalWallet', $this->fields)) {
            $data['digitalWallet'] = $this->fields['digitalWallet'];
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']?->jsonSerialize();
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded'];
        }

        return parent::jsonSerialize() + $data;
    }

    private function setStickyGatewayAccountId(null|string $stickyGatewayAccountId): self
    {
        $this->fields['stickyGatewayAccountId'] = $stickyGatewayAccountId;

        return $this;
    }

    private function setExpirationReminderNumber(null|int $expirationReminderNumber): self
    {
        $this->fields['expirationReminderNumber'] = $expirationReminderNumber;

        return $this;
    }

    /**
     * @psalm-param self::DIGITAL_WALLET_*|null $digitalWallet
     */
    private function setDigitalWallet(null|string $digitalWallet): self
    {
        $this->fields['digitalWallet'] = $digitalWallet;

        return $this;
    }

    /**
     * @param null|array<ApprovalUrlLink|AuthTransactionLink|CustomerLink|SelfLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    /**
     * @param null|array{authTransaction:Transaction,customer:Customer} $embedded
     */
    private function setEmbedded(null|array $embedded): self
    {
        $embedded['authTransaction'] = isset($embedded['authTransaction']) ? ($embedded['authTransaction'] instanceof Transaction ? $embedded['authTransaction'] : Transaction::from($embedded['authTransaction'])) : null;
        $embedded['customer'] = isset($embedded['customer']) ? ($embedded['customer'] instanceof Customer ? $embedded['customer'] : Customer::from($embedded['customer'])) : null;

        $this->fields['_embedded'] = $embedded;

        return $this;
    }
}
