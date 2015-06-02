<?php
/**
 * This file is part of Rebilly.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Test;

use RebillyClassLoader;

/**
 * Class ClassLoaderTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
final class ClassLoaderTest extends TestCase
{
    protected $loader;

    public function __construct()
    {
        $this->loader = new RebillyClassLoader(
            'Rebilly\Test',
            __DIR__,
            ['OldClass' => __DIR__ . '/Stub/OldClass.php']
        );
    }

    /**
     * @test
     */
    public function shouldSupportPsr4()
    {
        $this->assertEquals(__DIR__ . '/Stub/EmptyClass.php', $this->loader->findClassFile('Rebilly\\Test\\Stub\\EmptyClass'));
        $this->assertEquals(__DIR__ . '/Stub/Group/EmptyClass.php', $this->loader->findClassFile('Rebilly\\Test\\Stub\\Group\\EmptyClass'));
    }

    /**
     * @test
     */
    public function shouldSupportClassMap()
    {
        $this->assertEquals(__DIR__ . '/Stub/OldClass.php', $this->loader->findClassFile('OldClass'));
    }

    /**
     * @test
     */
    public function canRegister()
    {
        $this->loader->register();
        $this->assertTrue(class_exists('Rebilly\\Test\\Stub\\EmptyClass'));
        $this->assertTrue(class_exists('OldClass'));
    }
}
