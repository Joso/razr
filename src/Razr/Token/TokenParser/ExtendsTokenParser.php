<?php

namespace Razr\Token\TokenParser;

use Razr\Token\Token;
use Razr\Exception\SyntaxErrorException;

class ExtendsTokenParser extends TokenParser
{
    public function getTag()
    {
        return 'extends';
    }

    public function parse(Token $token)
    {
        if (!$this->parser->isMainScope()) {
            throw new SyntaxErrorException('Cannot extend from a block', $token->getLine(), $this->parser->getFilename());
        }

        if (null !== $this->parser->getParent()) {
            throw new SyntaxErrorException('Multiple extends tags are forbidden', $token->getLine(), $this->parser->getFilename());
        }

        $this->parser->setParent($this->parser->getExpressionParser()->parseExpression());
        $this->parser->getStream()->expect(Token::BLOCK_END);
    }
}
