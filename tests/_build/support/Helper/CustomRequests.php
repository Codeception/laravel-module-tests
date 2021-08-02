<?php

declare(strict_types=1);

namespace Tests\Helper;

use Codeception\Module;
use Codeception\Module\Laravel;

final class CustomRequests extends Module
{
    public function submitFiles(array $files): array
    {
        /** @var Laravel $laravelModule */
        $laravelModule = $this->getModule('Laravel');
        $response = $laravelModule->_request('POST', '/api/upload-files', [], $files);
        $response = json_decode($response, true);

        $last_error = json_last_error();
        if ($last_error !== JSON_ERROR_NONE) {
            $this->fail("Failed to parse response from uploaded-files endpoint with json error code {$last_error}");
        }

        return $response;
    }
}
