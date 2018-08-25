<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Rest;

use ArrayObject;
use DomainException;
use OutOfRangeException;
use LogicException;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Factory;
use Rebilly\Tests\Stub\EntityStub;
use Rebilly\Tests\TestCase;
use RuntimeException;

/**
 * Class ResourcesTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
class ResourcesTest extends TestCase
{
    private $fakeDate;
    private $fakeData = [];

    /** @var Factory */
    private $factory;

    protected function setUp()
    {
        parent::setUp();

        $this->fakeDate = date('Y-m-d H:i:s', strtotime('1 january 2000'));
        $this->fakeData = [
            'id' => 'uuid',
            'updatedTime' => $this->fakeDate,
            'field1' => 'value',
            '_embedded' => [
                'relation1' => [
                    'attribute' => 'value',
                ],
            ],
            '_links' => [
                [
                    'rel' => 'self',
                    'href' => 'http://example.com',
                ],
            ],
            '_metadata' => [
                'customMeta' => 'value',
            ],
        ];

        $this->factory = new Factory(
            new ArrayObject(
                [
                    'stubs' => function (array $content) {
                        return new Collection(new EntityStub(), $content);
                    },
                    'stubs/{id}' => function (array $content) {
                        return new EntityStub($content);
                    },
                ]
            )
        );
    }

    /**
     * @test
     */
    public function createUnknownResource()
    {
        try {
            $this->factory->create('unknown', []);

            $this->fail('Failed asserting that exception of type "RuntimeException" is thrown.');
        } catch (RuntimeException $e) {
            self::assertSame('Cannot create resource by URI "/unknown"', $e->getMessage());
        }
    }

    /**
     * @test
     *
     * @return EntityStub
     */
    public function initEntity()
    {
        /** @var EntityStub $resource */
        $resource = $this->factory->create('stubs/uuid', []);
        $resource->populate($this->fakeData);

        $this->assertInstanceOf(EntityStub::class, $resource);
        $this->assertEquals('uuid', $resource->getId());
        $this->assertEquals($this->fakeDate, $resource->getUpdatedTime());

        $resource->offsetUnset('field1');
        $resource->offsetSet('field2', 'dummy');

        $this->assertFalse(isset($resource['field1']));
        $this->assertTrue(isset($resource['field2']));
        $this->assertFalse(isset($resource['field3']));

        $this->assertEquals(null, $resource->offsetGet('field1'));
        $this->assertEquals('dummy', $resource->offsetGet('field2'));

        $this->assertEquals(['attribute' => 'value'], $resource->getRelation1());
        $this->assertEquals(null, $resource->getRelation2());

        $this->assertEquals('http://example.com', $resource->getSelfLink());

        $this->assertEquals('value', $resource->getCustomMetadata());

        return $resource;
    }

    /**
     * @test
     * @depends initEntity
     *
     * @param EntityStub $resource
     */
    public function cloneEntity(EntityStub $resource)
    {
        $clone = clone $resource;

        $clone->offsetSet('field1', 'dummy');

        $this->assertEquals(null, $resource->offsetGet('field1'));
        $this->assertEquals('dummy', $clone->offsetGet('field1'));
    }

    /**
     * @test
     * @depends initEntity
     *
     * @param EntityStub $resource
     */
    public function serializeEntity(EntityStub $resource)
    {
        $json = $resource->jsonSerialize();

        $this->assertTrue(isset($json['field2']));
    }


    /**
     * @test
     * @depends initEntity
     *
     * @param EntityStub $resource
     */
    public function invalidAttribute(EntityStub $resource)
    {
        try {
            $resource->offsetGet('nonExistentAttribute');
            $this->fail('Failed asserting that exception of type "OutOfRangeException" is thrown.');
        } catch (OutOfRangeException $e) {
            self::assertSame(sprintf('The property "%s::%s" does not exist', get_class($resource), 'nonExistentAttribute'), $e->getMessage());
        }

        try {
            $resource->offsetGet('writeOnlyField');
            $this->fail('Failed asserting that exception of type "DomainException" is thrown.');
        } catch (DomainException $e) {
            self::assertSame(sprintf('Trying to get the write-only property "%s::%s"', get_class($resource), 'writeOnlyField'), $e->getMessage());
        }

        try {
            $resource->offsetSet('nonExistentAttribute', 'dummy');
            $this->fail('Failed asserting that exception of type "OutOfRangeException" is thrown.');
        } catch (OutOfRangeException $e) {
            self::assertSame(sprintf('The property "%s::%s" does not exist', get_class($resource), 'nonExistentAttribute'), $e->getMessage());
        }

        try {
            $resource->offsetSet('readOnlyField', 'dummy');
            $this->fail('Failed asserting that exception of type "DomainException" is thrown.');
        } catch (DomainException $e) {
            self::assertSame(sprintf('Trying to set the read-only property "%s::%s"', get_class($resource), 'readOnlyField'), $e->getMessage());
        }
    }

    /**
     * @test
     */
    public function useComplexResourceFields()
    {
        $resource = new EntityStub();

        $this->assertNull($resource->getComplexField());

        $resource->setComplexField(new EntityStub());

        $this->assertInstanceOf(EntityStub::class, $resource->getComplexField());

        $json = $resource->jsonSerialize();

        $this->assertArrayHasKey('complexField', $json);
        $this->assertTrue(is_array($json['complexField']));
    }

    /**
     * @test
     */
    public function useComplexResourceFieldsInCollection()
    {
        $collection = new Collection(
            new EntityStub(),
            [
                [
                    'complexField' => [],
                ],
            ]
        );

        $this->assertCount(1, $collection);
        $this->assertInstanceOf(EntityStub::class, $collection[0]);
        $this->assertInstanceOf(EntityStub::class, $collection[0]->getComplexField());
    }

    /**
     * @test
     * @depends initFactory
     *
     * @param Factory $factory
     *
     * @return Collection
     */
    public function initCollection(Factory $factory)
    {
        $set = $factory->create('stubs', [
            'data' => [$this->fakeData],
            '_metadata' => [
                'total' => 1,
                'limit' => 100,
                'offset' => 0,
            ],
        ]);

        $this->assertInstanceOf(Collection::class, $set);
        $this->assertGreaterThan(0, count($set));

        $this->assertEquals(1, $set->getTotalItems());
        $this->assertEquals(100, $set->getLimit());
        $this->assertEquals(0, $set->getOffset());

        return $set;
    }

    /**
     * @test
     * @depends initCollection
     *
     * @param Collection $set
     */
    public function cloneCollection(Collection $set)
    {
        $clone = clone $set;
        $this->assertNotEquals(spl_object_hash($set[0]), spl_object_hash($clone[0]));
    }

    /**
     * @test
     * @depends initCollection
     *
     * @param Collection $set
     */
    public function serializeCollection(Collection $set)
    {
        $json = $set->jsonSerialize();

        $this->assertTrue(isset($json[0]['field1']));
    }

    /**
     * @test
     * @depends initCollection
     *
     * @param Collection $set
     */
    public function traverseCollection(Collection $set)
    {
        foreach ($set as $entity) {
            $this->assertInstanceOf(EntityStub::class, $entity);
        }
    }

    /**
     * @test
     * @depends initCollection
     *
     * @param Collection $set
     */
    public function accessCollectionItems(Collection $set)
    {
        $this->assertTrue(isset($set[0]));
        $this->assertInstanceOf(EntityStub::class, $set[0]);

        try {
            unset($set[0]);
        } catch (LogicException $e) {
        } finally {
            if (!isset($e)) {
                $this->fail('Failed asserting that exception of type "LogicException" is thrown.');
            }
        }

        try {
            $set[1] = $set[0];
        } catch (LogicException $e) {
        } finally {
            if (!isset($e)) {
                $this->fail('Failed asserting that exception of type "LogicException" is thrown.');
            }
        }
    }
}
