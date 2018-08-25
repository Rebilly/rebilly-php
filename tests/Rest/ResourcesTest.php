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

namespace Rebilly\Tests\Rest;

use ArrayObject;
use DomainException;
use LogicException;
use OutOfRangeException;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Factory;
use Rebilly\Tests\Stub\EntityStub;
use Rebilly\Tests\TestCase;
use RuntimeException;

/**
 * Class ResourcesTest.
 *
 */
class ResourcesTest extends TestCase
{
    private $fakeDate;

    private $fakeData = [];

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
    }

    /**
     * @test
     *
     * @return Factory
     */
    public function initFactory()
    {
        $factory = new Factory(new ArrayObject([
            'stubs' => function (array $content) {
                return new Collection(new EntityStub(), $content);
            },
            'stubs/{id}' => function (array $content) {
                return new EntityStub($content);
            },
        ]));

        return $factory;
    }

    /**
     * @test
     * @depends initFactory
     *
     * @param Factory $factory
     */
    public function createUnknownResource(Factory $factory)
    {
        try {
            $factory->create('unknown', []);
        } catch (RuntimeException $e) {
        } finally {
            if (!isset($e)) {
                $this->fail('Failed asserting that exception of type "RuntimeException" is thrown.');
            }
        }
    }

    /**
     * @test
     * @depends initFactory
     *
     * @param Factory $factory
     *
     * @return EntityStub
     */
    public function initEntity(Factory $factory)
    {
        /** @var EntityStub $resource */
        $resource = $factory->create('stubs/uuid', []);
        $resource->populate($this->fakeData);

        $this->assertInstanceOf(EntityStub::class, $resource);
        $this->assertSame('uuid', $resource->getId());
        $this->assertSame($this->fakeDate, $resource->getUpdatedTime());

        $resource->offsetUnset('field1');
        $resource->offsetSet('field2', 'dummy');

        $this->assertFalse(isset($resource['field1']));
        $this->assertTrue(isset($resource['field2']));
        $this->assertFalse(isset($resource['field3']));

        $this->assertSame(null, $resource->offsetGet('field1'));
        $this->assertSame('dummy', $resource->offsetGet('field2'));

        $this->assertSame(['attribute' => 'value'], $resource->getRelation1());
        $this->assertSame(null, $resource->getRelation2());

        $this->assertSame('http://example.com', $resource->getSelfLink());

        $this->assertSame('value', $resource->getCustomMetadata());

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

        $this->assertSame(null, $resource->offsetGet('field1'));
        $this->assertSame('dummy', $clone->offsetGet('field1'));
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
        } catch (OutOfRangeException $e) {
        } finally {
            if (!isset($e)) {
                $this->fail('Failed asserting that exception of type "OutOfRangeException" is thrown.');
            }
        }

        try {
            $resource->offsetGet('writeOnlyField');
        } catch (DomainException $e) {
        } finally {
            if (!isset($e)) {
                $this->fail('Failed asserting that exception of type "DomainException" is thrown.');
            }
        }

        try {
            $resource->offsetSet('nonExistentAttribute', 'dummy');
        } catch (OutOfRangeException $e) {
        } finally {
            if (!isset($e)) {
                $this->fail('Failed asserting that exception of type "OutOfRangeException" is thrown.');
            }
        }

        try {
            $resource->offsetSet('readOnlyField', 'dummy');
        } catch (DomainException $e) {
        } finally {
            if (!isset($e)) {
                $this->fail('Failed asserting that exception of type "DomainException" is thrown.');
            }
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

        $this->assertSame(1, $set->getTotalItems());
        $this->assertSame(100, $set->getLimit());
        $this->assertSame(0, $set->getOffset());

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
        $this->assertNotSame(spl_object_hash($set[0]), spl_object_hash($clone[0]));
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
