<?php declare(strict_types=1);

/**
 * Object Pool Pattern
 * 
 * The Object Pool pattern uses a set of initialized objects kept ready to use (a "pool"), rather than creating and destroying them on demand. The Pool represents a collection of items.
 * 
 * How to:
 * A client of the Pool will request an object from the Pool and perform operations on the returned object. When the client has finished, it returns the object to the pool.
 *
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Creational\ObjectPool;

/**
 * Pool class
 * Manages Objects
 */
class ScooterPool
{
	private $availableScooters = []; 
	private $inUseScooters = []; 

	public function addNewScooter(Scooter $s)
	{	
		$this->availableScooters[$s->getId()] = $s;
	}

	public function getFirstAvailableScooter(): Scooter
	{
		if (count($this->availableScooters) > 0) {
			$s = array_pop($this->availableScooters);
			return $s;
		}
		return null;
	}

	public function getSpecificScooter($id): Scooter
	{
		if (isset($this->availableScooters[$id])) {
			$s = array_pop($this->availableScooters);
			$this->useScooter($s);
			return $s;
		}
		return null;
	}

	public function useScooter(Scooter $s)
	{
		$this->inUseScooters[$s->getId()] = $s;
	}

	public function freeScooter(Scooter $s)
	{
		$this->availableScooters[$s->getId()] = $s;
		unset($this->inUseScooters[$s->getId()]);
	}	

	public function getAllAvailable(): array
	{
		return $this->availableScooters;
	}

	public function getAllInUse(): array
	{
		return $this->inUseScooters;
	}	
}

class Scooter
{
	private $id;

	public function __construct(){
		$this->id = spl_object_hash($this);
	}

	public function getId(): string
	{
		return $this->id;
	}
}