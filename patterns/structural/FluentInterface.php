<?php declare(strict_types=1);

/**
 * Fluent Interface Pattern 
 * 
 * A Fluent Interface is an object oriented API that provides "more readable" code.
 * A fluent interface allows you to chain method calls, which results in less typed characters when applying multiple operations on the same object.
 * Fluent interfaces are considered evil when used in non-builder context.
 * 
 * @category Design_Patterns
 * @package  Structural
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Structural\FluentInterface;

/**
 * object containing multiple operations
 */
class Person{
    private $_name;
    private $_sex;
    private $_age;
    private $_height;
    private $_weight;

    /**
    * method returns the object in current state
    * after executing the operation
    */
    public function name($name){
        $this->_name = $name;
        return $this;
    }

    public function sex($sex){
        $this->_sex = $sex;
        return $this;
    }

    public function age($age){
        $this->_age = $age;
        return $this;
    }

    public function height($h){
        $this->_height = $h;
        return $this;
    }

    public function weight($w){
        $this->_weight = $w;
        return $this;
    }

    public function __toString(): string
    {
        $properties = get_object_vars($this);
        $str = '';
        foreach($properties as $property){
            $str .= $property.' ';
        }
        return $str;
    }
}

