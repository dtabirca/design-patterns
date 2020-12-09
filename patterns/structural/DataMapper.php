<?php declare(strict_types=1);

/**
 * Data Mapper Pattern
 * 
 * A Data Mapper, is a Data Access Layer that performs bidirectional transfer of data between a persistent data store (often a relational database) and an in memory data representation (the domain layer). The goal of the pattern is to keep the in memory representation and the persistent data store independent of each other and the data mapper itself. The layer is composed of one or more mappers (or Data Access Objects), performing the data transfer. Mapper implementations vary in scope. Generic mappers will handle many different domain entity types, dedicated mappers will handle one or a few.
 * The key point of this pattern is, unlike Active Record pattern, the data model follows Single Responsibility Principle.
 * 
 * @category Design_Patterns
 * @package  Structural
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Structural\DataMapper;

/**
 * representation
 */
class User
{
	private $username;
	private $email;

	public function setUsername(string $username)
	{
		$this->username = $username;
	}

	public function setEmail(string $email)
	{
		$this->email = $email;
	}	

	public function getUsername(): string
	{
		return $this->username;
	}

	public function getEmail(): string
	{
		return $this->email;
	} 
}

/**
 * data storage
 */
class StorageAdapter
{
	private $data;

    public function __construct(string $data)
    {
    	// connect to database or take the db connection as argument , etc
    	$this->data = $data;
    }

    public function getData()
    {
    	return $this->data;
    }

    public function saveItem(string $item)
    {
    	$data   = json_decode($this->data, true);
    	$data[] = json_decode($item, true);
    	$this->data = json_encode($data);
    }    
}

/**
 * mapper
 */
class UserMapper{
    
    private StorageAdapter $adapter;

    public function __construct(StorageAdapter $storage)
    {
        $this->adapter = $storage;
    }

	public function fetchOne(): User
	{
		$data = json_decode($this->adapter->getData(), true);
		$item = array_pop($data);
		$user = new User();
		$user->setUsername($item['username']);
		$user->setEmail($item['email']);
		return $user;
	}

	public function fetchAll(): array
	{
		$collection = json_decode($this->adapter->getData(), true);
		$all = [];
		foreach ($collection as $item) {
			$user = new User();
			$user->setUsername($item['username']);
			$user->setEmail($item['email']);			
			$all[] = $user;
		}
		return $all;
	}

	public function userToStorage(User $user)
	{
		$data = ["username" => $user->getUsername(), "email" => $user->getEmail()];
		$this->adapter->saveItem(json_encode($data));
	}
}