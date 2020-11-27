<?php declare(strict_types=1);

/**
 * Factory Method Test
 * 
 * @category Design_Patterns
 * @package  Creational
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

use DesignPatterns\Creational\FactoryMethod;
use PHPUnit\Framework\TestCase;

/**
 * Testing Factory Method
 */
class FactoryMethodTest extends TestCase
{
    /**
     * Trying to create and validate the instruments 
     */
    public function testCreateInstruments(): void
    {
     
        $tambourineFactory = new FactoryMethod\TambourineFactory();
        $tambourine = $tambourineFactory->createInstrument();
        $this->assertInstanceOf(FactoryMethod\TambourineInstrument::class, $tambourine);

        $drumFactory = new FactoryMethod\DrumFactory();
        $drum = $drumFactory->createInstrument();
        $this->assertInstanceOf(FactoryMethod\DrumInstrument::class, $drum);

        $xylophoneFactory = new FactoryMethod\XylophoneFactory();
        $xylophone = $xylophoneFactory->createInstrument();
        $this->assertInstanceOf(FactoryMethod\XylophoneInstrument::class, $xylophone);
    }        

    /**
     *  Trying to play the instruments
     */
    public function testPlayInstruments(): void
    {
        $this->expectOutputString(
            "tambourine sound" .
            "drum sound" . 
            "xylophone sound"
        );

        $tambourineFactory = new FactoryMethod\TambourineFactory();
        $tambourine = $tambourineFactory->createInstrument();
        echo $tambourine->play();

        $drumFactory = new FactoryMethod\DrumFactory();
        $drum = $drumFactory->createInstrument();
        echo $drum->play();

        $xylophoneFactory = new FactoryMethod\XylophoneFactory();
        $xylophone = $xylophoneFactory->createInstrument();
        echo $xylophone->play();
    }
}
