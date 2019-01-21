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

namespace Rebilly\Entities;

use Rebilly\Rest\Resource;

/**
 * Class PaymentCardMigrationsRequest.
 */
final class PaymentCardMigrationsRequest extends Resource
{
    /**
     * @return string
     */
    public function getFromGatewayAccountId()
    {
        return $this->getAttribute('fromGatewayAccountId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setFromGatewayAccountId($value)
    {
        return $this->setAttribute('fromGatewayAccountId', $value);
    }

    /**
     * @return string
     */
    public function getToGatewayAccountId()
    {
        return $this->getAttribute('toGatewayAccountId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setToGatewayAccountId($value)
    {
        return $this->setAttribute('toGatewayAccountId', $value);
    }

    /**
     * @return array
     */
    public function getPaymentCardIds()
    {
        return $this->getAttribute('paymentCardIds');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setPaymentCardIds($value)
    {
        return $this->setAttribute('paymentCardIds', $value);
    }
}
