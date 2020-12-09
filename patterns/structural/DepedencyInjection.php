<?php declare(strict_types=1);

/**
 * DependencyInjection Pattern 
 * 
 * The Dependency Injection pattern means to add classes that another class depends to work when we instantiate it.
 * Dependency Injection helps avoid hard-coded dependencies
 * The dependencies can be changed at run time as well as compile time. We can use Dependency Injection to write modular, testable and maintainable code.
 * The Dependency Injection Container (also called Service Container) holds and injects dependencies  (like Cache, Storage, Database, Mail, Templating, etc) automatically.
 * Different Ways of Injecting Dependencies: Constructor Injection, Setter Injection, Interface Injection.
 * 
 * 
 * @category Design_Patterns
 * @package  Structural
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Structural\DependencyInjection;
use PDO;

/**
 * dependency implementation
 */
class DatabaseConfiguration
{
    private string $host;
    private int $port;
    private string $username;
    private string $password;

    public function __construct(string $host, int $port, string $username, string $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}

/**
 * constructor using the dependency
 */
class DatabaseConnection
{
    private DatabaseConfiguration $configuration;

    public function __construct(DatabaseConfiguration $config)
    {
        $this->configuration = $config;
    }

    public function connect(): PDO
    {
		try {
			$dns = 'mysql:host=' . $this->configuration->getHost() . ';port=' . $this->configuration->getPort() . ';charset=utf8';
		    $pdo = new PDO($dns, $this->configuration->getUsername(), $this->configuration->getPassword());	    
		    return $pdo;
		} catch (\PDOException $e) {
		     throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
    }
}