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

namespace Rebilly\Rest;

/**
 * Class Entity
 *
 */
abstract class Entity extends Resource
{
    /**
     * Getter for entity ID.
     *
     * In the case where an identifier resource has a different name,
     * you need to override this method and delegate to the appropriate getter.
     *
     * @return string
     */
    public function getId()
    {
        return $this->getAttribute('id');
    }

    /**
     * Getter for entity updated time.
     *
     * This property present always and should used to control cache.
     *
     * @return string
     */
    public function getUpdatedTime()
    {
        return $this->getAttribute('updatedTime');
    }
}
