<?php declare(strict_types=1);

/**
 * Abstract Factory
 * 
 * The Abstract Factory pattern is a method to build collections of factories
 * Provides an interface for creating families of related or dependent objects, a way to encapsulate a group of individual factories that have a common theme, without specifying their concrete classes.
 * Use the Abstract Factory when your code needs to work with various families of related products, but you don’t want it to depend on the concrete classes of those products—they might be unknown beforehand or you simply want to allow for future extensibility.
 *
 * How to create it:
 * Declare interfaces for each distinct product of the product family
 * Make all variants of products follow those interfaces.
 * Declare the Abstract Factory (an interface with a list of creation methods for all abstract products that are part of the product family)
 * Create a separate factory class for each variant of a product family based on the AbstractFactory interface
 * instantiate one of the concrete factory classes; pass this factory object to all classes that construct products.
 * To create products call the appropriate creation method on the factory object
 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * Abstract factory
 * Declares a set of methods that return different abstract products (a family of products)
 */
interface Orchestra
{
	public function addPercussion(): Percussion;
	public function addWindInstrument(): WindInstrument;		
}

/**
 * Concrete factory 1
 * Creates a family of products that belong to a single variant
 * Methods return an abstract product, while inside the method a concrete product is instantiated
 */
class MarchingBand implements Orchestra
{
	public function addPercussion(): Percussion
	{
		return new BassDrum();
	}
	public function addWindInstrument(): WindInstrument
	{
		return new Trumpet();
	}			
}

/**
 * Concrete factory 2
 */
class ChamberOrchestra implements Orchestra
{
	public function addPercussion(): Percussion
	{
		return new Xylophone();
	}
	public function addWindInstrument(): WindInstrument
	{
		return new Flute();
	}	
}

/**
 * Product Base Interface 1
 * Each distinct product of a product family should have a base interface
 * All variants of the product must implement this interface.
 */
interface Percussion
{
	public function beat(): string;
}

/**
 * Product Base Interface 2
 * Collaboration between products (getting a different product variant as argument)
 */
interface WindInstrument
{
	public function vibrate(): string;
	public function tempo(Percussion $percussion): string;
}

/**
 * Concrete Product 1
 * Concrete Products are created by corresponding Concrete Factories.
 */
class BassDrum implements Percussion
{
	public function beat(): string
	{
		return 'bass drum beat sound';
	}
}

/**
 * Concrete Product 2
 */
class Xylophone implements Percussion
{
	public function beat(): string
	{
		return 'xylophone beat sound';
	}
}

/**
 * Concrete Product 3
 */
class Trumpet implements WindInstrument
{
	public function vibrate(): string
	{
		return 'trumpet vibrate sound';
	}
	public function tempo(Percussion $percussion): string
	{
		return $percussion->beat();
	}
}

/**
 * Concrete Product 4
 */
class Flute implements WindInstrument
{
	public function vibrate(): string
	{
		return 'flute vibrate sound';
	}
	public function tempo(Percussion $percussion): string
	{
		return $percussion->beat();
	}
}

/**
 * The Client code works with factories and creates products only through abstract types
 * This lets you pass any concrete factory to the Client code without breaking it.
 */
function play(Orchestra $factory)
{
    $instrumentA = $factory->addPercussion();
    $instrumentB = $factory->addWindInstrument();

    echo $instrumentB->vibrate() . "\n";
    echo $instrumentB->tempo($instrumentA) . "\n";
}
play(new MarchingBand());
play(new ChamberOrchestra());