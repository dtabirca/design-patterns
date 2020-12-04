<?php declare(strict_types=1);

/**
 * Proxy Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Structural\Proxy;
use PHPUnit\Framework\TestCase;

/**
 * Testing Proxy Pattern
 */
class ProxyTest extends TestCase
{
    /**
     * Executing the client code with a real subject
     */
    public function testRealSubject(): void
    {
		$realSubject = new Proxy\RealSubject();
		$this->expectOutputString(
			"RealSubject: Handling request.\n" 
		); 			
		Proxy\clientCode($realSubject);
	}

    /**
     * Executing the same client code with a proxy
     */
    public function testProxy(): void
    {
		$realSubject = new Proxy\RealSubject();
		$proxy = new Proxy\Proxy($realSubject);
		$this->expectOutputString(
			"Proxy: Checking access prior to firing a real request.\n" . 
			"RealSubject: Handling request.\n" . 
			"Proxy: Logging the time of request.\n"
		); 	
		Proxy\clientCode($proxy);
	}
}