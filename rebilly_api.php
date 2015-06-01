<?php
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
     * Loads the given class or interface.
     *
     * @param string $className The name of the class to load.
     */
    public function loadClass($className)
    {
        $filePath = '';

        if (isset($this->classMap[$className])) {

        } elseif ($this->rootNamespace . $this->namespaceSeparator === substr($className, 0, strlen($this->rootNamespace . $this->namespaceSeparator))) {
            if (false !== ($lastNsPos = strripos($className, $this->namespaceSeparator))) {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $filePath = str_replace($this->namespaceSeparator, DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            }
        }

        require $this->includePath . DIRECTORY_SEPARATOR . $filePath . $className . $this->fileExtension;
    }
}

/**
 * Register `Rebilly` root namespace and link to `lib` directory.
 * All classes without namespace will load from base directory.
 */
$loader = new RebillyClassLoader(
    'Rebilly',
    __DIR__ . '/lib',
    [
        'RebillyHttpStatusCode' => __DIR__ . '/lib/util/RebillyHttpStatusCode.php',
    ]
);
$loader->register();
