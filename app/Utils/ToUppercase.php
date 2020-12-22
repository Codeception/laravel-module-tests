<?php

declare(strict_types=1);

namespace App\Utils;

use App\Utils\Contracts\StringConverterInterface;
use function strtoupper;

final class ToUppercase implements StringConverterInterface
{
    public function convert(string $string): string
    {
        return strtoupper($string);
    }
}
