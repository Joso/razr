<?php

namespace Razr\Node;

use Razr\Compiler;

class BlockReferenceNode extends Node implements NodeOutputInterface
{
    public function __construct($name, $lineno, $tag = null)
    {
        parent::__construct(array(), compact('name'), $lineno, $tag);
    }

    public function compile(Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write(sprintf("\$this->displayBlock('%s', \$context, \$blocks);\n", $this->getAttribute('name')))
        ;
    }
}
