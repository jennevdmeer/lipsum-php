<?php

namespace Lens\Component\Lipsum\Dictionary;

abstract class Dictionary implements DictionaryInterface
{
    public const PHRASES = [];

    private static string $lastPhrase = '';

    public static function phrases(): array
    {
        return static::PHRASES;
    }

    public static function phrase(): string
    {
        do {
            $phrase = static::PHRASES[array_rand(static::PHRASES)];
        } while ($phrase === static::$lastPhrase);

        static::$lastPhrase = $phrase;

        return $phrase;
    }
}
