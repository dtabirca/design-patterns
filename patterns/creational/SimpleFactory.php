<?php declare(strict_types=1);

/**
* Factory Method Example
* 
* @category Design_Patterns
* @package  Creational
* @author   AltTab
* @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
* @link     https://github.com
*/

namespace DesignPatterns\Creational\SimpleFactory;

/**
 * Simplest form of a Factory
 * Have a factory method for each class you want to initialize
 */
class SimpleFactory
{
    public function manufactureProduct1(): Product1
    {
        return new Product1();
    }
    public function manufactureProduct2(): Product2
    {
        return new Product2();
    }    
}

/**
 * 
 */
class Product1
{		
}

/**
 * 
 */
class Product2
{		
}