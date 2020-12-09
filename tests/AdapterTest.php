<?php declare(strict_types=1);

/**
 * Adapter Test
 * 
 * @category Design_Patterns
 * @package  Structural
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Structural\Adapter;
use PHPUnit\Framework\TestCase;

/**
 * Testing Adapter Pattern
 */
class AdapterTest extends TestCase
{
    /**
     * Trying to clone prototyoe
     */
    public function testPortAdapter(): void
    {
        //$target  = new SerialPort('a,b,c,d,e,f');
        //$target2 = new SerialPort(['a','b','c','d','e','f']);
        $adaptee = new Adapter\ParallelPort(['a','b','c','d','e','f']);
        $adapter = new Adapter\PortAdapter($adaptee);
        $this->assertInstanceOf(Adapter\SerialPort::class, $adapter);
        $this->expectOutputString(
            "handeling data: a,b,c,d,e,f"
        );
        echo $adapter->doSomething();
    }        
}
