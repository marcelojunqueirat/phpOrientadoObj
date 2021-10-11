<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf8b264d1841aff23e7be44cf93029784
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf8b264d1841aff23e7be44cf93029784::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf8b264d1841aff23e7be44cf93029784::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf8b264d1841aff23e7be44cf93029784::$classMap;

        }, null, ClassLoader::class);
    }
}
