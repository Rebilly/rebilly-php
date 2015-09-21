<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Stub;

use Rebilly\Rest\Entity;

/**
 * Class EntityStub.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
final class EntityStub extends Entity
{
    public function getField1()
    {
        return $this->getAttribute('field1');
    }

    public function setField1($value)
    {
        return $this->setAttribute('field1', $value);
    }

    public function getField2()
    {
        return $this->getAttribute('field2');
    }

    public function setField2($value)
    {
        return $this->setAttribute('field2', $value);
    }

    public function getReadOnlyField()
    {
        return $this->getAttribute('readOnlyField');
    }

    public function setWriteOnlyField($value)
    {
        return $this->setAttribute('writeOnlyField', $value);
    }

    public function getRelation1()
    {
        return $this->getEmbeddedResource('relation1');
    }

    // TODO Something wrong here
    public function getRelation2()
    {
        return $this->getEmbeddedResource('relation2');
    }

    // TODO Something wrong here
    public function getSelfLink()
    {
        return $this->getLink('self');
    }

    public function getCustomMetadata()
    {
        return $this->getMetadata('customMeta');
    }
}
