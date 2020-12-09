<?php declare(strict_types=1);

/**
 * Interpreter
 * 
 * Given a language, define a representation for its grammar along with an interpreter that uses the representation to interpret sentences in the language.
 * Map a domain to a language, the language to a grammar, and the grammar to a hierarchical object-oriented design.
 * 
 * How to:
 * Decide if a "little language" offers a justifiable return on investment.
 * Define a grammar for the language.
 * Map each production in the grammar to a class.
 * Organize the suite of classes into the structure of the Composite pattern.
 * Define an interpret(Context) method in the Composite hierarchy.
 * The Context object encapsulates the current state of the input and output as the former is parsed and the latter is accumulated. It is manipulated by each grammar class as the "interpreting" process transforms the input into the output.
 * 
 * @category Design_Patterns
 * @package  Behavioral
 * @author   AltTab
 * @license  WTFPL https://en.wikipedia.org/wiki/WTFPL
 * @link     https://github.com
 */

namespace DesignPatterns\Behavioral\Interpreter;

/**
 * abstract expression
 */
interface ExpressionInterface
{
    public function evaluate(array $context);
}

/**
 * concrete expresions
 */
/**
 * A terminal expression which is a literal value.
 */
class SimpleWord implements ExpressionInterface
{
	private $word;

	public function __construct(string $word)
	{
		$this->word = $word;
	}

	public function evaluate(array $context){
		return $this->word;
	}
}

/**
 * Nonterminal expression.
 */
class BoldWord implements ExpressionInterface
{
    private $word;

    public function __construct(SimpleWord $word)
    {
        $this->word = $word;
    }

    public function evaluate(array $context)
    {
        return '<b>' . $this->word->evaluate($context) . '</b>';
    }
}
class ItalicWord implements ExpressionInterface
{
    private $word;

    public function __construct(SimpleWord $word)
    {
        $this->word = $word;
    }

    public function evaluate(array $context)
    {
        return '<i>' . $this->word->evaluate($context) . '</i>';
    }
}
class UnderlinedWord implements ExpressionInterface
{
    private $word;

    public function __construct(SimpleWord $word)
    {
        $this->word = $word;
    }

    public function evaluate(array $context)
    {
        return '<u>' . $this->word->evaluate($context) . '</u>';
    }
}


/**
 * interpreter
 */
class Interpreter
{
    private $strExpression;

    public function __construct(string $strExpression)
    {
        $this->strExpression = $strExpression;
    }

    public function evaluate(array $context)
    {
    	$returnArr = [];
    	foreach (explode(' ', $this->strExpression) as $word) { 		
    		if ($word[0] == '*') {
    			$returnArr[] = (new BoldWord(new SimpleWord(substr($word, 1))))->evaluate($context);
    		} elseif ($word[0] == '#') {
    			$returnArr[] = (new ItalicWord(new SimpleWord(substr($word, 1))))->evaluate($context);
    		} elseif ($word[0] == '&') {
    			$returnArr[] = (new UnderlinedWord(new SimpleWord(substr($word, 1))))->evaluate($context);
    		} else {
    			$returnArr[] = (new SimpleWord($word))->evaluate($context);
    		}
    	}
        return implode(' ', $returnArr);
    }
}