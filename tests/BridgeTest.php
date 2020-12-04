<?php declare(strict_types=1);

/**
 * Bridge Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Structural\Bridge;
use PHPUnit\Framework\TestCase;

/**
 * Testing Bridge Pattern
 */
class BridgeTest extends TestCase
{
    /**
     * Testing action 1
     */
    public function testAction1(): void
    {

        $implementation = new Bridge\RepairOperation();
        $abstraction = new Bridge\Repairs('windscreen', $implementation);
        $this->expectOutputString(
            "Repair windscreen with Repair Action for windscreen"
        );        
        echo $abstraction->action();
    }

    /**
     * Testing action 2
     */
    public function testAction2(): void
    {    
        $implementation = new Bridge\ReplaceOperation();
        $abstraction = new Bridge\NewPartsShop('battery', $implementation);
        $this->expectOutputString(
            "Replace battery with Replace Action for battery"
        );        
        echo $abstraction->action();
    }        
}