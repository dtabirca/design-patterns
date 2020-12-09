<?php declare(strict_types=1);

/**
 * Composite Test
 * 
 * @category Design_Patterns
 * @package  Structural
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Structural\Composite;
use PHPUnit\Framework\TestCase;

/**
 * Testing Composite Pattern
 */
class CompositeTest extends TestCase
{
    /**
     * Testing tree structure
     */
    public function testTree(): void
    {
        $tree = new Composite\DivTag();
        $branch1 = new Composite\DivTag();
        $branch1P = new Composite\PTag();
        $branch1P->addElement(new Composite\InputTag());
        $branch1->addElement($branch1P);
        $tree->addElement($branch1);
        $tree->addElement(new Composite\BrTag());
        $branch2 = new Composite\DivTag();
        $branch2P = new Composite\PTag();
        $branch2P->addElement(new Composite\InputTag());
        $branch2->addElement($branch2P);
        $tree->addElement($branch2);
        $this->expectOutputString(
            "<div>\n" .
                "\x20<div>\n" .
                    "\x20\x20<p>\n" .
                        "\x20\x20\x20<input>\n" .
                "\x20<br>\n" .                         
                "\x20<div>\n" .
                    "\x20\x20<p>\n" .
                        "\x20\x20\x20<input>\n"
        );          
        Composite\clientCode($tree);
   }        
}