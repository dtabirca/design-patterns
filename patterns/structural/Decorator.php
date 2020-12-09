<?php declare(strict_types=1);

/**
 * Decorator Pattern 
 * 
 * This pattern allows us to add new behavior to an object by placing these objects inside special wrapper objects that contain the behaviors (Dynamically adds new functionality to class instances during runtime)
 * Decorators provide a flexible alternative to subclassing for extending functionality.
 * 
 * @category Design_Patterns
 * @package  Structural
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Structural\Decorator;

/**
 * The base interface defines operations that can be altered by
 * decorators.
 */
interface Pizza
{
    public function getIngredients(): string;
}

/**
 * Default implementations of the operations.
 */
class BasicPizza implements Pizza
{
    public function getIngredients(): string
    {
        return 'dough, olive oil, tomato sauce, mozzarella';
    }
}
class VeganPizza implements Pizza
{
    public function getIngredients(): string
    {
		return 'dough, olive oil, tomato sauce, olives';
    }	
}

/**
 * The base Decorator class follows the same interface as the other components.
 * The primary purpose of this class is to define the wrapping interface for all
 * concrete decorators. The default implementation of the wrapping code might
 * include a field for storing a wrapped component and the means to initialize
 * it.
 */
class PizzaVariation implements Pizza
{
    /**
     * @var Pizza
     */
    protected $base;

    public function __construct(Pizza $base)
    {
        $this->base = $base;
    }

    /**
     * The Decorator delegates all work to the wrapped component.
     */
    public function getIngredients(): string
    {
        return $this->base->getIngredients();
    }
}

/**
 * Concrete Decorators call the wrapped object and alter its result in some way.
 */
class PizzaProsciutto extends PizzaVariation
{
    /**
     * Decorators may call parent implementation of the operation, instead of
     * calling the wrapped object directly. This approach simplifies extension
     * of decorator classes.
     */
    public function getIngredients(): string
    {
        return parent::getIngredients() . ', prosciutto';
    }
}

/**
 * Decorators can execute their behavior either before or after the call to a
 * wrapped object.
 */
class PizzaFunghi extends PizzaVariation
{
    public function getIngredients(): string
    {
        return $this->base->getIngredients() . ', funghi';
    }
}

/**
 * The client code works with all objects using the base interface. This
 * way it can stay independent of the concrete classes of components it works
 * with.
 * Decorators can wrap not only simple components but the other decorators as well.
 * Client code can support both.
 */
function clientCode(Pizza $pizza)
{
    echo "RESULT: " . $pizza->getIngredients() . "\n";
}