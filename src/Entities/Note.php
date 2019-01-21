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

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class Note.
 *
 * @deprecated see Timeline Comments instead.
 */
final class Note extends Entity
{
    public const MSG_UNEXPECTED_TYPE = 'Unexpected type. Only %s types support';

    /**
     * @return array
     */
    public static function relatedTypes()
    {
        return [
            ResourceType::TYPE_CUSTOMER,
            ResourceType::TYPE_WEBSITE,
            ResourceType::TYPE_PAYMENT_CARD,
            ResourceType::TYPE_PAYMENT_GATEWAY,
            ResourceType::TYPE_SUBSCRIPTION,
            ResourceType::TYPE_TRANSACTION,
        ];
    }

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
    public function getArchivedTime()
    {
        return $this->getAttribute('archivedTime');
    }

    /**
     * @return string
     */
    public function getRelatedType()
    {
        return $this->getAttribute('relatedType');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRelatedType($value)
    {
        if (!in_array($value, self::relatedTypes(), true)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_TYPE, implode(', ', self::relatedTypes())));
        }

        return $this->setAttribute('relatedType', $value);
    }

    /**
     * @return string
     */
    public function getRelatedId()
    {
        return $this->getAttribute('relatedId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRelatedId($value)
    {
        return $this->setAttribute('relatedId', $value);
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->getAttribute('content');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setContent($value)
    {
        return $this->setAttribute('content', $value);
    }

    /**
     * @return bool
     */
    public function getArchived()
    {
        return $this->getAttribute('archived');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setArchived($value)
    {
        return $this->setAttribute('archived', $value);
    }

    /**
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->getAttribute('createdBy');
    }
}
