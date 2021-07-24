<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return[
            'id' => $this->id,
            'subject' => $this->subject,
            'body' => $this->body,
            'created_at' => $this->createdAtForHumans(),
        ];
    }
}
