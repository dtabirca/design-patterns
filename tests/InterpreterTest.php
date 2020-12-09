<?php declare(strict_types=1);

/**
 * Interpreter Test
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Behavioral\Interpreter;
use PHPUnit\Framework\TestCase;

/**
 * Testing Interpreter Pattern
 */
class InterpreterTest extends TestCase
{
    /**
     * evaluate text
     */
    public function testInterpreter(): void
    {
		$context = [
		    '*' => 'BoldWord',
		    '#' => 'ItalicWord',
		    '&' => 'UnderlidedWord'
		];

		$this->assertSame('Lorem ipsum <b>dolor</b> sit amet, <u>consectetur</u> adipiscing elit, sed do eiusmod tempor incididunt ut <i>labore</i> et dolore <u>magna</u> aliqua.', (new Interpreter\Interpreter('Lorem ipsum *dolor sit amet, &consectetur adipiscing elit, sed do eiusmod tempor incididunt ut #labore et dolore &magna aliqua.'))->evaluate($context));  
	}
}
