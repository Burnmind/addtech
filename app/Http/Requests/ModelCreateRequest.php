<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

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
                File::types(['jpg', 'jpeg', 'png', 'stl'])
                    ->min(0)
                    ->max(1024 * 1024)
            ]
        ];
    }
}
