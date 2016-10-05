<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class PaymentCardMigrationsRequest
 *
 * ```json
 * {
 *   fromGatewayAccountId: "string"
 *   toGatewayAccountId: "string"
 *   paymentCardIds: []
 * }
 * ```
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
     * @return string
     */
    public function getPaymentCardIds()
    {
        return $this->getAttribute('paymentCardIds');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPaymentCardIds($value)
    {
        return $this->setAttribute('paymentCardIds', $value);
    }
}
