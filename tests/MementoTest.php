<?php declare(strict_types=1);

/**
 * Memento Test
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Behavioral\Memento;
use PHPUnit\Framework\TestCase;

/**
 * Testing Memento Pattern
 */
class MementoTest extends TestCase
{
    /**
     * Trying to clone prototyoe
     */
    public function testPortMemento(): void
    {