<?php

namespace Tests\Http\Controllers\WebSelf;

use App\Http\Controllers\WebSelf\PostController;
use App\Models\WebSelf\Post;
use Eloquent;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;
use Mockery;
use Tests\TestCase;

class PostControllerTest extends TestCase
{

    private Mockery\LegacyMockInterface|Mockery\MockInterface|Eloquent $mock;

    public function __construct()
    {
        $this->mock = Mockery::mock('Eloquent', 'Post');
    }


    public function testMockIndex():void
    {
        $this->mock
            ->shouldReceive('paginate')
            ->once()
            ->andReturn('title');
//        $this->app->instance(Post::class, $this->mock);

//        $response = $this->get(route('web-self.posts.index'));


    }

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
