<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Api;

use Rebilly\Client;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Resource\Entity;
use Rebilly\Resource\Collection;

/**
 * Class ScheduledPayment.
 *
 * ```json
 * {
 *   "id": 'string',
 *   "createdTime": 'datetime',
 *   "updatedTime": 'datetime',
 *   "state": 'enum',
 *   "payment": {
 *     "website": 'string',
 *     "customer": 'string',
 *     "amount": 'float',
 *     "currency": 'currency',
 *     "method": 'enum',
 *     "paymentInstrument": {
 *       ""
 *     },
 *     "description": 'string'
 *   }
 * }
 * ```
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class ScheduledPayment extends Entity
{
    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->getAttribute('state');
    }

    /**
     * @return array
     */
    public function getPayment()
    {
        return $this->getAttribute('payment');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setPayment($value)
    {
        return $this->setAttribute('payment', (array) $value);
    }

    /**
     * @return string
     */
    public function isApprovalRequired()
    {
        return $this->getAttribute('state') === 'suspended' && $this->getLink('approval_link') !== null;
    }

    /**
     * @return string
     */
    public function getApprovalLink()
    {
        return $this->getLink('approval_link');
    }

    /********************************************************************************
     * Scheduled Payment API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @return ScheduledPayment[]|Collection
     */
    public static function search()
    {
        return Client::get('queue/payments');
    }

    /**
     * Facade for client command
     *
     * @param string $paymentId
     *
     * @return ScheduledPayment
     */
    public static function exist($paymentId)
    {
        try {
            Client::head('queue/payments/{paymentId}', ['paymentId' => $paymentId]);

            return true;
        } catch (NotFoundException $e) {
            return false;
        }
    }

    /**
     * Facade for client command
     *
     * @param string $paymentId
     *
     * @return ScheduledPayment
     */
    public static function load($paymentId)
    {
        return Client::get('queue/payments/{paymentId}', ['paymentId' => $paymentId]);
    }
}
