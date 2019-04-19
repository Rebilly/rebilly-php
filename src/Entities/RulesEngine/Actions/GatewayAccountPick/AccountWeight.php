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

use Rebilly\Rest\Resource;

/**
 * Class AccountWeight.
 */
class AccountWeight extends Resource
{
    /**
     * @param array $data
     *
     * @return AccountWeight
     */
    public static function createFromData(array $data): self
    {
        return new self($data);
    }

    /**
     * @return string
     */
    public function getGatewayAccountId(): string
    {
        return $this->getAttribute('gatewayAccountId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setGatewayAccountId($value): self
    {
        return $this->setAttribute('gatewayAccountId', $value);
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->getAttribute('weight');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setWeight($value): self
    {
        return $this->setAttribute('weight', $value);
    }
}
