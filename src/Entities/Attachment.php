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
 * Class Attachment.
 */
final class Attachment extends Entity
{
    public const MSG_UNEXPECTED_TYPE = 'Unexpected relatedType. Only %s types are supported.';

    public const TYPE_CUSTOMER = 'customer';

    public const TYPE_DISPUTE = 'dispute';

    public const TYPE_INVOICE = 'invoice';

    public const TYPE_NOTE = 'note';

    public const TYPE_PAYMENT = 'payment';

    public const TYPE_PLAN = 'plan';

    public const TYPE_PRODUCT = 'product';

    public const TYPE_SUBSCRIPTION = 'subscription';

    public const TYPE_TRANSACTION = 'transaction';

    /**
     * @return array
     */
    public static function allowedTypes()
    {
        return [
            self::TYPE_CUSTOMER,
            self::TYPE_DISPUTE,
            self::TYPE_INVOICE,
            self::TYPE_NOTE,
            self::TYPE_PAYMENT,
            self::TYPE_PLAN,
            self::TYPE_PRODUCT,
            self::TYPE_SUBSCRIPTION,
            self::TYPE_TRANSACTION,
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
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setName($value)
    {
        return $this->setAttribute('name', $value);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return string
     */
    public function getFileId()
    {
        return $this->getAttribute('fileId');
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setFileId($value)
    {
        return $this->setAttribute('fileId', $value);
    }

    /**
     * @return string
     */
    public function getRelatedId()
    {
        return $this->getAttribute('relatedId');
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setRelatedId($value)
    {
        return $this->setAttribute('relatedId', $value);
    }

    /**
     * @return string
     */
    public function getRelatedType()
    {
        return $this->getAttribute('relatedType');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setRelatedType($value)
    {
        if (!in_array($value, self::allowedTypes(), true)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_TYPE, implode(', ', self::allowedTypes())));
        }

        return $this->setAttribute('relatedType', $value);
    }
}
