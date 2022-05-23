<?php

namespace Lens\Component\Lipsum\Elements;

use Lens\Component\Lipsum\Format;
use Lens\Component\Lipsum\Size;

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
