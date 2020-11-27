<?php declare(strict_types=1);

/**
 * Factory Method
 *
 * A Factory class is basically an object for creating other objects
 * Replaces direct object construction calls (using the new operator) with calls to a special  factory method
 * 
 * The Factory Method:
 * Defines an Interface for creating an object (what functions must be available in the actual  factory)
 * Passes instantiation to subclasses. Lets subclasses decide which class to instantiate.
 * The subclasses can implement different ways to create the objects
 * Objects returned by a factory method are often referred to as Products
 * FactoryMethod class depends on abstractions, not concrete classes
 * 
 * How to create it:
 * Make all Products follow the same Interface
 * Add an empty factory method inside the Creator class. The return type of the method should match the common Product Interface.
 * Create a set of Creator subclasses for each type of Product
 * 
 * The Creator can be an abstract class, and the subclasses may implement an Interface by extending it.
 * The advantage of using an interface: subclasses can implement multiple interfaces
 * The advantage of usinf an abstract class: the Factory can also contain some functionality
 *
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * 	The product interface
 */
interface PercussionInstrument
{
	public function play();
}

/**
 * The creator
 */
interface PercussionInstrumentFactory
{
	public function createInstrument(): PercussionInstrument;
}

/**
 * 	Product subclass 1
 */
class TambourineInstrument implements PercussionInstrument
{
	public function play(){
		return 'tambourine sound';
	}
}

/**
 * 	Product subclass 2
 */
class DrumInstrument implements PercussionInstrument
{
	public function play(){
		return 'drum sound';
	}
}

/**
 * 	Product subclass 3
 */
class XylophoneInstrument implements PercussionInstrument
{
	public function play(){
		return 'xylophone sound';
	}
}

/**
 * 	Creator subclass 1
 */
class TambourineFactory implements PercussionInstrumentFactory
{
	public function createInstrument(): TambourineInstrument
	{
		return new TambourineInstrument();
	}
}

/**
 * 	Creator subclass 2
 */
class DrumFactory implements PercussionInstrumentFactory
{
	public function createInstrument(): DrumInstrument
	{
		return new DrumInstrument();
	}
}

/**
 * 	Creator subclass 3
 */
class XylophoneFactory implements PercussionInstrumentFactory
{
	public function createInstrument(): XylophoneInstrument
	{
		return new XylophoneInstrument();
	}
}