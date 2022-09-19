<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit27ef80f4cfc4eefc99cbe4c0d88b7cb0
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit27ef80f4cfc4eefc99cbe4c0d88b7cb0', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit27ef80f4cfc4eefc99cbe4c0d88b7cb0', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit27ef80f4cfc4eefc99cbe4c0d88b7cb0::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit27ef80f4cfc4eefc99cbe4c0d88b7cb0::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire27ef80f4cfc4eefc99cbe4c0d88b7cb0($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire27ef80f4cfc4eefc99cbe4c0d88b7cb0($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}