<?php declare(strict_types=1);

/**
 * Static Factory Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Creational\StaticFactory;
use PHPUnit\Framework\TestCase;

/**
 * Testing Static Factory
 */
class StaticFactoryTest extends TestCase
{
    /**
     * Trying to create products
     */
    public function testCreateMaterials(): void
    {
        $this->assertInstanceOf(StaticFactory\Plastic::class, StaticFactory\Supply::getMaterial('plastic'));
        $this->assertInstanceOf(StaticFactory\Metal::class, StaticFactory\Supply::getMaterial('metal'));
    }
}