<?php declare(strict_types=1);

/**
 * Simple Factory Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Creational\SimpleFactory;
use PHPUnit\Framework\TestCase;

/**
 * Testing Simple Factory
 */
class SimpleFactoryTest extends TestCase
{
    /**
     * Trying to create products
     */
    public function testCreateProducts(): void
    {
        $product1 = (new SimpleFactory\SimpleFactory())->manufactureProduct1();
        $this->assertInstanceOf(SimpleFactory\Product1::class, $product1);

        $product2 = (new SimpleFactory\SimpleFactory())->manufactureProduct2();
        $this->assertInstanceOf(SimpleFactory\Product2::class, $product2);        
    }        
}
