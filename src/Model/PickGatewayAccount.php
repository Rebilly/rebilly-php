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

class PickGatewayAccount extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'pick-gateway-account',
        ] + $data);

        if (array_key_exists('pickInstruction', $data)) {
            $this->setPickInstruction($data['pickInstruction']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPickInstruction(): GatewayAccountPickInstruction
    {
        return $this->fields['pickInstruction'];
    }

    public function setPickInstruction(GatewayAccountPickInstruction|array $pickInstruction): static
    {
        if (!($pickInstruction instanceof GatewayAccountPickInstruction)) {
            $pickInstruction = GatewayAccountPickInstruction::from($pickInstruction);
        }

        $this->fields['pickInstruction'] = $pickInstruction;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('pickInstruction', $this->fields)) {
            $data['pickInstruction'] = $this->fields['pickInstruction']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
