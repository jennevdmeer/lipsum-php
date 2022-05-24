<?php

namespace Impulze\Lipsum;

use Impulze\Lipsum\Dictionary\Dictionary;

use Impulze\Lipsum\Elements\Blockquote;
use Impulze\Lipsum\Elements\DefinitionList;
use Impulze\Lipsum\Elements\Header;
use Impulze\Lipsum\Elements\Image;
use Impulze\Lipsum\Elements\OrderedList;
use Impulze\Lipsum\Elements\Paragraph;
use Impulze\Lipsum\Elements\Text;
use Impulze\Lipsum\Elements\UnorderedList;

/**
 * @method string blockquote(int $length = Size::Random, int $options = Format::None)
 * @method string definitionList(int $size = Size::Random, int $options = Format::None)
 * @method string header(int $depth, int $options = Format::None)
 * @method string image(int $size = Size::Random)
 * @method string imageByAspectRatio(float $aspect, int $size = Size::Random)
 * @method string imageBySize(int $width, int $height)
 * @method string orderedList(int $listLength = Size::Short, int $itemSize = Size::Random, int $options = Format::None)
 * @method string paragraph(int $length = Size::Random, int $options = Format::None)
 * @method string text(int $length = Size::Random, int $options = Format::None)
 * @method string unorderedList(int $listLength = Size::Short, int $itemSize = Size::Random, int $options = Format::None)
 */
class Lipsum
{
    public function __construct(
        private Dictionary $dictionary,
    ) {
    }

    use Blockquote;
    use DefinitionList;
    use Header;
    use Image;
    use OrderedList;
    use Paragraph;
    use Text;
    use UnorderedList;

    public function get(
        int $paragraphCount = Size::Medium,
        int $paragraphLength = Size::Long,
        int $options = Format::All,
    ): string {
        $counter = [
            Blockquote::class => 0,
            DefinitionList::class => 0,
            Header::class => 0,
            Image::class => 0,
            OrderedList::class => 0,
            Paragraph::class => 0,
            UnorderedList::class => 0,
        ];

        $content = '';

        for ($i = 1; $i <= $paragraphCount; $i++) {
            if (self::hasFlag($options, Format::Header) || self::hasFlag($options, Format::All)) {
                if ($i === 1) {
                    $content .= $this->header(1, $options);
                    $counter[Header::class]++;
                } else if (self::isRandom(.15)) {
                    $content .= $this->header(Size::Random, $options);
                    $counter[Header::class]++;
                }
            }

            $content .= $this->paragraph($paragraphLength, $options);

            if (self::hasFlag($options, Format::Blockquote) || self::hasFlag($options, Format::All)) {
                if (self::isRandom(.075)) {
                    $content .= $this->blockquote(options: $options);
                    $counter[Blockquote::class]++;
                }

                if (($i === $paragraphCount) && ($counter[Blockquote::class] === 0)) {
                    $content .= $this->blockquote(options: $options);
                    $counter[Blockquote::class]++;
                }
            }

            if (self::hasFlag($options, Format::DefinitionList) || self::hasFlag($options, Format::All)) {
                if (self::isRandom(.05)) {
                    $content .= $this->definitionList(options: $options);
                    $counter[DefinitionList::class]++;
                }

                if (($i === $paragraphCount) && ($counter[DefinitionList::class] === 0)) {
                    $content .= $this->definitionList(options: $options);
                    $counter[DefinitionList::class]++;
                }
            }

            if (self::hasFlag($options, Format::OrderedList) || self::hasFlag($options, Format::All)) {
                if (self::isRandom(.035)) {
                    $content .= $this->orderedList(options: $options);
                    $counter[OrderedList::class]++;
                }

                if (($i === $paragraphCount) && ($counter[OrderedList::class] === 0)) {
                    $content .= $this->orderedList(options: $options);
                    $counter[OrderedList::class]++;
                }
            }

            // Generate lists
            if (self::hasFlag($options, Format::UnorderedList) || self::hasFlag($options, Format::All)) {
                if (self::isRandom(.035)) {
                    $content .= $this->unorderedList(options: $options);
                    $counter[UnorderedList::class]++;
                }

                if (($i === $paragraphCount) && ($counter[UnorderedList::class] === 0)) {
                    $content .= $this->unorderedList(options: $options);
                    $counter[UnorderedList::class]++;
                }
            }

            // Generate images
            if (self::hasFlag($options, Format::All) || self::hasFlag($options, Format::Image)) {
                if (self::isRandom(.1)) {
                    $content .= $this->image();
                    $counter[Image::class]++;
                }

                if (($i === $paragraphCount) && ($counter[Image::class] === 0)) {
                    $content .= $this->image();
                    $counter[Image::class]++;
                }
            }
        }

        return $content;
    }

    private static function hasFlag(int $options, int $flag): bool
    {
        return ($options & $flag) === $flag;
    }

    private static function isRandom(float $chance): bool
    {
        return (mt_rand() / mt_getrandmax()) <= $chance;
    }
}
