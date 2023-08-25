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

class RuleActionCreateInfusionsoftPayment extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'create-keap-infusionsoft-payment',
        ] + $data);

        if (array_key_exists('paymentBody', $data)) {
            $this->setPaymentBody($data['paymentBody']);
        }
        if (array_key_exists('credentialHash', $data)) {
            $this->setCredentialHash($data['credentialHash']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPaymentBody(): ?object
    {
        return $this->fields['paymentBody'] ?? null;
    }

    public function setPaymentBody(null|object $paymentBody): static
    {
        $this->fields['paymentBody'] = $paymentBody;

        return $this;
    }

    public function getCredentialHash(): string
    {
        return $this->fields['credentialHash'];
    }

    public function setCredentialHash(string $credentialHash): static
    {
        $this->fields['credentialHash'] = $credentialHash;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paymentBody', $this->fields)) {
            $data['paymentBody'] = $this->fields['paymentBody'];
        }
        if (array_key_exists('credentialHash', $this->fields)) {
            $data['credentialHash'] = $this->fields['credentialHash'];
        }

        return parent::jsonSerialize() + $data;
    }
}
