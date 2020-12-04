<?php declare(strict_types=1);

/**
 * DependencyInjection Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Structural\DependencyInjection;
use PHPUnit\Framework\TestCase;
//use \PDO;

/**
 * Testing DependencyInjection Pattern
 */
class DependencyInjectionTest extends TestCase
{
    /**
     * injecting configuration dependency into db constructor 
     */
    public function testDatabaseDependencyInjection(): void
    {
    	$config = new DependencyInjection\DatabaseConfiguration('127.0.0.1', 3306, 'root', '');
		$connection = new DependencyInjection\DatabaseConnection($config);
		$this->assertInstanceOf(PDO::class, $connection->connect());
	}
}