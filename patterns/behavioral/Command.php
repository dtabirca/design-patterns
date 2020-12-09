<?php declare(strict_types=1);

/**
 * Command
 * 
 * Turns a request into a stand-alone object that contains all information about the request. This transformation lets you parameterize methods with different requests, delay or queue a request’s execution, and support undoable operations.
 * An abstract/interface type (sender) invokes a method in an implementation of a different abstract/interface type (receiver) which has been encapsulated by the command implementation during its creation.
 * It’s used for queueing tasks, tracking the history of executed tasks and performing the “undo”.
 * 
 * How to:
 * Declare the command interface with a single execution method.
 * Start extracting requests into concrete command classes that implement the command interface. Each class must have a set of fields for storing the request arguments along with a reference to the actual receiver object. All these values must be initialized via the command’s constructor.
 * Identify classes that will act as senders. Add the fields for storing commands into these classes. Senders should communicate with their commands only via the command interface. Senders usually don’t create command objects on their own, but rather get them from the client code.
 * Change the senders so they execute the command instead of sending a request to the receiver directly.
 * The client should initialize objects in the following order: receivers, commands (associated with receivers), senders (associated with commands)
 *  
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Behavioral\Command;


/**
 * The Command interface declares a method for executing a command.
 */
interface Command
{
    /**
     * this is the most important method in the Command pattern,
     * The Receiver goes in the constructor.
     */	
    public function do(): void;
    /**
     * This method is used to undo change made by command execution
     */
    public function undo(): void;    
}

/**
 * This concrete command calls "print" on the Receiver, but an external
 * invoker just knows that it can call "execute"
 */
class HelloWorldCommand implements Command
{
    private Receiver $output;

    /**
     * Each concrete command is built with different receivers.
     * There can be one, many or completely no receivers, but there can be other commands in the parameters
     */
    public function __construct(Receiver $console)
    {
        $this->output = $console;
    }

    /**
     * execute
     */
    public function do(): void
    {
        // sometimes, there is no receiver and this is the command which does all the work
        $this->output->insert('Hello World');
    }

    /**
     * Undo the command
     */
    public function undo(): void
    {
        $this->output->delete('Hello World');
    }    
}


/**
 * Receiver is a specific service with its own contract and can be only concrete.
 */
class Receiver
{
    private bool $enableDate = false;

    /**
     * @var string[]
     */
    private array $output = [];

    public function insert(string $str)
    {
        $this->output[] = $str;
    }

    public function getOutput(): string
    {
        return implode("\n", $this->output);
    }

    public function delete(string $str)
    {
    	if ($index = array_search($str, $this->output) !== FALSE) {
    		unset($this->output[$index]);
    	}
    }
}

/**
 * Invoker is using the command given to it.
 */
class Invoker
{
    private Command $command;

    /**
     * in the invoker we find this kind of method for subscribing the command
     * There can be also a stack, a list, a fixed set ...
     */
    public function setCommand(Command $cmd)
    {
        $this->command = $cmd;
    }

    /**
     * executes the command; the invoker is the same whatever is the command
     */
    public function run()
    {
        $this->command->do();
    }
}