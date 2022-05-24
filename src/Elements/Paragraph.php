<?php

namespace Impulze\Lipsum\Elements;

use Impulze\Lipsum\Format;
use Impulze\Lipsum\Size;

trait Paragraph
{
    use Text;

    public function paragraph(
        int $length = Size::Random,
        int $options = Format::None,
    ): string {
        return '<p>'.$this->text($length, $options).'</p>'.PHP_EOL;
    }
}
