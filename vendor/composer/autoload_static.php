<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit953f4759efceacb017a195e7338c622b
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kikbook\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kikbook\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit953f4759efceacb017a195e7338c622b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit953f4759efceacb017a195e7338c622b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
