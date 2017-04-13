<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit595effa8b4a339e7d937a75756bce786
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Guessing\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Guessing\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib/Guessing',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit595effa8b4a339e7d937a75756bce786::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit595effa8b4a339e7d937a75756bce786::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
