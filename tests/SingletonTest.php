<?php declare(strict_types=1);

/**
 * Singleton Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Creational\Singleton;
use PHPUnit\Framework\TestCase;

/**
 * Testing Singleton Example
 */
class SingletonTest extends TestCase
{
    /**
     * Trying to get the instance of the Singleton twice
     * Checking if the instance is the same
     */
    public function testSingleInstance(): void
    {
        $firstInstance = Singleton::getInstance();
        $secondInstance = Singleton::getInstance();

        $this->assertInstanceOf(Singleton::class, $firstInstance);
        $this->assertSame($firstInstance, $secondInstance);
    }

    /**
     * Trying to instantiate directly
     * Calling private methods will throw a fatal error  
     * 
     * @return [type] [description]
     */
    public function testConstructor()
    {
        // $instance = new Singleton();
    }

    /**
     * Trying to clone the instance 
     * Calling private methods will throw a fatal error  
     * 
     * @return [type] [description]
     */
    public function testClone()
    {
        // $instance = Singleton::getInstance();
        // $cloneInstance = clone $instance;
    }        
}
