<?php

namespace Impulze\Lipsum;

class Format
{
    public const None = 0;
    public const Decorate = 1 << 0;
    public const Link = 1 << 1;
    public const OrderedList = 1 << 2;
    public const UnorderedList = 1 << 3;
    public const DefinitionList = 1 << 4;
    public const Blockquote = 1 << 5;
    public const Code = 1 << 6;
    public const Header = 1 << 7;
    public const Image = 1 << 8;
    public const All = 1 << 9;
}
