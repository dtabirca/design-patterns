<?php declare(strict_types=1);

/**
 * Command Test
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Behavioral\Command;
use PHPUnit\Framework\TestCase;

/**
 * Testing Command Pattern
 */
class CommandTest extends TestCase
{
    /**
     * do and undo
     */
    public function testHelloWorldCommand(): void
    {
		$invoker = new Command\Invoker();
		$receiver = new Command\Receiver();
		$invoker->setCommand(new Command\HelloWorldCommand($receiver));
        $invoker->run();
        $this->assertSame('Hello World', $receiver->getOutput());

		$hwcommand = new Command\HelloWorldCommand($receiver);
		$hwcommand->do();
		$invoker->run();

		$this->assertSame("Hello World\nHello World\nHello World", $receiver->getOutput());
		$hwcommand->undo();
		$this->assertSame("Hello World\nHello World", $receiver->getOutput());
	}
}
