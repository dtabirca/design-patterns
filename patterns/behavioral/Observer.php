<?php declare(strict_types=1);

/**
 * Observer
 * 
 * Lets you define a one-to-many subscription mechanism to notify multiple objects about any events that happen to the object they’re observing.
 * Differentiate between the core (or independent) functionality and the optional (or dependent) functionality.
 * 
 * Model the independent functionality with a "subject" (subscriber) abstraction
 * Model the dependent functionality with an "observer" (publisher) hierarchy and describe a pair of methods for adding a subject object to and removing it from the list.
 * The Subject is coupled only to the Observer base class.
 * The client configures the number and type of Observers.
 * Observers register themselves with the Subject.
 * The Subject broadcasts events to all registered Observers.
 * The Subject may "push" information at the Observers, or, the Observers may "pull" the information they need from the Subject.
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Behavioral\Observer;

/**
 * PHP has a couple of built-in interfaces related to the Observer pattern.
 *
 * Here's what the Subject interface looks like:
 *
 * @link http://php.net/manual/en/class.splsubject.php
 *
 *     interface SplSubject
 *     {
 *         // Attach an observer to the subject.
 *         public function attach(SplObserver $observer);
 *
 *         // Detach an observer from the subject.
 *         public function detach(SplObserver $observer);
 *
 *         // Notify all observers about an event.
 *         public function notify();
 *     }
 *
 * There's also a built-in interface for Observers:
 *
 * @link http://php.net/manual/en/class.splobserver.php
 *
 *     interface SplObserver
 *     {
 *         public function update(SplSubject $subject);
 *     }
 */

/**
 * The Subject owns some important state and notifies observers when the state
 * changes.
 */
class Subject implements \SplSubject
{
    /**
     * @var int For the sake of simplicity, the Subject's state, essential to
     * all subscribers, is stored in this variable.
     */
    public $state;

    /**
     * @var \SplObjectStorage List of subscribers. In real life, the list of
     * subscribers can be stored more comprehensively (categorized by event
     * type, etc.).
     */
    private $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
        $this->state = true;
    }

    /**
     * The subscription management methods.
     */
    public function attach(\SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    /**
     * Trigger an update in each subscriber.
     */
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * Usually, the subscription logic is only a fraction of what a Subject can
     * really do. Subjects commonly hold some important business logic, that
     * triggers a notification method whenever something important is about to
     * happen (or after it).
     */
    public function someBusinessLogic(): void
    {
        $this->state = !$this->state;
        $this->notify();
    }
}

/**
 * Concrete Observers react to the updates issued by the Subject they had been
 * attached to.
 */
class ConcreteObserverA implements \SplObserver
{
    public function update(\SplSubject $subject): void
    {
        if ($subject->state) {
            echo "ConcreteObserverA: react to state TRUE.\n";
        }
    }
}

class ConcreteObserverB implements \SplObserver
{
    public function update(\SplSubject $subject): void
    {
        if (!$subject->state) {
            echo "ConcreteObserverB: react to state FALSE.\n";
        }
    }
}