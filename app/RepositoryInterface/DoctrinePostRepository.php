<?php


namespace App\RepositoryInterface;


use App\Models\WebSelf\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class DoctrinePostRepository implements PostRepositoryInterface
{

    public function all(): Collection|array
    {
        return Post::all();
    }

    public function find(int $id): Model|Collection|array|Post|null
    {
        return Post::find($id);

    }

    public function create($input): Model|Post
    {
        return Post::create();
    }
}
