<?php

namespace App\Http\Requests;

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
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'files.*' => [
                'required',
                File::types([
                    MimeType::JPG->value,
                    MimeType::PNG->value,
                    MimeType::OCTET_STREAM->value,
                    MimeType::TEXT_PLAIN->value
                ])
                    ->min(0)
                    ->max(1024 * 1024),
                static function (string $attribute, UploadedFile $value, Closure $fail) {
                    $preparedFilename = explode('.', $value->getClientOriginalName());
                    $fileExtension = end($preparedFilename);
                    $wrongExtension = !in_array(
                        $fileExtension,
                        [
                            'jpeg', 'jpg', 'jpe',
                            'png',
                            'stl'
                        ]
                    );
                    if ($wrongExtension) {
                        $fail("Расширение файла неверное!");
                    }
                },
            ]
        ];
    }
}
