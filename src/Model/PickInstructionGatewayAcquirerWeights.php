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

class PickInstructionGatewayAcquirerWeights extends GatewayAccountPickInstruction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'method' => 'gateway-acquirer-weights',
        ] + $data);

        if (array_key_exists('weightedList', $data)) {
            $this->setWeightedList($data['weightedList']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return PickInstructionGatewayAcquirerWeightsWeightedList[]
     */
    public function getWeightedList(): array
    {
        return $this->fields['weightedList'];
    }

    /**
     * @param array[]|PickInstructionGatewayAcquirerWeightsWeightedList[] $weightedList
     */
    public function setWeightedList(array $weightedList): static
    {
        $weightedList = array_map(
            fn ($value) => $value instanceof PickInstructionGatewayAcquirerWeightsWeightedList ? $value : PickInstructionGatewayAcquirerWeightsWeightedList::from($value),
            $weightedList,
        );

        $this->fields['weightedList'] = $weightedList;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('weightedList', $this->fields)) {
            $data['weightedList'] = $this->fields['weightedList'];
        }

        return parent::jsonSerialize() + $data;
    }
}
