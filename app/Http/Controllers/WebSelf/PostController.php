<?php

declare(strict_types=1);

namespace App\Http\Controllers\WebSelf;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebSelf\CreatePostRequest;
use App\RepositoryInterface\EloquentPostRepository;
use App\RepositoryInterface\PostRepositoryInterface;
use App\RepositoryInterface\PostRepositoryInterface as Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\NoReturn;

class PostController extends Controller
{
    protected PostRepositoryInterface $post;
    protected string $title;

    public function __construct(EloquentPostRepository $post, $title = 'Posts')
    {
        $this->post = $post;
        $this->title = $title;
    }

    public function index(): Factory|View|Application|Collection
    {
//        $posts = $this->post::orderByDesc('id')->paginate(6);
        $posts = $this->post::all();
dd('hello');

        return view('web-self.posts.index', [
            'title' => $this->title,
            'posts' => $posts
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('web-self.posts.create');
    }

    public function store(CreatePostRequest $request): Factory|View|Application
    {
        $post = $this->post::create($request->all() + ['comment_id' => 1]);
        $request->session()->flash('success', 'Post create success!!!');
        return view('web-self.posts.show', ['post' => $post]);
    }

    public function show(Post $post): Factory|View|Application
    {
        return view('web-self.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(int $id): Application|Factory|View
    {
        $title = $id ? 'Tile' : 'Title Empty';
        return view('web-self.posts.edit', [
            'id' => $id,
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    #[NoReturn]
    public function update(Request $request, int $id): Response
    {
        dd($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        dd($id);
    }
}
