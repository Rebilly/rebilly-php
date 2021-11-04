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

namespace Rebilly\Tests;

use Rebilly\ParamBag;

/**
 * Class ParamBagTest.
 *
 */
class ParamBagTest extends TestCase
{
    /**
     * @test
     */
    public function howToBuildQueryUrl()
    {
        $params = ParamBag::create()
            ->filter('attr1', ['foo', 'bar'])
            ->filterRange('attr2', 1, 10)
            ->sort('attr1')
            ->sort('attr2', SORT_DESC)
            ->limit(10)
            ->offset(1)
            ->fields(['attr1', 'attr2'])
            ->expand(['link1'])
        ;

        $this->assertStringContainsString('attr1:foo,bar', $params['filter']);
        $this->assertStringContainsString('attr2:1..10', $params['filter']);
        $this->assertStringContainsString('attr1,-attr2', $params['sort']);
        $this->assertSame(10, $params['limit']);
        $this->assertSame(1, $params['offset']);
        $this->assertSame('attr1,attr2', $params['fields']);
        $this->assertSame('link1', $params['expand']);
    }
}
