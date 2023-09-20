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

class Wallet88Settings implements JsonSerializable
{
    public const PAYMENT_CARD_METHOD_CREDITCARD = 'creditcard';

    public const PAYMENT_CARD_METHOD_MASTERCARD = 'mastercard';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('paymentCardMethod', $data)) {
            $this->setPaymentCardMethod($data['paymentCardMethod']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPaymentCardMethod(): ?string
    {
        return $this->fields['paymentCardMethod'] ?? null;
    }

    public function setPaymentCardMethod(null|string $paymentCardMethod): static
    {
        $this->fields['paymentCardMethod'] = $paymentCardMethod;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paymentCardMethod', $this->fields)) {
            $data['paymentCardMethod'] = $this->fields['paymentCardMethod'];
        }

        return $data;
    }
}
