<?php

namespace Impulze\Lipsum\Elements;

use Impulze\Lipsum\Format;
use Impulze\Lipsum\Size;

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
