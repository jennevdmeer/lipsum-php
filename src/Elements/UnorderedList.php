<?php

namespace Impulze\Lipsum\Elements;

use Impulze\Lipsum\Format;
use Impulze\Lipsum\Size;

trait UnorderedList
{
    use Text;

    public function unorderedList(
        int $listLength = Size::Short,
        int $itemSize = Size::Random,
        int $options = Format::None,
    ): string {
        if ($itemSize === Size::Random) {
            $itemSize = random_int(Size::Single, Size::Short);
        }

        $content = '<ul>'.PHP_EOL;
        for ($i = $listLength; $i > 0; $i--) {
            $content .= '<li>'.$this->text($itemSize, $options).'</li>'.PHP_EOL;
        }

        $content .= '</ul>'.PHP_EOL;

        return $content;
    }
}
