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

class PaymentCardCreatePlain implements PaymentInstruction, PostPaymentInstrumentRequest, JsonSerializable
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_DEACTIVATED = 'deactivated';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('pan', $data)) {
            $this->setPan($data['pan']);
        }
        if (array_key_exists('expYear', $data)) {
            $this->setExpYear($data['expYear']);
        }
        if (array_key_exists('expMonth', $data)) {
            $this->setExpMonth($data['expMonth']);
        }
        if (array_key_exists('cvv', $data)) {
            $this->setCvv($data['cvv']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
        }
        if (array_key_exists('useAsBackup', $data)) {
            $this->setUseAsBackup($data['useAsBackup']);
        }
        if (array_key_exists('receivedBy', $data)) {
            $this->setReceivedBy($data['receivedBy']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('methods', $data)) {
            $this->setMethods($data['methods']);
        }
        if (array_key_exists('paymentInstrumentId', $data)) {
            $this->setPaymentInstrumentId($data['paymentInstrumentId']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
        if (array_key_exists('reference', $data)) {
            $this->setReference($data['reference']);
        }
        if (array_key_exists('referenceData', $data)) {
            $this->setReferenceData($data['referenceData']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('stickyGatewayAccountId', $data)) {
            $this->setStickyGatewayAccountId($data['stickyGatewayAccountId']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
        if (array_key_exists('username', $data)) {
            $this->setUsername($data['username']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return 'payment-card';
    }

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getPan(): string
    {
        return $this->fields['pan'];
    }

    public function setPan(string $pan): static
    {
        $this->fields['pan'] = $pan;

        return $this;
    }

    public function getExpYear(): int
    {
        return $this->fields['expYear'];
    }

    public function setExpYear(int $expYear): static
    {
        $this->fields['expYear'] = $expYear;

        return $this;
    }

    public function getExpMonth(): int
    {
        return $this->fields['expMonth'];
    }

    public function setExpMonth(int $expMonth): static
    {
        $this->fields['expMonth'] = $expMonth;

        return $this;
    }

    public function getCvv(): ?string
    {
        return $this->fields['cvv'] ?? null;
    }

    public function setCvv(null|string $cvv): static
    {
        $this->fields['cvv'] = $cvv;

        return $this;
    }

    public function getBillingAddress(): ContactObject
    {
        return $this->fields['billingAddress'];
    }

    public function setBillingAddress(ContactObject|array $billingAddress): static
    {
        if (!($billingAddress instanceof ContactObject)) {
            $billingAddress = ContactObject::from($billingAddress);
        }

        $this->fields['billingAddress'] = $billingAddress;

        return $this;
    }

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): static
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function getRiskMetadata(): ?RiskMetadata
    {
        return $this->fields['riskMetadata'] ?? null;
    }

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): static
    {
        if ($riskMetadata !== null && !($riskMetadata instanceof RiskMetadata)) {
            $riskMetadata = RiskMetadata::from($riskMetadata);
        }

        $this->fields['riskMetadata'] = $riskMetadata;

        return $this;
    }

    public function getUseAsBackup(): ?bool
    {
        return $this->fields['useAsBackup'] ?? null;
    }

    public function setUseAsBackup(null|bool $useAsBackup): static
    {
        $this->fields['useAsBackup'] = $useAsBackup;

        return $this;
    }

    public function getReceivedBy(): ?string
    {
        return $this->fields['receivedBy'] ?? null;
    }

    public function setReceivedBy(null|string $receivedBy): static
    {
        $this->fields['receivedBy'] = $receivedBy;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getMethods(): ?array
    {
        return $this->fields['methods'] ?? null;
    }

    /**
     * @param null|string[] $methods
     */
    public function setMethods(null|array $methods): static
    {
        $methods = $methods !== null ? array_map(
            fn ($value) => $value,
            $methods,
        ) : null;

        $this->fields['methods'] = $methods;

        return $this;
    }

    public function getPaymentInstrumentId(): string
    {
        return $this->fields['paymentInstrumentId'];
    }

    public function setPaymentInstrumentId(string $paymentInstrumentId): static
    {
        $this->fields['paymentInstrumentId'] = $paymentInstrumentId;

        return $this;
    }

    public function getToken(): string
    {
        return $this->fields['token'];
    }

    public function setToken(string $token): static
    {
        $this->fields['token'] = $token;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->fields['reference'] ?? null;
    }

    public function setReference(null|string $reference): static
    {
        $this->fields['reference'] = $reference;

        return $this;
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
    public function setReferenceData(null|array $referenceData): static
    {
        $this->fields['referenceData'] = $referenceData;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getStickyGatewayAccountId(): ?string
    {
        return $this->fields['stickyGatewayAccountId'] ?? null;
    }

    public function getEmbedded(): ?BankAccountEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|BankAccountEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof BankAccountEmbedded)) {
            $embedded = BankAccountEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->fields['username'] ?? null;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'method' => 'payment-card',
        ];
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('pan', $this->fields)) {
            $data['pan'] = $this->fields['pan'];
        }
        if (array_key_exists('expYear', $this->fields)) {
            $data['expYear'] = $this->fields['expYear'];
        }
        if (array_key_exists('expMonth', $this->fields)) {
            $data['expMonth'] = $this->fields['expMonth'];
        }
        if (array_key_exists('cvv', $this->fields)) {
            $data['cvv'] = $this->fields['cvv'];
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']?->jsonSerialize();
        }
        if (array_key_exists('useAsBackup', $this->fields)) {
            $data['useAsBackup'] = $this->fields['useAsBackup'];
        }
        if (array_key_exists('receivedBy', $this->fields)) {
            $data['receivedBy'] = $this->fields['receivedBy'];
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('methods', $this->fields)) {
            $data['methods'] = $this->fields['methods'];
        }
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }
        if (array_key_exists('reference', $this->fields)) {
            $data['reference'] = $this->fields['reference'];
        }
        if (array_key_exists('referenceData', $this->fields)) {
            $data['referenceData'] = $this->fields['referenceData'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('stickyGatewayAccountId', $this->fields)) {
            $data['stickyGatewayAccountId'] = $this->fields['stickyGatewayAccountId'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }
        if (array_key_exists('username', $this->fields)) {
            $data['username'] = $this->fields['username'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }

        return $data;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

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

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setStickyGatewayAccountId(null|string $stickyGatewayAccountId): static
    {
        $this->fields['stickyGatewayAccountId'] = $stickyGatewayAccountId;

        return $this;
    }

    private function setUsername(null|string $username): static
    {
        $this->fields['username'] = $username;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }
}
