<?php declare(strict_types=1);

/**
 * Object Pool Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Creational\ObjectPool;
use PHPUnit\Framework\TestCase;

/**
 * Testing Object Pool pattern
 */
class ObjectPoolTest extends TestCase
{
    /**
     * Trying to manage objects from Pool
     */
    public function testCountObjectsFromPool(): void
    {
        $pool = new ObjectPool\ScooterPool();
        $pool->addNewScooter(new ObjectPool\Scooter());
        $pool->addNewScooter(new ObjectPool\Scooter());
        $pool->addNewScooter(new ObjectPool\Scooter());
        $this->assertEquals(count($pool->getAllAvailable()), 3);
        $this->assertEquals(count($pool->getAllInUse()), 0);

        $s = $pool->getFirstAvailableScooter();
        $pool->useScooter($s);
        $this->assertEquals(count($pool->getAllAvailable()), 2);
        $this->assertEquals(count($pool->getAllInUse()), 1);

        $pool->freeScooter($s);
        $this->assertEquals(count($pool->getAllAvailable()), 3);
        $this->assertEquals(count($pool->getAllInUse()), 0);
        
    }
}
