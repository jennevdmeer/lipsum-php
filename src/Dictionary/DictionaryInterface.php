<?php

namespace Lens\Component\Lipsum\Dictionary;

interface DictionaryInterface
{
    /** @return string[] */
    public static function phrases(): array;

    public static function phrase(): string;
}
