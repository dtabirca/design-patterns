<?php declare(strict_types=1);

/**
 * NullObject 
 * 
 * Avoid "null" references by providing a default object.
 * The intent of a Null Object is to encapsulate the absence of an object by providing a substitutable alternative that offers suitable default "do nothing" behavior.
 * 
 * Reduces the chance of null pointer exceptions
 * It eliminates the conditional check in client code
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Behavioral\NullObject;

class Service
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * do something ...
     */
    public function doSomething()
    {
        // notice here that you don't have to check if the logger is set with eg. is_null(), instead just use it
        $this->logger->log('We are in '.__METHOD__);
    }
}

/**
 * Key feature: NullLogger must inherit from this interface like any other loggers
 */
interface Logger
{
    public function log(string $str);
}

class PrintLogger implements Logger
{
    public function log(string $str)
    {
        echo $str;
    }
}

class NullLogger implements Logger
{
    public function log(string $str)
    {
        // do nothing
    }
}

