<?php declare(strict_types=1);

/**
 * Registry Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Structural\Registry;
use PHPUnit\Framework\TestCase;

/**
 * Testing Registry Pattern
 */
class RegistryTest extends TestCase
{
    /**
     * set and get
     */
    public function testSetAndGetService(): void
    {
		$service1 = $this->getMockBuilder(Registry\Service::class)->getMock();
		Registry\Registry::set('service_1', $service1);
		$this->assertSame($service1, Registry\Registry::get('service_1'));

		$service2 = $this->getMockBuilder(Registry\Service::class)->getMock();
		Registry\Registry::set('service_2', $service2);
		$this->assertCount(2, Registry\Registry::getAll());    	
    }
}