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
 * Class AcquirerWeight.
 */
class AcquirerWeight extends Resource
{
    /**
     * @param array $data
     *
     * @return AcquirerWeight
     */
    public static function createFromData(array $data): self
    {
        return new self($data);
    }

    /**
     * @return string
     */
    public function getGatewayName(): string
    {
        return $this->getAttribute('gatewayName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setGatewayName($value): self
    {
        return $this->setAttribute('gatewayName', $value);
    }

    /**
     * @return string
     */
    public function getAcquirerName(): string
    {
        return $this->getAttribute('acquirerName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAcquirerName($value): self
    {
        return $this->setAttribute('acquirerName', $value);
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
