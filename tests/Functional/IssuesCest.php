<?php

declare(strict_types=1);

namespace Tests\Functional;

use Codeception\Example;
use Illuminate\Http\UploadedFile;
use Tests\FunctionalTester;

final class IssuesCest
{
    const TEST_UPLOADED_FILE_NAME = 'potato.jpg';

    /**
     * @dataProvider fileProvider
     * @see https://github.com/Codeception/Codeception/pull/3417
     */
    public function submitArrayTestFiles(FunctionalTester $I, Example $example)
    {
        $fileName = self::TEST_UPLOADED_FILE_NAME;
        $filePath = codecept_data_dir($fileName);
        $files = [
            [
                'name' => $fileName,
                'tmp_name' => $filePath,
                'size' => filesize($filePath),
                'type' => mime_content_type($filePath),
                'error' => $example['upload_status']
            ]
        ];
        $response = $I->submitFiles($files);
        $I->assertSame($example['expected_response'], $response);
    }

    /**
     * @dataProvider fileProvider
     * @see https://github.com/Codeception/Codeception/pull/3417
     */
    public function submitUploadedFileTestFiles(FunctionalTester $I, Example $example)
    {
        $fileName = self::TEST_UPLOADED_FILE_NAME;
        $filePath = codecept_data_dir($fileName);
        $files = [
                new UploadedFile(
                    $filePath,
                    $fileName,
                    mime_content_type($filePath),
                    $example['upload_status'],
                    false
                )
        ];
        $response = $I->submitFiles($files);
        $I->assertSame($example['expected_response'], $response);
    }

    private function fileProvider(): array
    {
        return [
            [
                'upload_status' => UPLOAD_ERR_OK,
                'expected_response' => [self::TEST_UPLOADED_FILE_NAME => [UPLOAD_ERR_OK, true]]
            ],
            [
                'upload_status' => UPLOAD_ERR_INI_SIZE,
                'expected_response' => [self::TEST_UPLOADED_FILE_NAME => [UPLOAD_ERR_INI_SIZE, false]]
            ],
            [
                'upload_status' => UPLOAD_ERR_FORM_SIZE,
                'expected_response' => [self::TEST_UPLOADED_FILE_NAME => [UPLOAD_ERR_FORM_SIZE, false]]
            ],
            [
                'upload_status' => UPLOAD_ERR_PARTIAL,
                'expected_response' => [self::TEST_UPLOADED_FILE_NAME => [UPLOAD_ERR_PARTIAL, false]]
            ],
            [
                'upload_status' => UPLOAD_ERR_NO_TMP_DIR,
                'expected_response' => [self::TEST_UPLOADED_FILE_NAME => [UPLOAD_ERR_NO_TMP_DIR, false]]
            ],
            [
                'upload_status' => UPLOAD_ERR_CANT_WRITE,
                'expected_response' => [self::TEST_UPLOADED_FILE_NAME => [UPLOAD_ERR_CANT_WRITE, false]]
            ],
            [
                'upload_status' => UPLOAD_ERR_EXTENSION,
                'expected_response' => [self::TEST_UPLOADED_FILE_NAME => [UPLOAD_ERR_EXTENSION, false]]
            ],
        ];
    }
}
