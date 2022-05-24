<?php

namespace Impulze\Lipsum\Elements;

use Impulze\Lipsum\Format;
use Impulze\Lipsum\Size;

trait Header
{
    use Text;

    public function header(int $depth, int $options = Format::None): string
    {
        if (0 === $depth) {
            $depth = random_int(2, 6);
        }

        return '<h'.$depth.'>'.$this->text(Size::Single, $options).'</h'.$depth.'>'.PHP_EOL;
    }
}
