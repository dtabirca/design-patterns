<?php declare(strict_types=1);

/**
 * Specification Test
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Behavioral\Specification;
use PHPUnit\Framework\TestCase;

/**
 * 
 */
class SpecificationTest extends TestCase
{
    public function testCanOr()
    {
        $spec1 = new Specification\PriceSpecification(50, 99);
        $spec2 = new Specification\PriceSpecification(101, 200);

        $orSpec = new Specification\OrSpecification($spec1, $spec2);
        $this->assertFalse($orSpec->isSatisfiedBy(new Specification\Item(100)));
        $this->assertTrue($orSpec->isSatisfiedBy(new Specification\Item(51)));
        $this->assertTrue($orSpec->isSatisfiedBy(new Specification\Item(150)));
    }

    public function testCanAnd()
    {
        $spec1 = new Specification\PriceSpecification(50, 100);
        $spec2 = new Specification\PriceSpecification(80, 200);

        $andSpec = new Specification\AndSpecification($spec1, $spec2);

        $this->assertFalse($andSpec->isSatisfiedBy(new Specification\Item(150)));
        $this->assertFalse($andSpec->isSatisfiedBy(new Specification\Item(1)));
        $this->assertFalse($andSpec->isSatisfiedBy(new Specification\Item(51)));
        $this->assertTrue($andSpec->isSatisfiedBy(new Specification\Item(100)));
    }

    public function testCanNot()
    {
        $spec1 = new Specification\PriceSpecification(50, 100);
        $notSpec = new Specification\NotSpecification($spec1);

        $this->assertTrue($notSpec->isSatisfiedBy(new Specification\Item(150)));
        $this->assertFalse($notSpec->isSatisfiedBy(new Specification\Item(50)));
    }
}


