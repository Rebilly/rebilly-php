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
        $resource = $factory->create('stubs/uuid', $this->fakeData);

        $this->assertInstanceOf(EntityStub::class, $resource);
        $this->assertEquals('uuid', $resource->getId());
        $this->assertEquals($this->fakeDate, $resource->getUpdatedTime());

        $resource->offsetUnset('field1');
        $resource->offsetSet('field2', 'dummy');

        $this->assertTrue($resource->offsetExists('field1'));
        $this->assertFalse($resource->offsetExists('field3'));

        $this->assertEquals(null, $resource->offsetGet('field1'));
        $this->assertEquals('dummy', $resource->offsetGet('field2'));

        $this->assertEquals(['attribute' => 'value'], $resource->getRelation1());
        $this->assertEquals(null, $resource->getRelation2());

        $this->assertEquals('http://example.com', $resource->getSelfLink());

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
     * @depends initFactory
     *
     * @param Factory $factory
     *
     * @return Collection
     */
    public function initCollection(Factory $factory)
    {
        $set = $factory->create('stubs', [$this->fakeData]);

        $this->assertInstanceOf(Collection::class, $set);
        $this->assertGreaterThan(0, count($set));

        return $set;
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
