<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests;

use Rebilly\ParamBag;

/**
 * Class ParamBagTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
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

        $this->assertContains('attr1:foo,bar', $params['filter']);
        $this->assertContains('attr2:1..10', $params['filter']);
        $this->assertContains('attr1,-attr2', $params['sort']);
        $this->assertEquals(10, $params['limit']);
        $this->assertEquals(1, $params['offset']);
        $this->assertEquals('attr1,attr2', $params['fields']);
        $this->assertEquals('link1', $params['expand']);
    }
}
