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

class CreateInfusionsoftOrder extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'create-keap-infusionsoft-order',
        ] + $data);

        if (array_key_exists('contactBody', $data)) {
            $this->setContactBody($data['contactBody']);
        }
        if (array_key_exists('orderBody', $data)) {
            $this->setOrderBody($data['orderBody']);
        }
        if (array_key_exists('credentialHash', $data)) {
            $this->setCredentialHash($data['credentialHash']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getContactBody(): CreateContactBody
    {
        return $this->fields['contactBody'];
    }

    public function setContactBody(CreateContactBody|array $contactBody): self
    {
        if (!($contactBody instanceof CreateContactBody)) {
            $contactBody = CreateContactBody::from($contactBody);
        }

        $this->fields['contactBody'] = $contactBody;

        return $this;
    }

    public function getOrderBody(): CreateOrderBody
    {
        return $this->fields['orderBody'];
    }

    public function setOrderBody(CreateOrderBody|array $orderBody): self
    {
        if (!($orderBody instanceof CreateOrderBody)) {
            $orderBody = CreateOrderBody::from($orderBody);
        }

        $this->fields['orderBody'] = $orderBody;

        return $this;
    }

    public function getCredentialHash(): string
    {
        return $this->fields['credentialHash'];
    }

    public function setCredentialHash(string $credentialHash): self
    {
        $this->fields['credentialHash'] = $credentialHash;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('contactBody', $this->fields)) {
            $data['contactBody'] = $this->fields['contactBody']?->jsonSerialize();
        }
        if (array_key_exists('orderBody', $this->fields)) {
            $data['orderBody'] = $this->fields['orderBody']?->jsonSerialize();
        }
        if (array_key_exists('credentialHash', $this->fields)) {
            $data['credentialHash'] = $this->fields['credentialHash'];
        }

        return parent::jsonSerialize() + $data;
    }
}
