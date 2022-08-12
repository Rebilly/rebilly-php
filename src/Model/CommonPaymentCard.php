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

abstract class CommonPaymentCard extends PaymentInstrument
{
    public const METHOD_PAYMENT_CARD = 'payment-card';

    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const STATUS_EXPIRED = 'expired';

    public const STATUS_DEACTIVATED = 'deactivated';

    public const STATUS_VERIFICATION_NEEDED = 'verification-needed';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('fingerprint', $data)) {
            $this->setFingerprint($data['fingerprint']);
        }
        if (array_key_exists('bin', $data)) {
            $this->setBin($data['bin']);
        }
        if (array_key_exists('last4', $data)) {
            $this->setLast4($data['last4']);
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
        if (array_key_exists('brand', $data)) {
            $this->setBrand($data['brand']);
        }
        if (array_key_exists('bankCountry', $data)) {
            $this->setBankCountry($data['bankCountry']);
        }
        if (array_key_exists('bankName', $data)) {
            $this->setBankName($data['bankName']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('useAsBackup', $data)) {
            $this->setUseAsBackup($data['useAsBackup']);
        }
        if (array_key_exists('billingPortalUrl', $data)) {
            $this->setBillingPortalUrl($data['billingPortalUrl']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    /**
     * @psalm-return self::METHOD_*|null $method
     */
    public function getMethod(): ?string
    {
        return $this->fields['method'] ?? null;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    public function setStatus(null|string $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function getFingerprint(): ?string
    {
        return $this->fields['fingerprint'] ?? null;
    }

    public function getBin(): ?string
    {
        return $this->fields['bin'] ?? null;
    }

    public function getLast4(): ?string
    {
        return $this->fields['last4'] ?? null;
    }

    public function getPan(): ?string
    {
        return $this->fields['pan'] ?? null;
    }

    public function setPan(null|string $pan): self
    {
        $this->fields['pan'] = $pan;

        return $this;
    }

    public function getExpYear(): ?int
    {
        return $this->fields['expYear'] ?? null;
    }

    public function setExpYear(null|int $expYear): self
    {
        $this->fields['expYear'] = $expYear;

        return $this;
    }

    public function getExpMonth(): ?int
    {
        return $this->fields['expMonth'] ?? null;
    }

    public function setExpMonth(null|int $expMonth): self
    {
        $this->fields['expMonth'] = $expMonth;

        return $this;
    }

    public function getCvv(): ?string
    {
        return $this->fields['cvv'] ?? null;
    }

    public function setCvv(null|string $cvv): self
    {
        $this->fields['cvv'] = $cvv;

        return $this;
    }

    public function getBrand(): ?PaymentCardBrand
    {
        return $this->fields['brand'] ?? null;
    }

    public function getBankCountry(): ?string
    {
        return $this->fields['bankCountry'] ?? null;
    }

    public function getBankName(): ?string
    {
        return $this->fields['bankName'] ?? null;
    }

    public function getBillingAddress(): ?ContactObject
    {
        return $this->fields['billingAddress'] ?? null;
    }

    public function setBillingAddress(null|ContactObject|array $billingAddress): self
    {
        if ($billingAddress !== null && !($billingAddress instanceof ContactObject)) {
            $billingAddress = ContactObject::from($billingAddress);
        }

        $this->fields['billingAddress'] = $billingAddress;

        return $this;
    }

    public function getUseAsBackup(): ?bool
    {
        return $this->fields['useAsBackup'] ?? null;
    }

    public function setUseAsBackup(null|bool $useAsBackup): self
    {
        $this->fields['useAsBackup'] = $useAsBackup;

        return $this;
    }

    public function getBillingPortalUrl(): ?string
    {
        return $this->fields['billingPortalUrl'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): self
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('fingerprint', $this->fields)) {
            $data['fingerprint'] = $this->fields['fingerprint'];
        }
        if (array_key_exists('bin', $this->fields)) {
            $data['bin'] = $this->fields['bin'];
        }
        if (array_key_exists('last4', $this->fields)) {
            $data['last4'] = $this->fields['last4'];
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
        if (array_key_exists('brand', $this->fields)) {
            $data['brand'] = $this->fields['brand']?->value;
        }
        if (array_key_exists('bankCountry', $this->fields)) {
            $data['bankCountry'] = $this->fields['bankCountry'];
        }
        if (array_key_exists('bankName', $this->fields)) {
            $data['bankName'] = $this->fields['bankName'];
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('useAsBackup', $this->fields)) {
            $data['useAsBackup'] = $this->fields['useAsBackup'];
        }
        if (array_key_exists('billingPortalUrl', $this->fields)) {
            $data['billingPortalUrl'] = $this->fields['billingPortalUrl'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }

        return parent::jsonSerialize() + $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @psalm-param self::METHOD_*|null $method
     */
    private function setMethod(null|string $method): self
    {
        $this->fields['method'] = $method;

        return $this;
    }

    private function setFingerprint(null|string $fingerprint): self
    {
        $this->fields['fingerprint'] = $fingerprint;

        return $this;
    }

    private function setBin(null|string $bin): self
    {
        $this->fields['bin'] = $bin;

        return $this;
    }

    private function setLast4(null|string $last4): self
    {
        $this->fields['last4'] = $last4;

        return $this;
    }

    private function setBrand(null|PaymentCardBrand|string $brand): self
    {
        if ($brand !== null && !($brand instanceof PaymentCardBrand)) {
            $brand = PaymentCardBrand::from($brand);
        }

        $this->fields['brand'] = $brand;

        return $this;
    }

    private function setBankCountry(null|string $bankCountry): self
    {
        $this->fields['bankCountry'] = $bankCountry;

        return $this;
    }

    private function setBankName(null|string $bankName): self
    {
        $this->fields['bankName'] = $bankName;

        return $this;
    }

    private function setBillingPortalUrl(null|string $billingPortalUrl): self
    {
        $this->fields['billingPortalUrl'] = $billingPortalUrl;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }
}
