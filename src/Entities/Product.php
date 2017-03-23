<?php

namespace Rebilly\Entities;

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
