<?php

declare(strict_types=1);

namespace App\Utils;

use App\Utils\Contracts\StringConverterInterface;
use function str_repeat;

final class Repeat implements StringConverterInterface
{
    private int $times;

    public function __construct(int $times)
    {
        $this->times = $times;
    }

    public function convert(string $string): string
    {
        return str_repeat($string, $this->times);
    }
}
