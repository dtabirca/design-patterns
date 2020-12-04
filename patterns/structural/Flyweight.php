<?php declare(strict_types=1);

/**
 * Flyweight Pattern 
 * Used to minimise memory usage, a Flyweight shares common parts of state between multiple similar objects instead of keeping all of the data in each object. It is needed when a large amount of objects is used that don’t differ much in state. A common practice is to hold state in external data structures and pass them to the flyweight object when needed.
 * How to:
 * Divide fields of a class that will become a flyweight into two parts:
 * the intrinsic state (the fields that contain unchanging data duplicated across many objects)
 * the extrinsic state (the fields that contain contextual data unique to each object)
 * Leave the fields that represent the intrinsic state in the class, but make sure they’re immutable. They should take their initial values only inside the constructor.
 * Go over methods that use fields of the extrinsic state. For each field used in the method, introduce a new parameter and use it instead of the field.
 * Optionally, create a factory class to manage the pool of flyweights. It should check for an existing flyweight before creating a new one. Once the factory is in place, clients must only request flyweights through it. They should describe the desired flyweight by passing its intrinsic state to the factory.
 * The client must store or calculate values of the extrinsic state (context) to be able to call methods of flyweight objects. For the sake of convenience, the extrinsic state along with the flyweight-referencing field may be moved to a separate context class.
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Structural\Flyweight;

/**
 * The Flyweight stores a common portion of the state (the intrinsic state)
 * The Flyweight accepts the rest of the state (extrinsic state, unique for each entity) 
 * via its method parameters.
 */
class Flyweight
{
    private $sharedState;

    public function __construct($sharedState)
    {
        $this->sharedState = $sharedState;
    }

    public function render($uniqueState): void
    {
        $s = json_encode($this->sharedState);
        $u = json_encode($uniqueState);
        echo "Flyweight: Displaying shared ($s) and unique ($u) state.\n";
    }
}

/**
 * The Flyweight Factory creates and manages the Flyweight objects. It ensures
 * that flyweights are shared correctly. When the client requests a flyweight,
 * the factory either returns an existing instance or creates a new one, if it
 * doesn't exist yet.
 */
class FlyweightFactory
{
    /**
     * @var Flyweight[]
     */
    private $flyweights = [];

    public function __construct(array $initialFlyweights)
    {
        foreach ($initialFlyweights as $state) {
            $this->flyweights[$this->getKey($state)] = new Flyweight($state);
        }
    }

    /**
     * Returns a Flyweight's string hash for a given state.
     */
    private function getKey(array $state): string
    {
        ksort($state);
        return implode("_", $state);
    }

    /**
     * Returns an existing Flyweight with a given state or creates a new one.
     */
    public function getFlyweight(array $sharedState): Flyweight
    {
        $key = $this->getKey($sharedState);

        if (!isset($this->flyweights[$key])) {
            echo "FlyweightFactory: Can't find a flyweight, creating new one.\n";
            $this->flyweights[$key] = new Flyweight($sharedState);
        } else {
            echo "FlyweightFactory: Reusing existing flyweight.\n";
        }

        return $this->flyweights[$key];
    }

    /**
     * count and display current flyweights 
     */
    public function listFlyweights(): int
    {
        $count = count($this->flyweights);
        echo "\nFlyweightFactory: I have $count flyweights:\n";
        foreach ($this->flyweights as $key => $flyweight) {
            echo $key . "\n";
        }
        return $count;
    }
}

function addUnitOnBattlefield(FlyweightFactory $ff, array $set)
{
	list($unit, $armor, $damage, $color, $position, $health) = $set;	
    echo "\nClient: Adding a unit to battlefield.\n";
    $flyweight = $ff->getFlyweight([$unit, $armor, $damage, $color]);

    // The client code either stores or calculates extrinsic state and passes it
    // to the flyweight's methods.
    $flyweight->render([$position, $health]);
}