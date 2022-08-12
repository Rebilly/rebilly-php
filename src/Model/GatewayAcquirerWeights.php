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

class GatewayAcquirerWeights extends GatewayAccountPickInstruction
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
     * @return \Rebilly\Sdk\Model\GatewayWeightedList[]
     */
    public function getWeightedList(): array
    {
        return $this->fields['weightedList'];
    }

    /**
     * @param \Rebilly\Sdk\Model\GatewayWeightedList[] $weightedList
     */
    public function setWeightedList(array $weightedList): self
    {
        $weightedList = array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\GatewayWeightedList ? $value : \Rebilly\Sdk\Model\GatewayWeightedList::from($value)) : null, $weightedList);

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
