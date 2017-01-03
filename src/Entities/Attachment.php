<?php
/**
 * This attachment is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * attachment that was distributed with this source code.
 */

namespace Rebilly\Entities;

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class Attachment
 *
 * ```json
 * {
 *   "id"
 *   "fileId"
 *   "relatedType"
 *   "relatedId"
 *   "name"
 *   "description"
 *   "createdTime"
 *   "updatedTime"
 * }
 * ```
 */
final class Attachment extends Entity
{
    const MSG_UNEXPECTED_TYPE = 'Unexpected relatedType. Only %s types are supported.';

    const TYPE_CUSTOMER = 'customer';
    const TYPE_DISPUTE = 'dispute';
    const TYPE_INVOICE = 'invoice';
    const TYPE_NOTE = 'note';
    const TYPE_PAYMENT = 'payment';
    const TYPE_PLAN = 'plan';
    const TYPE_PRODUCT = 'product';
    const TYPE_SUBSCRIPTION = 'subscription';
    const TYPE_TRANSACTION = 'transaction';

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
        if (!in_array($value, self::allowedTypes())) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_TYPE, implode(', ', self::allowedTypes())));
        }

        return $this->setAttribute('relatedType', $value);
    }
}
