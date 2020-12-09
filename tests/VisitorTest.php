<?php declare(strict_types=1);

/**
 * Visitor Test
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Behavioral\Visitor;
use PHPUnit\Framework\TestCase;

/**
 * Testing Visitor Pattern
 */
class VisitorTest extends TestCase
{
    /**
     * test visitor interface
     */
    public function testVisitor1(): void
    {
    	$this->expectOutputString(
			"A + ConcreteVisitor1\n" .
			"B + ConcreteVisitor1\n"
    	);
    	$visitor1 = new Visitor\ConcreteVisitor1();
	    (new Visitor\ConcreteComponentA())->accept($visitor1);
	    (new Visitor\ConcreteComponentB())->accept($visitor1);
    }

    /**
     *
     */
    public function testVisitor2(): void
    {
    	$this->expectOutputString(
			"A + ConcreteVisitor2\n" .
			"B + ConcreteVisitor2\n"
    	);
    	$visitor2 = new Visitor\ConcreteVisitor2();
	    (new Visitor\ConcreteComponentA())->accept($visitor2);
	    (new Visitor\ConcreteComponentB())->accept($visitor2);
    }    
}
