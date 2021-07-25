<?php

declare(strict_types=1);

namespace App\Http\Requests\WebSelf;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\ArrayShape;

class UserRegistryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape([
        'name' => "string",
        'email' => "string",
        'password' => "string",
        'avatar' => "string"
    ])]
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image'
        ];
    }

    public function getName(): string
    {
        return (string) $this->get('name');
    }

    public function getEmail(): string
    {
        return (string) $this->get('email');
    }

    public function getPassword(): string
    {
        return Hash::make($this->get('password'));
    }

    public function getAvatar(): ?string
    {
        if (!$this->hasFile('avatar')) {
            return null;
        }

        $folder = date('Y-m-d');
        $uploadedFiles = $this->file('avatar');
        return $uploadedFiles->store(sprintf('images/%s',$folder));
    }
}
