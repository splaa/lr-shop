<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['subject' => "string", 'body' => "string", 'article_id' => "string"])]
    public function rules(): array
    {
        return [
            'subject' => 'required|min:6',
            'body' => 'required|min:10',
            'article_id' => 'required'
        ];
    }
    #[ArrayShape([
        'subject.required' => "string",
        'subject.min' => "string",
        'body.required' => "string",
        'body.min' => "string"
    ])]
    public function messages(): array
    {
        return [
            'subject.required' => 'Это поле надо обязательно заполнить',
            'subject.min' => 'Это поле должно быть длиннее 6 символов',
            'body.required' => 'Это поле надо обязательно заполнить',
            'body.min' => 'Это поле должно быть длиннее 10 символов',
        ];
    }

    public function getSubject(): ?string
    {
        return $this->request->get('subject');
    }

    public function getBody(): ?string
    {
        return $this->request->get('body');
    }

    public function getArticleId(): ?int
    {
        return $this->request->get('article_id');
    }
}
