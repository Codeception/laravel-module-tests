<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\TestEvent;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

final class TestController
{
    public function fireEvent(): void
    {
        TestEvent::dispatch();
    }

    public function testValue(): string
    {
        $config = app()->get(Config::class);
        return 'Test value is: ' . $config->get('test_value');
    }

    /** @return array<string, array<bool|int>> */
    public function uploadFiles(Request $request): array
    {
        $response = [];
        /** @var UploadedFile $file */
        foreach ($request->allFiles() as $file) {
            $response[$file->getFilename()] = [$file->getError(), $file->isValid()];
        }

        return $response;
    }
}
