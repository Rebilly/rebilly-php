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

class ReadyToPayMethods implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('readyToPayMethods', $data)) {
            $this->setReadyToPayMethods($data['readyToPayMethods']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getReadyToPayMethods(): ?AnyOfReadyToPayPaymentCardMethodReadyToPayAchMethodReadyToPayGenericMethodReadyToPayPayPalMethodReadyToPayKlarnaMethod
    {
        return $this->fields['readyToPayMethods'] ?? null;
    }

    public function setReadyToPayMethods(null|AnyOfReadyToPayPaymentCardMethodReadyToPayAchMethodReadyToPayGenericMethodReadyToPayPayPalMethodReadyToPayKlarnaMethod|array $readyToPayMethods): self
    {
        $this->fields['readyToPayMethods'] = $readyToPayMethods;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('readyToPayMethods', $this->fields)) {
            $data['readyToPayMethods'] = $this->fields['readyToPayMethods'];
        }

        return $data;
    }
}
