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

class CheckoutComSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('markAsWaitingGatewayOnPendingPayout', $data)) {
            $this->setMarkAsWaitingGatewayOnPendingPayout($data['markAsWaitingGatewayOnPendingPayout']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMarkAsWaitingGatewayOnPendingPayout(): ?bool
    {
        return $this->fields['markAsWaitingGatewayOnPendingPayout'] ?? null;
    }

    public function setMarkAsWaitingGatewayOnPendingPayout(null|bool $markAsWaitingGatewayOnPendingPayout): self
    {
        $this->fields['markAsWaitingGatewayOnPendingPayout'] = $markAsWaitingGatewayOnPendingPayout;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('markAsWaitingGatewayOnPendingPayout', $this->fields)) {
            $data['markAsWaitingGatewayOnPendingPayout'] = $this->fields['markAsWaitingGatewayOnPendingPayout'];
        }

        return $data;
    }
}
