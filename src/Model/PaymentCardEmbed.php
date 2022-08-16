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

class PaymentCardEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('paymentCard', $data)) {
            $this->setPaymentCard($data['paymentCard']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPaymentCard(): ?PaymentCard
    {
        return $this->fields['paymentCard'] ?? null;
    }

    public function setPaymentCard(null|PaymentCard|array $paymentCard): self
    {
        if ($paymentCard !== null && !($paymentCard instanceof PaymentCard)) {
            $paymentCard = PaymentCard::from($paymentCard);
        }

        $this->fields['paymentCard'] = $paymentCard;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paymentCard', $this->fields)) {
            $data['paymentCard'] = $this->fields['paymentCard']?->jsonSerialize();
        }

        return $data;
    }
}
