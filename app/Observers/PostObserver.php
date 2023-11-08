<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the Post "creating" event.
     */
    public function creating(Post $post): void
    {
        $post[Post::_CREATED_AT] = time();
        $post[Post::_UPDATED_AT] = time();


        if (empty($post[Post::_SLUG])) {
            $post[Post::_SLUG] = Str::of($post[Post::_TITLE])->slug('-');
        }
    }

    /**
     * Handle the Post "updating" event.
     */
    public function updating(Post $post): void
    {
        $post[Post::_UPDATED_AT] = time();

        if (empty($post[Post::_SLUG])) {
            $post[Post::_SLUG] = Str::of($post[Post::_TITLE])->slug('-');
        }
    }

    /**
     * Handle the Post "saving" event.
     */
    public function saving(Post $post): void
    {
        $post[Post::_UPDATED_AT] = time();

        if (empty($post[Post::_SLUG])) {
            $post[Post::_SLUG] = Str::of($post[Post::_TITLE])->slug('-');
        }
    }
}
