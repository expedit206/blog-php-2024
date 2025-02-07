<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7dca97793902839b24a02908bf8ff068
{
    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'libraries\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'libraries\\' => 
        array (
            0 => __DIR__ . '/../..' . '/libraries',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7dca97793902839b24a02908bf8ff068::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7dca97793902839b24a02908bf8ff068::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7dca97793902839b24a02908bf8ff068::$classMap;

        }, null, ClassLoader::class);
    }
}
