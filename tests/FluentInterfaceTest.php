<?php declare(strict_types=1);

/**
 * FluentInterface Test
 * 
 * @category Design_Patterns
 * @package  Structural
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Structural\FluentInterface;
use PHPUnit\Framework\TestCase;

/**
 * Testing FluentInterface Pattern
 */
class FluentInterfaceTest extends TestCase
{
    /**
     * Checking chained methods result
     */
    public function testFluentInterface(): void
    {
		$person = (new FluentInterface\Person())
                ->name('John Doe')
                ->sex('m')
                ->age('33')
                ->height('180')
                ->weight('70');  
		$this->assertSame('John Doe m 33 180 70 ', (string) $person);
    }
}