<?php declare(strict_types=1);

/**
 * Iterator Test
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Behavioral\Iterator;
use PHPUnit\Framework\TestCase;

/**
 * Testing Iterator Pattern
 */
class IteratorTest extends TestCase
{
    /**
     * using iterator protocol
     */
    public function testAddRemoveCount(): void
    {

		$collection = new Iterator\DoorsCollection([]);
		$collection->addItem(new Iterator\Door(1,0));
		$collection->addItem(new Iterator\Door(2,1));
		$collection->addItem(new Iterator\Door(3,2));
		$iterator = $collection->getIterator();
		//echo "There are " . $iterator->count() . " doors.\n";
		//echo "Current door is " . $iterator->current()->getNumber() . "\n";
		$iterator->next();
		//echo "Next door is " . $iterator->current()->getNumber() . "\n";
		//echo "Removing current item.\n";
		$collection->removeItem($iterator->current()); 
		//echo "Adding new items.\n";
		$collection->addItem(new Iterator\Door(4,0));
		$collection->addItem(new Iterator\Door(5,1));
		//echo "Reordering items.\n";
		$iterator = new Iterator\DemoIterator($collection, true);

		//echo "Remaining doors:\n";
		// foreach ($iterator as $item) {
		// 	switch ($item->getState()){
		// 		case 2:
		// 			$state = 'locked';
		// 			break;
		// 		case 1:
		// 			$state = 'closed';
		// 			break;
		// 		case 0:
		// 		default:
		// 			$state = 'open';
		// 			break;						
		// 	}
		//    echo "Door #" .$item->getNumber() . " is " . $state . "\n";
		//}
		
		$this->assertSame(4, $iterator->count());
	}
}