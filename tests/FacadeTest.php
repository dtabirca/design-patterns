<?php declare(strict_types=1);

/**
 * Facade Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Structural\Facade;
use PHPUnit\Framework\TestCase;

/**
 * Testing Facade Pattern
 */
class FacadeTest extends TestCase
{
    /**
     * using the Facade to reach subsystems
     */
    public function testFacade(): void
    {
    	$this->expectOutputString(
    		"Facade initializes subsystems:\n" . 
    		"Subsystem1: Ready!\n" .
    		"Subsystem2: Get ready!\n" .
    		"Facade orders subsystems to perform the action:\n" .
    		"Subsystem1: Go!\n" .
    		"Subsystem2: Fire!\n"
    		);
        $subsystem1 = $this->createMock(Facade\Subsystem1::class);
		$subsystem2 = $this->createMock(Facade\Subsystem2::class);
		$facade = new Facade\Facade($subsystem1, $subsystem2);
		Facade\clientCode($facade);
	}
}