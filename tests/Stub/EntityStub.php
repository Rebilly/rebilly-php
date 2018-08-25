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

namespace Rebilly\Tests\Stub;

use Rebilly\Rest\Entity;

/**
 * Class EntityStub.
 *
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

    public function getComplexField()
    {
        return $this->getAttribute('complexField');
    }

    public function setComplexField(self $value)
    {
        return $this->setAttribute('complexField', $value->jsonSerialize());
    }

    public function createComplexField(array $value)
    {
        return new self($value);
    }
}
