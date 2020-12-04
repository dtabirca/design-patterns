<?php declare(strict_types=1);

/**
 * Bridge Pattern
 * 
 * Split a large class or a set of closely related classes into two separate hierarchies (abstraction and implementation) which can be developed independently of each other.
 * 
 * How to:
 * Identify the orthogonal dimensions in your classes. These independent concepts could be: abstraction/platform, domain/infrastructure, front-end/back-end, or interface/implementation.
 * See what operations the client needs and define them in the base abstraction class.
 * Determine the operations available on all platforms. Declare the ones that the abstraction needs in the general implementation interface.
 * For all platforms in your domain create concrete implementation classes, but make sure they all follow the implementation interface.
 * Inside the abstraction class, add a reference field for the implementation type. The abstraction delegates most of the work to the implementation object that’s referenced in that field.
 * If you have several variants of high-level logic, create refined abstractions for each variant by extending the base abstraction class.
 * The client code should pass an implementation object to the abstraction’s constructor to associate one with the other. The client code should only depend on the Abstraction class. This way the client code can support any abstraction-implementation combination.
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Structural\Bridge;

/**
 * Bridge Abstraction
 * The Abstraction defines the interface for the "control" part of the two class
 * hierarchies. It maintains a reference to an object of the Implementation
 * hierarchy and delegates all of the real work to this object.
 */  
abstract class Service
{
    /**
     * @var Implementation
     */
    protected $implementation;
    protected $part;

    public function __construct(string $part, Operation $operation)
    {
    	$this->part = $part;
        $this->operation = $operation;
    }

	abstract public function action(): string;
}

/**
 * You can extend the Abstraction without changing the Implementation classes.
 */
class Repairs extends Service
{
    public function action(): string
    {
        return 'Repair ' . $this->part . ' with ' . $this->operation->action($this->part);
    }
}

class NewPartsShop extends Service
{
    public function action(): string
    {
        return 'Replace ' . $this->part . ' with ' . $this->operation->action($this->part);
    }
}

/**
 * The Implementation defines the interface for all implementation classes. It
 * doesn't have to match the Abstraction's interface. In fact, the two
 * interfaces can be entirely different. Typically the Implementation interface
 * provides only primitive operations, while the Abstraction defines higher-
 * level operations based on those primitives.
 */
interface Operation
{
	public function action(string $part): string;
}

/**
 * Each Concrete Implementation corresponds to a specific platform and
 * implements the Implementation interface using that platform's API.
 */
class RepairOperation implements Operation
{
    public function action(string $part): string
    {
        return "Repair Action for " . $part;
    }
}

class ReplaceOperation implements Operation
{
    public function action(string $part): string
    {
        return "Replace Action for " . $part;
    }
}