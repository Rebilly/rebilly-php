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
 * Class SubscriptionLog
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
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class SubscriptionLog extends Entity
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
