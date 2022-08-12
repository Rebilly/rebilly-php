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

class WorldlineAtosFrankfurtCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('cardAcceptorIdCode', $data)) {
            $this->setCardAcceptorIdCode($data['cardAcceptorIdCode']);
        }
        if (array_key_exists('acquiringInstitutionIdentificationCode', $data)) {
            $this->setAcquiringInstitutionIdentificationCode($data['acquiringInstitutionIdentificationCode']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCardAcceptorIdCode(): string
    {
        return $this->fields['cardAcceptorIdCode'];
    }

    public function setCardAcceptorIdCode(string $cardAcceptorIdCode): self
    {
        $this->fields['cardAcceptorIdCode'] = $cardAcceptorIdCode;

        return $this;
    }

    public function getAcquiringInstitutionIdentificationCode(): string
    {
        return $this->fields['acquiringInstitutionIdentificationCode'];
    }

    public function setAcquiringInstitutionIdentificationCode(string $acquiringInstitutionIdentificationCode): self
    {
        $this->fields['acquiringInstitutionIdentificationCode'] = $acquiringInstitutionIdentificationCode;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('cardAcceptorIdCode', $this->fields)) {
            $data['cardAcceptorIdCode'] = $this->fields['cardAcceptorIdCode'];
        }
        if (array_key_exists('acquiringInstitutionIdentificationCode', $this->fields)) {
            $data['acquiringInstitutionIdentificationCode'] = $this->fields['acquiringInstitutionIdentificationCode'];
        }

        return $data;
    }
}
