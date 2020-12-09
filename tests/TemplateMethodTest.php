<?php declare(strict_types=1);

/**
 * TemplateMethod Test
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Behavioral\TemplateMethod;
use PHPUnit\Framework\TestCase;

/**
 * Testing TemplateMethod Pattern
 */
class TemplateMethodTest extends TestCase
{
	/**
	 * [clientCode description]
	 * @param  AbstractClass $class [description]
	 * @return [type]               [description]
	 */
	function clientCode(TemplateMethod\AbstractClass $class)
	{
	    // ...
	    $class->templateMethod();
	    // ...
	}

    /**
     * test different subclasses
     */
    public function testTemplateMethod(): void
    {
    	$this->expectOutputString(
    		"AbstractClass says: I am doing the bulk of the work\n" . 
			"ConcreteClass1 says: Implemented Operation1\n" . 
			"AbstractClass says: But I let subclasses override some operations\n" . 
			"ConcreteClass1 says: Implemented Operation2\n" . 
			"AbstractClass says: But I am doing the bulk of the work anyway\n" . 
			"AbstractClass says: I am doing the bulk of the work\n" . 
			"ConcreteClass2 says: Implemented Operation1\n" . 
			"AbstractClass says: But I let subclasses override some operations\n" . 
			"ConcreteClass2 says: Overridden Hook1\n" . 
			"ConcreteClass2 says: Implemented Operation2\n" . 
			"AbstractClass says: But I am doing the bulk of the work anyway\n"
    	);
		$this->clientCode(new TemplateMethod\ConcreteClass1());
		$this->clientCode(new TemplateMethod\ConcreteClass2());    	
	}
}