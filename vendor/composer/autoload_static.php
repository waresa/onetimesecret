<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit46229744719237b1280c19d045f054b5
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Predis\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Predis\\' => 
        array (
            0 => __DIR__ . '/..' . '/predis/predis/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit46229744719237b1280c19d045f054b5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit46229744719237b1280c19d045f054b5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit46229744719237b1280c19d045f054b5::$classMap;

        }, null, ClassLoader::class);
    }
}