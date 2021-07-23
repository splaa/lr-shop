<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;
use Str;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    #[ArrayShape(['id' => "mixed", 'label' => "string"])]
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'label' => Str::ucfirst($this->label)
        ];
    }
}
