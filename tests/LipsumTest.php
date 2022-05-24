<?php declare(strict_types=1);

use Impulze\Lipsum\Dictionary\Latin;
use Impulze\Lipsum\Lipsum;
use PHPUnit\Framework\TestCase;

final class LipsumTest extends TestCase
{
    public function generateRandomCrap(): void
    {
        $lipsum = new Lipsum(new Latin());

        $this->assertIsString($lipsum->get());
    }
}
