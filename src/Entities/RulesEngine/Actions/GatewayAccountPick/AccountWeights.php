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
 * Class AccountWeights.
 */
class AccountWeights extends Instruction
{
    /**
     * @param array $data
     *
     * @return AccountWeights|Instruction
     */
    public static function createFromData(array $data): Instruction
    {
        return new self($data);
    }

    /**
     * @return AccountWeight[]|array
     */
    public function getWeightedList(): array
    {
        return $this->getAttribute('weightedList');
    }

    /**
     * @param AccountWeight[]|array $value
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
     * @return $this
     */
    public function createWeightedList($value): self
    {
        return array_map(function ($data) {
            return AccountWeight::createFromData($data);
        }, $value);
    }

    /**
     * @inheritdoc
     */
    public function methodName(): string
    {
        return self::METHOD_ACCOUNT_WEIGHTS;
    }
}
