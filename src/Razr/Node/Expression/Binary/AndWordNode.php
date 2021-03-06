<?php

namespace Razr\Node\Expression\Binary;

use Razr\Compiler;

class AndWordNode extends BinaryNode
{
    public function operator(Compiler $compiler)
    {
        return $compiler->raw('and');
    }
}
