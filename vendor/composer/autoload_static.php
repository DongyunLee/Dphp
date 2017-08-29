<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteffa63f3bffea745b9f22605f2ea87a8
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteffa63f3bffea745b9f22605f2ea87a8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteffa63f3bffea745b9f22605f2ea87a8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
