<?php declare(strict_types=1);

/**
 * State
 * 
 * Allow an object to alter its behavior when its internal state changes, without resorting to large monolithic conditional statements. Encapsulate varying behavior for the same routine based on an object’s state.
 * 
 * Identify an existing class, or create a new class, that will serve as the State Machine (context, wrapper) from the client's perspective.
 * Create a State base class that replicates the methods of the State Machine interface. Each method takes one additional parameter: an instance of the wrapper class. The State base class specifies any useful "default" behavior.
 * Create a State derived class for each domain state. These derived classes only override the methods they need to override.
 * The wrapper class maintains a "current" State object.
 * All client requests to the wrapper class are simply delegated to the current State object, and the wrapper object's this pointer is passed.
 * The State methods change the "current" state in the wrapper object as appropriate.
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Behavioral\State;

/**
 * The Context defines the interface of interest to clients. It also maintains a
 * reference to an instance of a State subclass, which represents the current
 * state of the Context.
 */
class OrderContext
{
    /**
     * @var State A reference to the current state of the Context.
     */
    private State $state;

    public static function create(): OrderContext
    {
        $order = new self();
        $order->state = new StateCreated();

        return $order;
    }

    public function setState(State $state)
    {
        $this->state = $state;
    }

    /**
     * The Context allows changing the State object at runtime.
     */
    public function proceedToNext()
    {
        $this->state->proceedToNext($this);
    }

    public function toString()
    {
        return $this->state->toString();
    }
}

/**
 * The base State class declares methods that all Concrete State should
 * implement and also provides a backreference to the Context object, associated
 * with the State. This backreference can be used by States to transition the
 * Context to another State.
 */
interface State
{
    public function proceedToNext(OrderContext $context);
    public function toString(): string;
}

/**
 * Concrete States implement various behaviors, associated with a state of the
 * Context.
 */
class StateCreated implements State
{
    public function proceedToNext(OrderContext $context)
    {
        $context->setState(new StateShipped());
    }

    public function toString(): string
    {
        return 'created';
    }
}

class StateShipped implements State
{
    public function proceedToNext(OrderContext $context)
    {
        $context->setState(new StateDone());
    }

    public function toString(): string
    {
        return 'shipped';
    }
}

class StateDone implements State
{
    public function proceedToNext(OrderContext $context)
    {
        // there is nothing more to do
    }

    public function toString(): string
    {
        return 'done';
    }
}

