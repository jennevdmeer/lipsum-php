<?php

namespace Lens\Component\Lipsum\Elements;

use Lens\Component\Lipsum\Format;
use Lens\Component\Lipsum\Size;

trait OrderedList
{
    use Text;

    public function orderedList(
        int $listLength = Size::Short,
        int $itemSize = Size::Random,
        int $options = Format::None,
    ): string {
        $content = '<ol>'.PHP_EOL;
        for ($i = $listLength; $i > 0; $i--) {
            $content .= '<li>'.$this->text(
                $itemSize === Size::Random
                    ? random_int(Size::Single, Size::Short)
                    : $itemSize,
                $options,
            ).'</li>'.PHP_EOL;
        }

        $content .= '</ol>'.PHP_EOL;

        return $content;
    }
}
