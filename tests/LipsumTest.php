<?php declare(strict_types=1);

use Lens\Component\Lipsum\Dictionary\Latin;
use Lens\Component\Lipsum\Lipsum;
use PHPUnit\Framework\TestCase;

final class LipsumTest extends TestCase
{
    public function generateRandomCrap(): void
    {
        $lipsum = new Lipsum(new Latin());

        $this->assertIsString($lipsum->get());
    }
}
