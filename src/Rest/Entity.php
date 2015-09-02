<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Rest;

/**
 * Class Entity
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
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
