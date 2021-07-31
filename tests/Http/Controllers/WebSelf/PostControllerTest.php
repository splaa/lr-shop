<?php

declare(strict_types=1);

namespace Tests\Http\Controllers\WebSelf;

use App\Models\User;
use App\Models\WebSelf\Post;
use App\RepositoryInterface\PostRepositoryInterface;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use WithFaker;

    public function testIndex(): void
    {
        $mock = Mockery::mock(PostRepositoryInterface::class);
        $mock->shouldReceive('all')->once();

        $this->app->instance(PostRepositoryInterface::class, $mock);

        $response = $this->get(route('ws.posts.index'));
        $this->assertViewHas('web-self.posts.index');



    }

//    public function testPostStore()
//    {
//        $this->instance(Post::class,
//            Mockery::mock(Post::class, function(MockInterface $mock){
//
//
//        })
//    }

}
