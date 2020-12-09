<?php declare(strict_types=1);

/**
 * Strategy Test
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Behavioral\Strategy;
use PHPUnit\Framework\TestCase;

/**
 * Testing Strategy Pattern
 */
class StrategyTest extends TestCase
{
    /**
     * 
     */
    public function testStrategyChanged(): void
    {
    	$this->expectOutputString(
    		"a,b,c,d,e\n" .
    		"e,d,c,b,a\n"
    	);

    	$context = new Strategy\Context(new Strategy\ConcreteStrategyA());
		// normal sorting
		echo $context->doSomeBusinessLogic();
		// reverse sorting
		$context->setStrategy(new Strategy\ConcreteStrategyB());
		echo $context->doSomeBusinessLogic();
	}
}