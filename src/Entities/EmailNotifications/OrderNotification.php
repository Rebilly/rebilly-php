<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2018 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\EmailNotifications;

use Rebilly\Rest\Entity;

/**
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class OrderNotification extends Entity
{
    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->getAttribute('eventType');
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->getAttribute('subject');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSubject($value)
    {
        return $this->setAttribute('subject', $value);
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->getAttribute('body');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBody($value)
    {
        return $this->setAttribute('body', $value);
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setStatus($value)
    {
        return $this->setAttribute('status', $value);
    }

    /**
     * @return array
     */
    public function getReceiverEmails()
    {
        return $this->getAttribute('receiverEmails');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setReceiverEmails($value)
    {
        return $this->setAttribute('receiverEmails', $value);
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
