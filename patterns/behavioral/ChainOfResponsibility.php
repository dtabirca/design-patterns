<?php declare(strict_types=1);

/**
 * ChainOfResponsibility
 * 
 * Used to build a chain of objects to handle a call in sequential order. If one object cannot handle a call, it delegates the call to the next in the chain and so forth.
 * 
 * How to:
 * Declare the handler interface and describe the signature of a method for handling requests.
 * Decide how the client will pass the request data into the method. The most flexible way is to convert the request into an object and pass it to the handling method as an argument.
 * To eliminate duplicate boilerplate code in concrete handlers, it might be worth creating an abstract base handler class, derived from the handler interface.
 * This class should have a field for storing a reference to the next handler in the chain. Consider making the class immutable. However, if you plan to modify chains at runtime, you need to define a setter for altering the value of the reference field.
 * You can also implement the convenient default behavior for the handling method, which is to forward the request to the next object unless there’s none left. Concrete handlers will be able to use this behavior by calling the parent method.
 * One by one create concrete handler subclasses and implement their handling methods. Each handler should decide if it will process the request or pass it along the chain.
 * The client may trigger any handler in the chain, not just the first one.
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

/**
 * The Handler interface declares a method for building the chain of handlers.
 * It also declares a method for executing a request.
 */
interface Handler
{
    public function linkNext(Handler $handler): Handler;
    public function handle(string $request): ?string;
}

/**
 * The default chaining behavior can be implemented inside a base handler class.
 */
abstract class AbstractHandler implements Handler
{
    private $nextHandler;

    public function linkNext(Handler $next): Handler
    {
        $this->nextHandler = $next;
        return $next;
    }
 
    public function handle(?string $request): ?string
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }
        return null;
    }
}

/**
 * All Concrete Handlers either handle a request or pass it to the next handler
 * in the chain.
 */
class PathValidator extends AbstractHandler
{
    public function handle(?string $request): ?string
    {
        $path = parse_url($request, PHP_URL_PATH);
        if ($path === "/test") {
            echo 'passing path validation';
            return parent::handle($request);// go on
        }
        return "didn't pass the path validator";
    }
}

class QueryValidator extends AbstractHandler
{
    public function handle(?string $request): ?string
    {
        parse_str(parse_url($request, PHP_URL_QUERY), $query);
        if (count($query) == 2) {
            echo 'passing query validation';
            return parent::handle($request);// go on
        }
        return "didn't pass the query validator";
    }
}

class IpFilter extends AbstractHandler
{
    public function handle(?string $request): ?string
    {    
        if (php_sapi_name() == 'cli' || $_SERVER['REMOTE_ADDR'] == "192.168.0.1") {
            echo 'passing ip validation';
            return parent::handle($request);// go on
        }
        return "didn't pass the ip filter";
    }
}