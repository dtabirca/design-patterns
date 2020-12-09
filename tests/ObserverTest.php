<?php declare(strict_types=1);

/**
 * Observer Test
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Behavioral\Observer;
use PHPUnit\Framework\TestCase;

/**
 * Testing Observer Pattern
 */
class ObserverTest extends TestCase
{
    /**
     * notify observers
     */
    public function testNotifyingObserver(): void
    {
		$subject = new Observer\Subject();

		$o1 = new Observer\ConcreteObserverA();
		$subject->attach($o1);

		$o2 = new Observer\ConcreteObserverB();
		$subject->attach($o2);

		$this->expectOutputString(
			"ConcreteObserverB: react to state FALSE.\n" .
			"ConcreteObserverA: react to state TRUE.\n"
		);
		$subject->someBusinessLogic();
		$subject->someBusinessLogic();
		//$subject->detach($o2);
		//$subject->someBusinessLogic();
	}
}