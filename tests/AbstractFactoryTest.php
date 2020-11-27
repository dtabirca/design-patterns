<?php declare(strict_types=1);

/**
 * Abstract Factory Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Creational\AbstractFactory;
use PHPUnit\Framework\TestCase;

/**
 * Testing Abstract Factory
 */
class AbstractFactoryTest extends TestCase
{
    /**
     * Trying to create the instruments using Abstract types
     */
    public function testAbstractTypes(): void
    {
        $orchestra = new AbstractFactory\MarchingBand();
        $instrumentA = $orchestra->addPercussion();
        $instrumentB = $orchestra->addWindInstrument();
        $this->assertInstanceOf(AbstractFactory\BassDrum::class, $instrumentA);
        $this->assertInstanceOf(AbstractFactory\Trumpet::class, $instrumentB);

        $orchestra = new AbstractFactory\ChamberOrchestra();
        $instrumentA = $orchestra->addPercussion();
        $instrumentB = $orchestra->addWindInstrument();
        $this->assertInstanceOf(AbstractFactory\Xylophone::class, $instrumentA);
        $this->assertInstanceOf(AbstractFactory\Flute::class, $instrumentB);          
    }

    /**
     * Playing the instruments
     */
    public function testPlay(): void
    {
        $this->expectOutputString(
            "flute vibrate sound\n" .
            "xylophone beat sound\n"
        );

        $orchestra = new AbstractFactory\ChamberOrchestra();
        $instrumentA = $orchestra->addPercussion();
        $instrumentB = $orchestra->addWindInstrument();
        echo $instrumentB->vibrate() . "\n";
        echo $instrumentB->tempo($instrumentA) . "\n";              
    }        
}
