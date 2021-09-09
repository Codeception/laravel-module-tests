<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\TestEvent;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

final class TestController
{
    public function session(Request $request, string $message): void
    {
        $request->session()->put('message', $message);
    }

    public function fireEvent(): void
    {
        TestEvent::dispatch();
    }

    public function testValue(): string
    {
        return 'Test value is: ' . config('test_value');
    }

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
