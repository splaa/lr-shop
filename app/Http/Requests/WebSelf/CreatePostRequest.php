<?php

namespace App\Http\Requests\WebSelf;

use App\Models\WebSelf\Rubric;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Validation\Rules\Exists;

class CreatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape([
        'title' => "string[]",
        'content' => "string",
        'rubric_id' => Exists::class,
        'comment' => "string[]"
    ])] public function rules(): array
    {
        return [
           'title' => ['required', 'min:5', 'max:100'],
            'content' => 'required',
            'rubric_id' => Rule::exists('rubrics', 'id'),
            'comment' => ['nullable','string']
        ];
    }
}
