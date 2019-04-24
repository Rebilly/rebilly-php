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

namespace Rebilly\Entities\RulesEngine\Actions\GatewayAccountPick;

/**
 * Class AcquirerWeights.
 */
class AcquirerWeights extends Instruction
{
    /**
     * @param array $data
     *
     * @return AcquirerWeights|Instruction
     */
    public static function createFromData(array $data): Instruction
    {
        return new self($data);
    }

    /**
     * @return AcquirerWeight[]|array
     */
    public function getWeightedList(): array
    {
        return $this->getAttribute('weightedList');
    }

    /**
     * @param AcquirerWeight[]|array $value
     *
     * @return $this
     */
    public function setWeightedList($value): self
    {
        return $this->setAttribute('weightedList', $value);
    }

    /**
     * @param array $value
     *
     * @return array
     */
    public function createWeightedList($value): array
    {
        return array_map(function ($data) {
            if ($data instanceof AcquirerWeight) {
                return $data;
            }

            return AcquirerWeight::createFromData((array) $data);
        }, $value);
    }

    /**
     * @inheritdoc
     */
    public function methodName(): string
    {
        return self::METHOD_ACQUIRER_WEIGHTS;
    }
}
