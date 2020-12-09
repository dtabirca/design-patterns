<?php declare(strict_types=1);

/**
 * ChainOfResponsibility Test
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Behavioral\ChainOfResponsibility;
use PHPUnit\Framework\TestCase;

/**
 * Testing ChainOfResponsibility Pattern
 */
class ChainOfResponsibilityTest extends TestCase
{
    /**
     * validate request
     */
    public function testRequest(): void
    {
		$path = new ChainOfResponsibility\PathValidator();
		$query = new ChainOfResponsibility\QueryValidator();
		$ip = new ChainOfResponsibility\IpFilter();

		$path->linkNext($query)->linkNext($ip);
		$this->expectOutputString('passing path validationpassing query validationpassing ip validation');
		$path->handle('https://test.com/test?abc=1&xyz=2');
	}
}