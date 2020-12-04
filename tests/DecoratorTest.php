<?php declare(strict_types=1);

/**
 * Decorator Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Structural\Decorator;
use PHPUnit\Framework\TestCase;

/**
 * Testing Decorator Pattern
 */
class DecoratorTest extends TestCase
{
    /**
     * default implementation
     */
    public function testDefaultImplementation(): void
    {
		$simple = new Decorator\BasicPizza();
		$vegan = new Decorator\VeganPizza();
        $this->assertSame('dough, olive oil, tomato sauce, mozzarella', $simple->getIngredients());
        $this->assertSame('dough, olive oil, tomato sauce, olives', $vegan->getIngredients());
	}

	/**
	 * Decorators can wrap not only simple components but the other decorators as well.
	 */
	public function testDecoratorWrapping(): void
	{
		$simple = new Decorator\BasicPizza();
		$decorator1 = new Decorator\PizzaProsciutto($simple);
		$decorator2 = new Decorator\PizzaFunghi($decorator1);
		$this->assertSame('dough, olive oil, tomato sauce, mozzarella, prosciutto', $decorator1->getIngredients());
		$this->assertSame('dough, olive oil, tomato sauce, mozzarella, prosciutto, funghi', $decorator2->getIngredients());
	}
}