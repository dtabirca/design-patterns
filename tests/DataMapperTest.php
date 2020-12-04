<?php declare(strict_types=1);

/**
 * DataMapper Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Structural\DataMapper;
use PHPUnit\Framework\TestCase;

/**
 * Testing DataMapper Pattern
 */
class DataMapperTest extends TestCase
{
    /**
     * Testing Data Mapper
     */
    public function testMapper(): void
    {
        $storage = new DataMapper\StorageAdapter('[{"username":"samurai","email":"jack"},{"username":"johnny","email":"bravo"}]');
        $mapper = new DataMapper\UserMapper($storage);
        $user = $mapper->fetchOne();
        $this->assertInstanceOf(DataMapper\User::class, $user);
        // $user = new User();
        // $user->setUsername("rick");
        // $user->setEmail("morty");
        // $mapper->userToStorage($user);
        // $users = $mapper->fetchAll();
   }        
}