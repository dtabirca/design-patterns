<?php declare(strict_types=1);

/**
 * Mediator Test
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Behavioral\Mediator;
use PHPUnit\Framework\TestCase;

/**
 * Testing Mediator Pattern
 */
class MediatorTest extends TestCase
{
    /**
     * using mediator
     */
    public function testUserRoleUser(): void
    {
		$c1 = new Mediator\UserComponent();
		$c2 = new Mediator\RoleComponent();
		$mediator = new Mediator\ConcreteMediator($c1, $c2);
		$this->expectOutputString('User: name has role adminRole: role owned by user');
		echo $c1->showUserRole('name');
		echo $c2->showRoleUser('role');
	}
}