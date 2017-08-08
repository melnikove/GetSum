<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a206f460e0c5970838600d5facc90cc
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Introvert\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Introvert\\' => 
        array (
            0 => __DIR__ . '/..' . '/mahatmaguru/intr-sdk-test/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a206f460e0c5970838600d5facc90cc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a206f460e0c5970838600d5facc90cc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}