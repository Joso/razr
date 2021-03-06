<?php

namespace Razr\Node\Expression\Binary;

use Razr\Compiler;

class SubNode extends BinaryNode
{
    public function operator(Compiler $compiler)
    {
        return $compiler->raw('-');
    }
}
