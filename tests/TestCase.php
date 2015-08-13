<?php
/**
 * This file is part of Rebilly.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Tests;

use Faker\Factory as FakerFactory;
use Faker\Generator as Faker;
use PHPUnit_Framework_TestCase as BaseTestCase;

/**
 * Class TestCase.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
abstract class TestCase extends BaseTestCase
{
    /** @var Faker */
    private $faker;

    /**
     * @return Faker
     */
    final protected function getFaker()
    {
        if ($this->faker === null) {
            $this->faker = $this->createFaker();
        }

        return $this->faker;
    }

    /**
     * @return Faker
     */
    protected function createFaker()
    {
        return FakerFactory::create();
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $annotations = $this->getAnnotations();

        if (isset($annotations['class']['todo'])) {
            $this->markTestSkipped('Pending test case...');
        } elseif (isset($annotations['method']['todo'])) {
            $this->markTestSkipped('Pending test...');
        }
    }
}
