<?php

declare(strict_types=1);

namespace App\RepositoryInterface;

interface PostRepositoryInterface
{
    public function all();

    public function find(int $id);

    public function create($input);
}
