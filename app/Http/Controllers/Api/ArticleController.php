<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Services\ArticleService;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ArticleController extends Controller
{
    protected ArticleService $service;

    /**
     * ArticleController constructor.
     * @param  ArticleService  $service
     */
    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }

    public function index(): Collection|array
    {
        $articles = Article::all();
        return $articles;
    }

    public function show(Request $request): ArticleResource
    {
        return new ArticleResource($this->service->getArticleBySlug($request));
    }

    private function getArticleBySlug(string $slug): Article
    {
        return Article::findBySlug($slug);
    }

    public function viewsIncrement(Request $request): ArticleResource
    {
        $article = $this->service->getArticleBySlug($request);

        $article->state()->increment('views');
        return new ArticleResource($article);
    }

    public function likeIncrement(Request $request): ArticleResource
    {
        $article = $this->service->getArticleBySlug($request);

        $inc = $request->get('increment');
        $inc ? $article->state->increment('likes') : $article->state->decrement('likes');
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        $article = Article::find($id);
        $article->update($request->all());
        return response('hello');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $article = Article::find($id);
        $article->delete();
        return response('success', HttpResponse::HTTP_NO_CONTENT);
    }
}
