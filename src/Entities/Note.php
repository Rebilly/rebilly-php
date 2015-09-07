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

use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Rest\Entity;

/**
 * Class Note
 *
 * ```json
 * {
 *   "id"
 *   "relatedType"
 *   "relatedId"
 *   "content"
 *   "archived"
 *   "createdBy"
 *   "relatedResource"
 *   "createdTime"
 *   "updatedTime"
 *   "archivedTime"
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class Note extends Entity
{
    const RELATED_TYPE_CUSTOMER = 'customer';
    const RELATED_TYPE_WEBSITE = 'website';

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

    /**
     * @return Customer|Website
     * @throws UnprocessableEntityException
     */
    public function getRelatedResource()
    {
        switch ($this->getAttribute('relatedType')) {
            case self::RELATED_TYPE_CUSTOMER:
                $resource = new Customer();
                break;
            case self::RELATED_TYPE_WEBSITE:
                $resource = new Website();
                break;
            default:
                throw new UnprocessableEntityException();
        }
        $resource->populate($this->getAttribute('relatedResource'));
        //TODO
        return $resource;
    }
}
