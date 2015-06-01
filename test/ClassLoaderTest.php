<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) Veaceslav Medvedev <slavcopost@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Test;

use RebillyClassLoader;

/**
 * Class ClassLoaderTest.
 *
 * @author Veaceslav Medvedev <slavcopost@gmail.com>
 */
final class ClassLoaderTest extends TestCase
{
    protected $loader;

    public function __construct()
    {
        $this->loader = new RebillyClassLoader(
            'Rebilly\Test',
            __DIR__,
            ['OldClass' => __DIR__ . '/lib/OldClass.php']
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
        $this->assertEquals(__DIR__ . '/lib/OldClass.php', $this->loader->findClassFile('OldClass'));
    }

    /**
     * @test
     */
    public function canRegister()
    {
        $this->loader->register();
        $this->assertTrue(class_exists('Rebilly\\Test\\Stub\\EmptyClass'));
    }
}
