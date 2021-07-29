<?php

namespace Tests\Http\Controllers\WebSelf;

use App\Http\Controllers\WebSelf\PostController;
use App\Models\WebSelf\Post;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    public function testIndex(): void
    {
        $response = $this->get(route('web-self.posts.index'));

        $response->assertStatus(200);
        $response->assertSee('Posts');
        $response->assertViewHas('title', 'Posts');
        $response->assertViewHasAll(['title','posts']);
        $posts = $response->getOriginalContent()->getData()['posts'];

        /** @var View $view */
        $view = $response->original;
        $posts = $view->getData()['posts'];
        $this->assertInstanceOf(LengthAwarePaginator::class, $posts);
    }
}
