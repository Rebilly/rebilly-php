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

class PickInstructionGatewayAccountWeights extends GatewayAccountPickInstruction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'method' => 'gateway-account-weights',
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
     * @return PickInstructionGatewayAccountWeightsWeightedList[]
     */
    public function getWeightedList(): array
    {
        return $this->fields['weightedList'];
    }

    /**
     * @param array[]|PickInstructionGatewayAccountWeightsWeightedList[] $weightedList
     */
    public function setWeightedList(array $weightedList): static
    {
        $weightedList = array_map(
            fn ($value) => $value !== null ? ($value instanceof PickInstructionGatewayAccountWeightsWeightedList ? $value : PickInstructionGatewayAccountWeightsWeightedList::from($value)) : null,
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
