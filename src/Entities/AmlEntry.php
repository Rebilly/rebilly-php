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

declare(strict_types=1);

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

class AmlEntry extends Entity
{
    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->getAttribute('firstName');
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->getAttribute('lastName');
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->getAttribute('source');
    }

    /**
     * @return string
     */
    public function getSourceType()
    {
        return $this->getAttribute('sourceType');
    }

    /**
     * @return null|string
     */
    public function getGender()
    {
        return $this->getAttribute('gender');
    }

    /**
     * @return null|string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @return null|string
     */
    public function getRegime()
    {
        return $this->getAttribute('regime');
    }

    /**
     * @return null|string
     */
    public function getAuthenticity()
    {
        return $this->getAttribute('authenticity');
    }

    /**
     * @return null|string
     */
    public function getNationality()
    {
        return $this->getAttribute('nationality');
    }

    /**
     * @return null|string
     */
    public function getComments()
    {
        return $this->getAttribute('comments');
    }

    /**
     * @return array
     */
    public function getTitle(): array
    {
        return $this->getAttribute('title');
    }

    /**
     * @return array
     */
    public function getLegalBasis()
    {
        return $this->getAttribute('legalBasis');
    }

    /**
     * @return array
     */
    public function getAddress()
    {
        return $this->getAttribute('address');
    }

    /**
     * @return array
     */
    public function getDob()
    {
        return $this->getAttribute('dob');
    }

    /**
     * @return array
     */
    public function getAliases()
    {
        return $this->getAttribute('aliases');
    }

    /**
     * @return array
     */
    public function getPassport()
    {
        return $this->getAttribute('passport');
    }
}
