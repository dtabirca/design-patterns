<?php declare(strict_types=1);

/**
 * Iterator
 *
 * Lets you traverse elements of a collection without exposing its underlying representation (list, stack, tree, etc.).
 * 
 * Add a create_iterator() method to the "collection" class, and grant the "iterator" class privileged access.
 * Design an "iterator" class that can encapsulate traversal of the "collection" class.
 * Clients ask the collection object to create an iterator object.
 * Clients use the iterator protocol to access the elements of the collection class.
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Behavioral\Iterator;

class Door
{
	private $number;
	private $state;

	public function __construct(int $number, int $state)
	{
		$this->number = $number;
		$this->state = $state;
	}

	public function getState()
	{
		return $this->state;
	}

	public function getNumber()
	{
		return $this->number;
	}	

	public function setState(int $state)
	{
		$this->state = $state;
	}
}

class DoorsCollection implements \IteratorAggregate
{
    private $items = [];

    public function __construct($items)
    {
    	$this->items = $items;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function removeItem($item)
    {
    	foreach ($this->items as $key => $obj) {
    		if ($obj->getNumber() == $item->getNumber()) {
    			unset($this->items[$key]);		
    		}
    	}
        $this->items = array_values($this->items);
    }    

    public function getIterator(): \Iterator
    {
        return new DemoIterator($this);
    }

    public function getReverseIterator(): \Iterator
    {
        return new DemoIterator($this, true);
    }
}
{

}
class DemoIterator implements \Countable, \Iterator
{
    /**
     * @var WordsCollection
     */
    private $collection;

    /**
     * @var int Stores the current traversal position. An iterator may have a
     * lot of other fields for storing iteration state, especially when it is
     * supposed to work with a particular kind of collection.
     */
    private $position = 0;

    /**
     * @var bool This variable indicates the traversal direction.
     */
    private $reverse = false;

    public function __construct($collection, $reverse = false)
    {
        $this->collection = $collection;
        $this->reverse = $reverse;
    }

    public function rewind()
    {
        $this->position = $this->reverse ?
            count($this->collection->getItems()) - 1 : 0;
    }

    public function current()
    {
        return $this->collection->getItems()[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position = $this->position + ($this->reverse ? -1 : 1);
    }

    public function valid()
    {
        return isset($this->collection->getItems()[$this->position]);
    }

    public function count()
    {
    	return count($this->collection->getItems());
    }
}