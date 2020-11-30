<?php declare(strict_types=1);

/**
* Builder Method
* Builder is an interface that build parts of a complex object
* The intent of the Builder design pattern is to separate the construction of a complex object from its representation
* It lets you construct complex objects step by step
* Optional: The director class defines the order in which to execute the building steps, while the builder provides the implementation for those steps.
* 
* How to create it:
* Clearly define the common construction steps for building all available product representations and declare these steps in the base builder interface.
* Create a concrete builder class for each of the product representations and implement their construction steps.
* Implement a method for fetching the result of the construction; if you’re dealing with products from a single hierarchy, the fetching method can be safely added to the base interface
* A director class may encapsulate various ways to construct a product using the same builder object.
* In the client code, pass the builder object to the director
* 
* @category Design_Patterns
* @package  Creational
* @author   AltTab
* @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
* @link     https://github.com
*/

namespace DesignPatterns\Creational\Builder;

/**
 * builder class
 */
interface PCBuilder
{
	public function createComputer();
	public function addCase();
	public function addModerboard();
	public function addProcessor();
	public function addRAM();
	public function addGraphicsCard();
	public function getComputer(): Computer;
}

/**
 * builder subclass 1
 */
class AMDBuilder implements PCBuilder
{
	private AMDComputer $amdComputer;
	public function createComputer()
	{
		$this->amdComputer = new AMDComputer();
	}
	public function addCase()
	{
		$this->amdComputer->selectComponent('200W case', new PCCase());
	}
	public function addModerboard()
	{
		$this->amdComputer->selectComponent('AMD compatible motherboard', new Motherboard());
	}
	public function addProcessor()
	{
		$this->amdComputer->selectComponent('AMD processor', new Processor());
	}
	public function addRAM()
	{
		$this->amdComputer->selectComponent('DDR4 RAM', new RAM());		
	}
	public function addGraphicsCard()
	{
		$this->amdComputer->selectComponent('AMD graphics card', new GraphicsCard());		
	}	
	public function getComputer(): Computer
	{
		return $this->amdComputer;
	}
}

/**
 * builder subclass 2
 */
class IntelBuilder implements PCBuilder
{
	
	private IntelComputer $intelComputer;
	public function createComputer()
	{
		$this->intelComputer = new IntelComputer();
	}
	public function addCase()
	{
		$this->amdComputer->selectComponent('300W case', new PCCase());
	}
	public function addModerboard()
	{
		$this->amdComputer->selectComponent('Intel compatible motherboard', new Motherboard());
	}
	public function addProcessor()
	{
		$this->amdComputer->selectComponent('Intel processor', new Processor());
	}
	public function addRAM()
	{
		$this->amdComputer->selectComponent('DDR4 RAM', new RAM());		
	}
	public function addGraphicsCard()
	{
		$this->amdComputer->selectComponent('Nvidia graphics card', new GraphicsCard());		
	}	
	public function getComputer(): Computer
	{
		return $this->intelComputer;
	}
}

/**
 * product interface
 */
abstract class Computer
{
	private $components;
	public function selectComponent(string $name, object $component)
	{
		$this->components[] = $component;
	}
	public function showComponents()
	{
		return $this->components;
	}	
}

/**
 * product subclass 1
 */
class AMDComputer extends Computer
{	
}

/**
 * product subblass 2
 */
class IntelComputer extends Computer
{	
}

/**
 * product features
 */
class PCCase
{
}
class Motherboard
{
}
class RAM
{
}
class Processor
{
}
class GraphicsCard
{
}

/**
 * client class
 */
class CustomPC
{
	public function build(PCBuilder $builder): Computer
	{
		$builder->createComputer();
		$builder->addCase();
		$builder->addModerboard();
		$builder->addProcessor();
		$builder->addRAM();
		$builder->addGraphicsCard();

		return $builder->getComputer();
	}
}

/**
 * test
 * @var [type]
 */
//$pc = CustomPC::build(new AMDBuilder());
//var_dump($pc->showComponents());
