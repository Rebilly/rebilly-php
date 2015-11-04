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
 * Class ScheduledPayment.
 *
 * ```json
 * {
 *   "id": 'string',
 *   "createdTime": 'datetime',
 *   "updatedTime": 'datetime',
 *   "status": 'enum',
 *   "result": 'enum',
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
 * @todo To be consistent we should rename `approval_link` to `approvalLink`
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class ScheduledPayment extends Entity
{
    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @deprecated
     * @return string
     */
    public function getState()
    {
        return $this->getAttribute('state');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->getAttribute('result');
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
     * @return bool
     */
    public function isApprovalRequired()
    {
        return $this->getStatus() === 'suspended' && $this->getApprovalLink() !== null;
    }

    /**
     * @return string
     */
    public function getApprovalLink()
    {
        return $this->getLink('approval_url');
    }
}
