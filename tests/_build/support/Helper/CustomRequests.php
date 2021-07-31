<?php

declare(strict_types=1);

namespace Tests\Helper;

use Codeception\Module;
use Codeception\Module\Laravel;

class CustomRequests extends Module
{
    public function submitFiles(array $files): array
    {
        /** @var Laravel $laravelModule */
        $laravelModule = $this->getModule('Laravel');
        $response = $laravelModule->_request('POST', '/upload-files', [], $files);
        return json_decode($response, true);
    }
}
