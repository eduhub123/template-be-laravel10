<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the Category "creating" event.
     */
    public function creating(Category $category): void
    {
        $category[Category::_CREATED_AT] = time();
        $category[Category::_UPDATED_AT] = time();

        if (empty($category[Category::_SLUG])) {
            $category[Category::_SLUG] = Str::of($category[Category::_NAME])->slug('-');
        }
    }

    /**
     * Handle the Category "updating" event.
     */
    public function updating(Category $category): void
    {
        $category[Category::_UPDATED_AT] = time();

        if (empty($category[Category::_SLUG])) {
            $category[Category::_SLUG] = Str::of($category[Category::_NAME])->slug('-');
        }
    }

    /**
     * Handle the Category "saving" event.
     */
    public function saving(Category $category): void
    {
        $category[Category::_UPDATED_AT] = time();

        if (empty($category[Category::_SLUG])) {
            $category[Category::_SLUG] = Str::of($category[Category::_NAME])->slug('-');
        }
    }
}
