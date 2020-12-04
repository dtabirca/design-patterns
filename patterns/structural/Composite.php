<?php declare(strict_types=1);

/**
 * Composite Pattern
 * Lets you compose objects into tree structures and then work with these structures as if they were individual objects.
 * Composite's great feature is the ability to run methods recursively over the whole tree structure and sum up the results.`
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Structural\Composite;

/**
 * The base Component class declares common operations for both simple and
 * complex objects of a composition.
 */
abstract class HTMLTag
{
	protected $children;
	protected $parent;
	protected $tag;

	public function render(int $deep = 0): string
	{
		$tree = $this->tag . "\n";
		if ($this->canHaveChildren()) {
			$deep ++;
			foreach($this->children as $child) {
				$tree .= str_repeat("\x20", $deep) . $child->render($deep);
			}
		}
		return $tree;
	}

	public function __construct()
	{
		$this->children = new \SplObjectStorage();
	}

	public function addElement(HTMLTag $tag)
	{
		$this->children->attach($tag); 
	}

	public function removeElement(HTMLTag $tag)
	{
		$this->children->detach($tag); 
	}

	public function getParent(): HTMLTag
	{
		return $this->parent;
	}	

	public function setParent(HTMLTag $tag)
	{
		$this->parent = $tag;
	}

	public function getChildren(): \SplObjectStorage
	{
		return $this->children;
	}
}

/**
 * Sub-components
 * Composite objects delegate the actual work to their children and
 * then "sum-up" the result.
 */
class DivTag extends HTMLTag
{
	protected $tag = '<div>';

	public function canHaveChildren(): bool
	{
		return true;
	}	
}
class BrTag extends HTMLTag
{
	protected $tag = '<br>';

	public function canHaveChildren(): bool
	{
		return false;
	}	
}
class PTag extends HTMLTag
{
	protected $tag = '<p>';

	public function canHaveChildren(): bool
	{
		return true;
	}	
}
class InputTag extends HTMLTag
{
	protected $tag = '<input>';

	public function canHaveChildren(): bool
	{
		return false;
	}	
}

/**
 * The client code works with all of the components via the base interface.
 * Thanks to the fact that the child-management operations are declared in the
 * base Component class, the client code can work with any component, simple or
 * complex, without depending on their concrete classes.
 */
function clientCode(HTMLTag $tree){
	echo $tree->render();
}