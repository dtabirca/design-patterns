<?php declare(strict_types=1);

/**
 * Registry Pattern
 * A central storage for objects often used throughout the application, typically implemented using an abstract class with only static methods (or using the Singleton pattern).
 * This introduces global state, which should be avoided at all times! Instead implement it using Dependency Injection!
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Structural\Registry;

class Service
{
}

class Registry
{
    private static $services = [];

    public static function set($key, Service $service)
    {
        self::$services[$key] = $service;
    }

    public static function getAll()
    {
        return self::$services;
    }

    public static function get($key)
    {
        return isset(self::$services[$key]) ? self::$services[$key] : null;
    }

    final public static function remove($key)
    {
        if (array_key_exists($key, self::$services)) {
            unset(self::$services[$key]);
        }
    }
}