<?php

namespace App\Http\Controllers\WebSelf;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebSelf\CreatePostRequest;
use App\Models\WebSelf\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(): Factory|View|Application
    {
        $title = 'Posts';
        $posts = Post::orderByDesc('id')->paginate(6);
        return view('web-self.posts.index', compact('title', 'posts'));
    }

    public function create(): Factory|View|Application
    {
        return view('web-self.posts.create');
    }

    public function store(CreatePostRequest $request): Factory|View|Application
    {
        $post = Post::create($request->all() + ['comment_id' => 1]);
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
     * @return Response
     */
    public function edit(int $id)
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, int $id)
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
