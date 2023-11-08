<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Category;
use App\Repositories\Eloquent\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
        $perPage = (int) $request->query('per_page') ?: 10;
        $result = $this->categoryRepository->getPaginated($perPage);

        return ApiResponse::success($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $result = $this->categoryRepository->create($request->all());

        return ApiResponse::success($result);
    }

    /**
     * Display the specified resource.
     */
    public function getOne($id)
    {
        $result = $this->categoryRepository->find($id);

        return ApiResponse::success($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $result = $this->categoryRepository->update($id, $request->all());

        return ApiResponse::success($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
