<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\State;
use App\Models\Tag;
use App\Models\WebSelf\Post;
use Database\Seeders\WebSelf\PostSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Post::class,
        ]);

        // \App\Models\User::factory(10)->create();

        $tags = Tag::factory(10)->create();

        $articles = Article::factory(20)->create();

        $tags_id = $tags->pluck('id');

            /** @var Article  $article */
        $articles->each(function ($article) use($tags_id){
            $article->tags()->attach($tags_id->random(3));
            Comment::factory(3)->create([
                'article_id' => $article->id
            ]);
            State::factory(1)->create([
                'article_id' => $article->id
            ]);

        });
    }
}
