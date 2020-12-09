<?php declare(strict_types=1);

/**
 * Flyweight Test
 * 
 * @category Design_Patterns
 * @package  Structural
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Structural\Flyweight;
use PHPUnit\Framework\TestCase;

/**
 * Testing Flyweight Pattern
 */
class FlyweightTest extends TestCase
{
    /**
     * try reusing common state of units
     */
    public function testFlyweights(): void
    {
		// pre-populated flyweights
		$factory = new Flyweight\FlyweightFactory([
			// unit, armor, damage, color, position, health
		    ["Marine", "1", "2", "Red"],
		    ["Marine", "2", "2", "Blue"],
		    ["Marauder", "3", "3", "Red"],
		    ["Marauder", "3", "3", "Blue"],
		]);
		$this->assertSame(4, $factory->listFlyweights());

		Flyweight\addUnitOnBattlefield($factory, ["Marine", "1", "2", "Red", "100/100", "100"]);
		Flyweight\addUnitOnBattlefield($factory, ["Marine", "2", "2", "Blue", "200/200", "80"]);
		Flyweight\addUnitOnBattlefield($factory, ["Marauder", "3", "3", "Red", "150/100", "60"]);
		Flyweight\addUnitOnBattlefield($factory, ["Marauder", "3", "3", "Blue", "200/250", "20"]);
		Flyweight\addUnitOnBattlefield($factory, ["Marine", "2", "2", "Blue", "220/230", "80"]);
		Flyweight\addUnitOnBattlefield($factory, ["Marine", "2", "2", "Red", "50/60", "50"]);
		Flyweight\addUnitOnBattlefield($factory, ["SCV", "0", "1", "Blue", "300/200", "80"]);
		Flyweight\addUnitOnBattlefield($factory, ["Reaper", "2", "2", "Red", "77/177", "90"]);
		Flyweight\addUnitOnBattlefield($factory, ["Marine", "1", "2", "Red", "88/88", "50"]);
		$this->assertSame(7, $factory->listFlyweights());
    }
}