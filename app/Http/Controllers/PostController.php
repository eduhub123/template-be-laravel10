<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Post;
use App\Repositories\Eloquent\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(
        PostRepository $postRepository,
    ) {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
        $perPage = (int)$request->query('per_page') ?: 10;

        $result = $this->postRepository->getPaginated($perPage);

        return ApiResponse::success($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $result = $this->postRepository->create($request->all());

        return ApiResponse::success($result);
    }

    /**
     * Display the specified resource.
     */
    public function getOne($id)
    {
        $result = $this->postRepository->find($id);

        return ApiResponse::success($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $result = $this->postRepository->update($id, $request->all());

        return ApiResponse::success($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
