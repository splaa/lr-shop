<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'body', 'img', 'slug'
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function state(): HasOne
    {
        return $this->hasOne(State::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getBodyPreview()
    {
        return Str::limit($this->body, 100);
    }

    public function createdAtForHumans()
    {
        return $this->created_at->diffForHumans();
    }

    public function scopeLastLimit($query, $numbers)
    {
        return $query->with('state', 'tags')->orderBy('created_at', 'desc')->limit($numbers)->get();
    }
}
