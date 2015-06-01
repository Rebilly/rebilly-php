<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) Veaceslav Medvedev <slavcopost@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * Class RebillyClassLoader.
 */
final class RebillyClassLoader
{
    private $fileExtension = '.php';
    private $namespaceSeparator = '\\';
    private $rootNamespace;
    private $includePath;
    private $classMap = [];

    /**
     * Create new instance.
     *
     * @param string $rootNamespace
     * @param string $includePath
     * @param array $classMap
     */
    public function __construct($rootNamespace, $includePath, $classMap = [])
    {
        $this->rootNamespace = $rootNamespace;
        $this->includePath = $includePath;
        $this->classMap = $classMap;
    }

    /**
     * Register autoloader.
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * Unregister autoloader.
     */
    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }

    /**
     * Try to find file path for the given class or interface.
     *
     * @param string $className The name of the class to load.
     *
     * @return string
     */
    public function findClassFile($className)
    {
        if (isset($this->classMap[$className])) {
            return $this->classMap[$className];
        }

        if ($this->rootNamespace . $this->namespaceSeparator === substr($className, 0, strlen($this->rootNamespace . $this->namespaceSeparator))) {
            $className = substr($className, strlen($this->rootNamespace . $this->namespaceSeparator));
            $filePath = '';

            if (false !== ($lastNsPos = strripos($className, $this->namespaceSeparator))) {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $filePath = str_replace($this->namespaceSeparator, DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            }

            return $this->includePath . DIRECTORY_SEPARATOR . $filePath . $className . $this->fileExtension;
        }

        return null;
    }

    /**
     * Loads the given class or interface.
     *
     * @param string $className The name of the class to load.
     */
    public function loadClass($className)
    {
        if (null !== ($path = $this->findClassFile($className))) {
            require $path;
        }
    }
}
