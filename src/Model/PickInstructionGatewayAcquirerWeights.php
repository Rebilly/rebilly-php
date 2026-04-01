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

use Rebilly\Sdk\Trait\HasMetadata;

class PickInstructionGatewayAcquirerWeights extends GatewayAccountPickInstruction
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        parent::__construct([
            'method' => 'gateway-acquirer-weights',
        ] + $data, $metadata);

        if (array_key_exists('weightedList', $data)) {
            $this->setWeightedList($data['weightedList']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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
            $data['weightedList'] = array_map(
                static fn (PickInstructionGatewayAcquirerWeightsWeightedList $pickInstructionGatewayAcquirerWeightsWeightedList) => $pickInstructionGatewayAcquirerWeightsWeightedList->jsonSerialize(),
                $this->fields['weightedList'],
            );
        }

        return parent::jsonSerialize() + $data;
    }
}
