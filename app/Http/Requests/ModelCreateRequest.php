<?php

namespace App\Http\Requests;

use App\Enums\FileExtensions;
use App\Enums\MimeType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rules\File;
use Closure;

/**
 * @property string name
 * @property string description
 */
class ModelCreateRequest extends FormRequest
{
    private const ACCEPTABLE_FILE_TYPES = [
        MimeType::JPG->value,
        MimeType::PNG->value,
        MimeType::OCTET_STREAM->value,
        MimeType::TEXT_PLAIN->value
    ];

    private const ACCEPTABLE_MODEL_FILE_EXTENSIONS = [
        FileExtensions::STL->value,
    ];

    private const ACCEPTABLE_FILE_EXTENSIONS = [
        FileExtensions::JPG->value,
        FileExtensions::JPEG->value,
        FileExtensions::JPE->value,
        FileExtensions::PNG->value,
        ...self::ACCEPTABLE_MODEL_FILE_EXTENSIONS
    ];

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'files.*' => [
                'required',
                File::types(self::ACCEPTABLE_FILE_TYPES)
                    ->min(0)
                    ->max(100 * 1024),
                static function (string $attribute, UploadedFile $value, Closure $fail) {
                    $preparedFilename = explode('.', $value->getClientOriginalName());
                    $fileExtension = end($preparedFilename);

                    $wrongExtension = !in_array(
                        strtolower($fileExtension),
                        self::ACCEPTABLE_FILE_EXTENSIONS
                    );

                    if ($wrongExtension) {
                        $fail("Расширение файла неверное!");
                    }
                },
            ],
            'files' => [
                'required',
                static function (string $attribute, array $value, Closure $fail) {
                    /** @var UploadedFile[] $value */
                    $totalSize = 0;
                    foreach ($value as $item) {
                        $totalSize += $item->getSize() / (8 * 1024 ** 2);
                    }

                    if ($totalSize > 200) {
                        $fail("Суммарный вес файлов больше 200Мб!");
                    }
                },
                static function (string $attribute, array $value, Closure $fail) {
                    /** @var UploadedFile[] $value */
                    $hasModelFile = false;
                    foreach ($value as $item) {
                        $preparedFilename = explode('.', $item->getClientOriginalName());
                        $fileExtension = end($preparedFilename);

                        $hasModelFile = in_array(strtolower($fileExtension), self::ACCEPTABLE_MODEL_FILE_EXTENSIONS);

                        if ($hasModelFile) {
                            break;
                        }
                    }

                    if (!$hasModelFile) {
                        $fail("Должен быть хоть один файл модели!");
                    }
                },
            ]
        ];
    }
}
