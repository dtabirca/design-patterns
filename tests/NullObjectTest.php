<?php declare(strict_types=1);

/**
 * NullObject Test
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Behavioral\NullObject;
use PHPUnit\Framework\TestCase;

/**
 * Testing NullObject Pattern
 */
class NullObjectTest extends TestCase
{
    /**
     * null object
     */
    public function testNullObject()
    {
    	$service = new NullObject\Service(new NullObject\NullLogger());
    	$this->expectOutputString('');
    	$service->doSomething();
	}

    /**
     * default
     */
    public function testStandardLogger()
    {
        $service = new NullObject\Service(new NullObject\PrintLogger());
        $this->expectOutputString('We are in DesignPatterns\Behavioral\NullObject\Service::doSomething');
        $service->doSomething();
    }
}