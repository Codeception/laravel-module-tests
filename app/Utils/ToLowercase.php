<?php

declare(strict_types=1);

namespace App\Utils;

use App\Utils\Contracts\StringConverterInterface;
use function strtolower;

final class ToLowercase implements StringConverterInterface
{
    public function convert(string $string): string
    {
        return strtolower($string);
    }
}
