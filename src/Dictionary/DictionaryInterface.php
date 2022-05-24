<?php

namespace Impulze\Lipsum\Dictionary;

interface DictionaryInterface
{
    /** @return string[] */
    public static function phrases(): array;

    public static function phrase(): string;
}
