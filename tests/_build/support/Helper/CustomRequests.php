<?php

declare(strict_types=1);

namespace Tests\Helper;

use Codeception\Module;
use Codeception\Module\Laravel;
use JsonException;
use Throwable;

final class CustomRequests extends Module
{
    public function submitFiles(array $files): array
    {
        /** @var Laravel $laravelModule */
        $laravelModule = $this->getModule('Laravel');
        $response = $laravelModule->_request('POST', '/api/upload-files', [], $files);
        try {
            $response = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $this->fail("Failed to decode json response from uploaded-files endpoint with json error code {$e->getCode()}");
        }

        return $response;
    }
}
