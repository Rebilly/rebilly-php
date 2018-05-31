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

use DomainException;
use Rebilly\Rest\Entity;

/**
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class EmailNotification extends Entity
{
    const MSG_UNEXPECTED_NOTIFICATIONS = 'Unexpected notifications type, it must be an array of Notification';
    const MSG_UNEXPECTED_TAGS = 'Unexpected tags, it must be an array of strings';

    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->getAttribute('eventType');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEventType($value)
    {
        return $this->setAttribute('eventType', $value);
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
    public function getBodyText()
    {
        return $this->getAttribute('bodyText');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBodyText($value)
    {
        return $this->setAttribute('bodyText', $value);
    }

    /**
     * @return string
     */
    public function getBodyHtml()
    {
        return $this->getAttribute('bodyHtml');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBodyHtml($value)
    {
        return $this->setAttribute('bodyHtml', $value);
    }

    /**
     * @return bool
     */
    public function getAttachInvoice()
    {
        return $this->getAttribute('attachInvoice');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setAttachInvoice($value)
    {
        return $this->setAttribute('attachInvoice', $value);
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
    public function getNotifications()
    {
        return $this->getAttribute('notifications');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setNotifications($value)
    {
        if (!is_array($value)) {
            throw new DomainException(self::MSG_UNEXPECTED_NOTIFICATIONS);
        }

        return $this->setAttribute('notifications', $value);
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->getAttribute('tags');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setTags($value)
    {
        if (!is_array($value)) {
            throw new DomainException(self::MSG_UNEXPECTED_TAGS);
        }

        return $this->setAttribute('tags', $value);
    }
}
