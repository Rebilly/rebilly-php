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

class WesternUnionCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('clientId', $data)) {
            $this->setClientId($data['clientId']);
        }
        if (array_key_exists('certificateCommonName', $data)) {
            $this->setCertificateCommonName($data['certificateCommonName']);
        }
        if (array_key_exists('certificateSerialNumber', $data)) {
            $this->setCertificateSerialNumber($data['certificateSerialNumber']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getClientId(): string
    {
        return $this->fields['clientId'];
    }

    public function setClientId(string $clientId): static
    {
        $this->fields['clientId'] = $clientId;

        return $this;
    }

    public function getCertificateCommonName(): string
    {
        return $this->fields['certificateCommonName'];
    }

    public function setCertificateCommonName(string $certificateCommonName): static
    {
        $this->fields['certificateCommonName'] = $certificateCommonName;

        return $this;
    }

    public function getCertificateSerialNumber(): string
    {
        return $this->fields['certificateSerialNumber'];
    }

    public function setCertificateSerialNumber(string $certificateSerialNumber): static
    {
        $this->fields['certificateSerialNumber'] = $certificateSerialNumber;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('clientId', $this->fields)) {
            $data['clientId'] = $this->fields['clientId'];
        }
        if (array_key_exists('certificateCommonName', $this->fields)) {
            $data['certificateCommonName'] = $this->fields['certificateCommonName'];
        }
        if (array_key_exists('certificateSerialNumber', $this->fields)) {
            $data['certificateSerialNumber'] = $this->fields['certificateSerialNumber'];
        }

        return $data;
    }
}
