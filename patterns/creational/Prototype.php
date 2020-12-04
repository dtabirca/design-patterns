<?php declare(strict_types=1);

/**
 * Prototype Pattern
 * Prototype – a pre-initialized object that supports cloning
 * When your objects have dozens of fields and hundreds of possible configurations, cloning them might serve as an alternative to subclassing.
 *
 * How to:
 * Create the prototype interface and declare the clone method in it.
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Creational\Prototype;

/**
 * Prototype class
 */
abstract class RoutePrototype
{
	protected $destination = [];
	protected $waypoints = [];
	protected $name;
	public static $clones = 0;

	public function __construct(string $name, array $destination, array $waypoints)
	{
		$this->name = $name;
		$this->destination = $destination;
		$this->waypoints = $waypoints;
	}

	public function __clone()
	{
		self::$clones++;
		$this->name = "Copy " . self::$clones . " of $this->name";
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function cloneRoute()
	{
		return clone $this;
	}
}

/**
 * Concrete Prototype
 */
class Route1 extends RoutePrototype
{ 
}

