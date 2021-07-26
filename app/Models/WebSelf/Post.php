<?php

namespace App\Models\WebSelf;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * Class Post
 * @package App\Models\WebSelf
 * @mixin Builder
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'rubric_id', 'comment_id'
    ];

    public function rubric(): BelongsTo
    {
        return $this->belongsTo(Rubric::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getPostDate()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function SetTitleAttribute($title): void
    {
        $this->attributes['title'] = Str::title($title);
    }
}
