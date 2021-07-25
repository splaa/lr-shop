<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create.posts');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'unique:posts', 'max:100'],
            'content' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Название обязательно.',
            'title.unique' => 'Заголовок сообщения уже существует.'
        ];
    }
}
