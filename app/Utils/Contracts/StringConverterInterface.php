<?php

declare(strict_types=1);

namespace App\Utils\Contracts;

interface StringConverterInterface
{
    public function convert(string $string): string;
}
