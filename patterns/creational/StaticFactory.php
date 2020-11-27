<?php declare(strict_types=1);

/**
* Static Factory Method
* 
* @category Design_Patterns
* @package  Creational
* @author   AltTab
* @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
* @link     https://github.com
*/

namespace DesignPatterns\Creational\StaticFactory;

/**
 * Creates series of related or dependent objects
 * 
 * Static Factory pattern uses just one static method to create all the object types
 * The static method returns the proper class instance (after passing a condition, if multiple types are needed) 
 * A good practice when creating the static factory class it to declare it as final to disable other classes from overriding it.
 */
final class Supply
{
    /**
     * Static factory method
     * 
     * @param string $type [description]
     * 
     * @return [type]       [description]
     */
    public static function getMaterial(string $type): Material
    {
        switch ($type) {
            case 'plastic':
                return new Plastic();
            case 'metal':
                return new Metal();
            default:
                return new Paper();
        }
    }
}

/**
 * 
 */
interface Material
{
}

/**
 * 
 */
class Plastic implements Material
{
}

/**
 * 
 */
class Metal implements Material
{
}

/**
 * 
 */
class Paper implements Material
{
}