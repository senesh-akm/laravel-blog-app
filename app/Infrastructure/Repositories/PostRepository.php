<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Posts\Post;
use App\Models\Post as EloquentPost;

class PostRepository
{
    public function save(Post $post)
    {
        $eloquentPost = new EloquentPost();
        $eloquentPost->title = $post->title;
        $eloquentPost->text = $post->text;
        $eloquentPost->image = $post->image;
        $eloquentPost->save();
        return $eloquentPost;
    }

    public function findAll()
    {
        return EloquentPost::all();
    }

    public function findById($id)
    {
        return EloquentPost::find($id);
    }
}
