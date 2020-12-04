<?php declare(strict_types=1);

/**
 * Adapter/wrapper Pattern
 * Adapter lets incompatible classes work together.
 * Converts the interface of a class into another interface clients expect. 
 *
 * How to:
 * Have at least two classes with incompatible interfaces:
 * A useful service class, which you can’t change (often 3rd-party, legacy or with lots of existing dependencies).
 * One or several client classes that would benefit from using the service class.
 * Declare the client interface and describe how clients communicate with the service.
 * Create the adapter class and make it follow the client interface. Add a field to the adapter class to store a reference to the service object. The common practice is to initialize this field via the constructor, but sometimes it’s more convenient to pass it to the adapter when calling its methods.
 * The adapter should delegate most of the real work to the service object, handling only the interface or data format conversion.
 * Clients should use the adapter via the client interface. This will let you change or extend the adapters without affecting the client code.
 *  
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Structural\Adapter;

/**
 * Target
 */
class SerialPort
{
	protected $data;
	public function __construct($data)
	{
		if ($this->iUnderstand($data)) {
			$this->data = $data;
		} else {
			throw new \InvalidArgumentException('wrong data format');
		}
	}
	public function iUnderstand($data)
	{
		if (is_string($data)) {
			return true;
		}
		return false;
	}
	public function doSomething()
	{
		return 'handeling data: ' . $this->data;
	}
}

/**
 * Adaptee
 */
class ParallelPort
{
	private $data = [];
	public function __construct($data)
	{
		$this->data = $data;
	}	
	public function getData(){
		return $this->data;
	}
}

/**
 * Adapter
 */
class PortAdapter extends SerialPort
{	
	public function __construct(ParallelPort $adaptee)
	{
		$this->data = implode(',', $adaptee->getData());
	}
}