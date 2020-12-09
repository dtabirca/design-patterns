<?php declare(strict_types=1);

/**
 * Mediator
 * 
 * Lets you reduce chaotic dependencies between objects. The pattern restricts direct communications between the objects and forces them to collaborate only via a mediator object.
 * Define an object that encapsulates how a set of objects(colleagues) interact. Mediator promotes loose coupling by keeping objects from referring to each other explicitly, and it allows their interaction to vary independently.
 * 
 * Identify a collection of interacting objects that would benefit from mutual decoupling.
 * Encapsulate those interactions in the abstraction of a new class.
 * Create an instance of that new class and rework all "peer" objects to interact with the Mediator only.
 * Balance the principle of decoupling with the principle of distributing responsibility evenly.
 * Be careful not to create a "controller" or "god" object. 
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Behavioral\Mediator;

/**
 * The Mediator interface declares a method used by components to notify the
 * mediator about various events. The Mediator may react to these events and
 * pass the execution to other components.
 */
interface Mediator
{
    public function displayUserRole(string $user): string;
}

/**
 * Concrete Mediators implement cooperative behavior by coordinating several
 * components.
 */
class ConcreteMediator implements Mediator
{
    private $component1;
    private $component2;

    public function __construct(UserComponent $c1, RoleComponent $c2)
    {
        $this->component1 = $c1;
        $this->component1->setMediator($this);
        $this->component2 = $c2;
        $this->component2->setMediator($this);
    }

    public function displayUserRole(string $user): string
    {
    	return $this->component2->hasRole($user); 
    }

    public function displayRoleUser(string $role): string
    {
    	return $this->component1->ownedBy($role); 
    }        
}

/**
 * The Base Component provides the basic functionality of storing a mediator's
 * instance inside component objects.
 */
abstract class BaseComponent
{
    protected $mediator;

    public function setMediator(Mediator $mediator): void
    {
        $this->mediator = $mediator;
    }
}

/**
 * Concrete Components implement various functionality. They don't depend on
 * other components. They also don't depend on any concrete mediator classes.
 */
class UserComponent extends BaseComponent
{
    public function showUserRole(string $user): string
    {
    	$data = 'User: ' . $user;
        $data .= $this->mediator->displayUserRole($user);
        return $data;
    }

    public function ownedBy(string $role): string
    {
    	return ' owned by user';
    }    
}

class RoleComponent extends BaseComponent
{
    public function hasRole(string $user): string
    {
		return ' has role admin';
    }

    public function showRoleUser(string $role): string
    {
    	$data = 'Role: ' . $role;
        $data .= $this->mediator->displayRoleUser($role);
        return $data;    	
    }
}