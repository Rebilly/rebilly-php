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

use Rebilly\Rest\Entity;

/**
 * Class SubscriptionTracking
 *
 * ```json
 * {
 *   "id"
 *   "subscriptionId"
 *   "invoiceItemId"
 *   "result"
 *   "message"
 *   "createdTime"
 * }
 * ```
 *
 */
final class SubscriptionTracking extends Entity
{
    /**
     * @return string;
     */
    public function getSubscriptionId()
    {
        return $this->getAttribute('subscriptionId');
    }

    /**
     * @return string
     */
    public function getInvoiceItemId()
    {
        return $this->getAttribute('invoiceItemId');
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->getAttribute('result');
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->getAttribute('message');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
