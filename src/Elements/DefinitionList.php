<?php

namespace Lens\Component\Lipsum\Elements;

use Lens\Component\Lipsum\Format;
use Lens\Component\Lipsum\Lipsum;
use Lens\Component\Lipsum\Size;

trait DefinitionList
{
    use Text;

    public function definitionList(
        int $size = Size::Random,
        int $options = Format::None
    ): string {
        if ($size === Size::Random) {
            $size = random_int(Size::Tiny, Size::Long);
        }

        $content = '<dl>'.PHP_EOL;
        for ($i = $size; $i > 0; $i--) {
            $count = Lipsum::isRandom(0.2) ? random_int(2, 3) : 1;
            for ($j = $count; $j > 0; $j--) {
                $content .= '<dt><dfn>'.$this->text(Size::Single).'</dfn></dt>'.PHP_EOL;
            }

            $content .= '<dd>'.$this->text(
                random_int(Size::Single, Size::Short),
                $options,
            ).'</dd>'.PHP_EOL;
        }

        $content .= '</dl>'.PHP_EOL;

        return $content;
    }
}
