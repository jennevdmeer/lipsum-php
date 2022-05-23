<?php

namespace Lens\Component\Lipsum\Elements;

use Lens\Component\Lipsum\Format;
use Lens\Component\Lipsum\Size;

trait Blockquote
{
    use Text;

    public function blockquote(
        int $length = Size::Random,
        int $options = Format::None,
    ): string {
        return '<blockquote cite="#">'.$this->text($length, $options).'</blockquote>'.PHP_EOL;
    }
}
