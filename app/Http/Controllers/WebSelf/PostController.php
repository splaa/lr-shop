<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace App\Http\Controllers\WebSelf;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebSelf\CreatePostRequest;
use App\Models\WebSelf\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\NoReturn;

class PostController extends Controller
{
    protected Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index(): Factory|View|Application
    {
        $title = 'Posts';
        $posts = $this->post::orderByDesc('id')->paginate(6);
        return view('web-self.posts.index', [
            'title' => $title,
            'posts' => $posts
        ]);
    }

    public function create(): Factory|View|Application
=======
namespace App\Http\Controllers\WebSelf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct(Request $request)
    {
        dump($request->route()->getName());
        dump($request->getClientIp());
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web-self.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
>>>>>>> 9031d8c (Controllers)
    {
        return view('web-self.posts.create');
    }

<<<<<<< HEAD
    public function store(CreatePostRequest $request): Factory|View|Application
    {
        $post = $this->post::create($request->all() + ['comment_id' => 1]);
        $request->session()->flash('success', 'Post create success!!!');
        return view('web-self.posts.show', ['post' => $post]);
    }

    public function show(Post $post): Factory|View|Application
    {
        return view('web-self.posts.show', ['post' => $post]);
=======
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->except('_token'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return "Post $id";
>>>>>>> 9031d8c (Controllers)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
<<<<<<< HEAD
     * @return Application|Factory|View
     */
    public function edit(int $id): Application|Factory|View
=======
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
>>>>>>> 9031d8c (Controllers)
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
<<<<<<< HEAD
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    #[NoReturn]
    public function update(Request $request, int $id): Response
=======
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
>>>>>>> 9031d8c (Controllers)
    {
        dd($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
<<<<<<< HEAD
     * @return Response
=======
     * @return \Illuminate\Http\Response
>>>>>>> 9031d8c (Controllers)
     */
    public function destroy(int $id)
    {
        dd($id);
    }
}
