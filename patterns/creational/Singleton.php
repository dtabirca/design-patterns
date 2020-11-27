<?php declare(strict_types=1);

/**
* Singleton
* 
* @category Design_Patterns
* @package  Creational
* @author   AltTab
* @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
* @link     https://github.com
*/

namespace DesignPatterns\Creational\Singleton;

/**
 * Singleton Class has only one instance,
 * provides a global point of access to it,
 * controls its instantiation
 *
 * How to create it:
 * Define a private static attribute in the "single instance" class.
 * Define a public static "accessor" function in the class, that acts as a constructor.
 * Do "lazy initialization" (creation on first use) in the accessor function.
 * Save the object in the static attribute. All following calls to the accessor method will return the stored object.
 * Define all constructors to be protected or private, to prevent other objects from using the new operator with the Singleton class. Clients may only use the accessor function to manipulate the Singleton.
 * 
 * Abstract Factories, Builders and Prototypes can be implemented as Singletons.
 * Singleton is actually considered an "anti-pattern"
 */
final class Singleton
{
    /**
     * Instance
     * 
     * @var [Singleton]
     */
    private static $_instance;

    /**
     * Hiding the constructor
     */
    private function __construct()
    {
    }

    /**
     * Disabling cloning this class
     */
    private function __clone()
    {
    }

    /**
     * Accessor
     * creates and returns only one instance
     * 
     * @return [Singleton] Instance
     */
    public static function getInstance(): self
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}