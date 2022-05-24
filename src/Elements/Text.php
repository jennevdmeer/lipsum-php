<?php

namespace Impulze\Lipsum\Elements;

use Impulze\Lipsum\Dictionary\Dictionary;
use Impulze\Lipsum\Format;
use Impulze\Lipsum\Lipsum;
use Impulze\Lipsum\Size;

/**
 * @property-read Dictionary $dictionary
 */
trait Text
{
    public function text(
        int $length = Size::Random,
        int $options = Format::None,
    ): string {
        if ($length === Size::Random) {
            $length = random_int(Size::Tiny, Size::Long);
        }

        // Apply the 20% random length thing
        $length = random_int((int)round($length * 0.8), (int)round($length * 1.2));

        $content = '';
        for ($j = $length; $j > 0; $j--) {
            $phrase = $this->dictionary::phrase();

            if (Lipsum::hasFlag($options, Format::Decorate) || Lipsum::hasFlag($options, Format::All)) {
                if (Lipsum::isRandom(.07)) {
                    $content .= '<b>'.$phrase.'</b> ';
                    continue;
                }

                if (Lipsum::isRandom(.1)) {
                    $content .= '<i>'.$phrase.'</i> ';
                    continue;
                }

                if (Lipsum::isRandom(.03)) {
                    $content .= '<mark>'.$phrase.'</mark> ';
                    continue;
                }

                if (Lipsum::isRandom(.05)) {
                    $content .= '<q>'.$phrase.'</q> ';
                    continue;
                }
            }

            if (Lipsum::hasFlag($options, Format::Code) || Lipsum::hasFlag($options, Format::All)) {
                if (Lipsum::isRandom(.03)) {
                    $content .= '<code>'.$phrase.'</code> ';
                    continue;
                }

                if (Lipsum::isRandom(.015)) {
                    $content .= '<pre>'.$phrase.'</pre> ';
                    continue;
                }
            }

            if (Lipsum::hasFlag($options, Format::Link) || Lipsum::hasFlag($options, Format::All)) {
                if (Lipsum::isRandom(.03)) {
                    $content .= '<a href="#">'.$phrase.'</a> ';
                    continue;
                }
            }

            $content .= $phrase.' ';
        }

        return trim($content);
    }
}
