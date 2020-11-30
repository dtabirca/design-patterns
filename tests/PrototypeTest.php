<?php declare(strict_types=1);

/**
 * Prototype Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Creational\Prototype;
use PHPUnit\Framework\TestCase;

/**
 * Testing Prototype Pattern
 */
class PrototypeTest extends TestCase
{
    /**
     * Trying to clone prototyoe
     */
    public function testCreateAMDpc(): void
    {
        $this->expectOutputString(
            "Copy 1 of Route Name\n" .
            "Copy 2 of Route Name"
        );

		$route1 = new Prototype\Route1('Route Name', [45,25], [46,24]);
		$route2 = clone $route1;
		echo $route2->getName() . "\n";
		$route3 = $route1->cloneRoute();
		echo $route3->getName();
		$this->assertInstanceOf(Prototype\Route1::class, $route2);
		$this->assertInstanceOf(Prototype\Route1::class, $route3);
    }        
}
