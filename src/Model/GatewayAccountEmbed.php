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

class GatewayAccountEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('gatewayAccount', $data)) {
            $this->setGatewayAccount($data['gatewayAccount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getGatewayAccount(): ?GatewayAccount
    {
        return $this->fields['gatewayAccount'] ?? null;
    }

    public function setGatewayAccount(null|GatewayAccount|array $gatewayAccount): self
    {
        if ($gatewayAccount !== null && !($gatewayAccount instanceof \Rebilly\Sdk\Model\GatewayAccount)) {
            $gatewayAccount = \Rebilly\Sdk\Model\GatewayAccount::from($gatewayAccount);
        }

        $this->fields['gatewayAccount'] = $gatewayAccount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('gatewayAccount', $this->fields)) {
            $data['gatewayAccount'] = $this->fields['gatewayAccount']?->jsonSerialize();
        }

        return $data;
    }
}
