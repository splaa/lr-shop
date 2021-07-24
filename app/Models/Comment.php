<?php

namespace App\Models;

use App\Models\WebSelf\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'body', 'article_id'];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function createdAtForHumans(): string
    {
        return $this->created_at->diffForHumans();
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'article_id');
    }
}
