<?php

namespace Impulze\Lipsum\Elements;

use Impulze\Lipsum\Lipsum;
use Impulze\Lipsum\Size;
use RuntimeException;

trait Image
{
	public function image(int $size = Size::Random): string
    {
        $aspect = ((mt_rand() / mt_getrandmax()) * 0.5) + 0.5;

        return $this->imageByAspectRatio($aspect, $size);
    }

	public function imageByAspectRatio(float $aspect, int $size = Size::Random): string
    {
        if ($size === Size::Random) {
            $size = random_int(320, 1512);
        }

        $width = $size;
        $height = $size;

        if (Lipsum::isRandom(.75)) {
            $height = $width * $aspect;

            if (Lipsum::isRandom(.5)) {
                $tmp = $height;
                $height = $width;
                $width = $tmp;
            }
        }

        return $this->imageBySize($width, $height);
    }

	public function imageBySize(int $width, int $height): string
    {
        if (($width <= 0) || ($height <= 0)) {
            throw new RuntimeException('Image needs to be at least 1x1 pixels');
        }

        return sprintf(
            '<img src="https://placekitten.com/%d/%d" class="%s" alt="Placeholder">',
            $width,
            $height,
            Lipsum::isRandom(.5) ? 'align-left' : 'align-right',
        ).PHP_EOL;
	}
}
