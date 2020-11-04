<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfe5d3ee61a7eecbe0bf3e4971f6c082a
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfe5d3ee61a7eecbe0bf3e4971f6c082a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfe5d3ee61a7eecbe0bf3e4971f6c082a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
