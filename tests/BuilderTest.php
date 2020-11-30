<?php declare(strict_types=1);

/**
 * Builder Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Creational\Builder;
use PHPUnit\Framework\TestCase;

/**
 * Testing Builder Pattern
 */
class BuilderTest extends TestCase
{
    /**
     * Trying to create an AMD PC
     */
    public function testCreateAMDpc(): void
    {
        $pc = new Builder\CustomPC();
        $pc = $pc->build(new Builder\AMDBuilder());
        $this->assertInstanceOf(Builder\Computer::class, $pc);
    }        
}
