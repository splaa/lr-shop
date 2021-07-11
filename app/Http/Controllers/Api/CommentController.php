<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CreateRequest;
use App\Jobs\AddNewComment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(CreateRequest $request): JsonResponse
    {
        AddNewComment::dispatch($request->getSubject(), $request->getBody(), $request->getArticleId());

        return response()->json([
            'status' => 'success',
        ], JsonResponse::HTTP_CREATED);
    }
}
