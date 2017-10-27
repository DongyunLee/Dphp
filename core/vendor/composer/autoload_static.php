<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe8df792005ff14b8db14780ad2a06fe
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../../..' . '/core/Dphp/models',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../../..' . '/core/Dphp/controllers',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe8df792005ff14b8db14780ad2a06fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe8df792005ff14b8db14780ad2a06fe::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
