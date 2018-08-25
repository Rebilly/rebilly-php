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
 * Class Product
 *
 * ```json
 * {
 *   "id"
 *   "name"
 *   "description"
 *   "taxCategoryId"
 *   "requiresShipping"
 *   "accountingCode"
 *   "customFields"
 *   "createdTime"
 *   "updatedTime"
 * }
 * ```
 */
final class Product extends Entity
{
    public const MSG_UNEXPECTED_TAX_CATEGORY = 'Unexpected taxCategoryId. Only %s categories are supported.';

    /**
     * @return array
     */
    public static function allowedTaxCategories()
    {
        return [
            '99999',
            '20010',
            '40030',
            '51020',
            '51010',
            '31000',
            '30070',
            null,
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
    public function getTaxCategoryId()
    {
        return $this->getAttribute('taxCategoryId');
    }

    /**
     * @param string|null $value
     *
     * @return $this
     */
    public function setTaxCategoryId($value)
    {
        if (!in_array($value, self::allowedTaxCategories(), true)) {
            throw new DomainException(sprintf(
                self::MSG_UNEXPECTED_TAX_CATEGORY,
                implode(', ', self::allowedTaxCategories())
            ));
        }

        return $this->setAttribute('taxCategoryId', $value);
    }

    /**
     * @return bool
     */
    public function getRequiresShipping()
    {
        return $this->getAttribute('requiresShipping');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setRequiresShipping($value)
    {
        return $this->setAttribute('requiresShipping', $value);
    }

    /**
     * @return string
     */
    public function getAccountingCode()
    {
        return $this->getAttribute('accountingCode');
    }

    /**
     * @param string|null $value
     *
     * @return $this
     */
    public function setAccountingCode($value)
    {
        return $this->setAttribute('accountingCode', $value);
    }

    /**
     * @return array
     */
    public function getCustomFields()
    {
        return $this->getAttribute('customFields');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setCustomFields($value)
    {
        return $this->setAttribute('customFields', $value);
    }
}
