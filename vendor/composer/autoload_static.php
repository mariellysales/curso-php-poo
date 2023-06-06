<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit96f355bd20e82f7e30ae84229d4aff0b
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sts\\' => 4,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sts\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/sts',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit96f355bd20e82f7e30ae84229d4aff0b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit96f355bd20e82f7e30ae84229d4aff0b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit96f355bd20e82f7e30ae84229d4aff0b::$classMap;

        }, null, ClassLoader::class);
    }
}