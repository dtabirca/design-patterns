<?php declare(strict_types=1);

/**
 * Facade Pattern 
 * 
 * The Facade class provides a simple interface to the complex logic of one or
 * several subsystems (library, a framework, an API, or any other complex set of classes).
 * The Facade delegates the client requests to the appropriate objects within the subsystem. The Facade is also responsible for managing their lifecycle. All of this shields the client from the undesired complexity of the subsystem.
 * 
 * The best facade has no "new" in it and had a constructor with interface-type-hinted parameters. If you need creation of new instances, use a Factory as argument.
 * If there are multiple creations for each method, it is not a Facade, it’s a Builder or a [Abstract|Static|Simple] Factory [Method].
 * 
 * @category Design_Patterns
 * @package  Structural
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Structural\Facade;

/**
 * The Facade class
 */
class Facade
{
    protected $subsystem1;
    protected $subsystem2;

    /**
     * provide the Facade with existing subsystem objects 
     * or force the Facade to create them on its own.
     */
    public function __construct(Subsystem1 $subsystem1, Subsystem2 $subsystem2)
    {
        $this->subsystem1 = new Subsystem1();
        $this->subsystem2 = new Subsystem2();
    }

    /**
     * The Facade's methods are convenient shortcuts to the complex
     * functionality of the subsystems.
     */
    public function operation(): string
    {
        $result = "Facade initializes subsystems:\n";
        $result .= $this->subsystem1->operation1();
        $result .= $this->subsystem2->operation1();
        $result .= "Facade orders subsystems to perform the action:\n";
        $result .= $this->subsystem1->operationN();
        $result .= $this->subsystem2->operationZ();

        return $result;
    }
}

/**
 * The Subsystem can accept requests either from the facade or client directly.
 */
class Subsystem1
{
    public function operation1(): string
    {
        return "Subsystem1: Ready!\n";
    }

    public function operationN(): string
    {
        return "Subsystem1: Go!\n";
    }
}

/**
 * Some facades can work with multiple subsystems at the same time.
 */
class Subsystem2
{
    public function operation1(): string
    {
        return "Subsystem2: Get ready!\n";
    }
    public function operationZ(): string
    {
        return "Subsystem2: Fire!\n";
    }
}

/**
 * The client code works with complex subsystems through a simple interface
 * provided by the Facade. When a facade manages the lifecycle of the subsystem,
 * the client might not even know about the existence of the subsystem. This
 * approach lets you keep the complexity under control.
 * 
 * The client code may have some of the subsystem's objects already created. In
 * this case, it might be worthwhile to initialize the Facade with these objects
 * instead of letting the Facade create new instances.
 */
function clientCode(Facade $facade)
{
	echo $facade->operation();
}