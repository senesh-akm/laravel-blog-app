<?php

namespace App\Application\Posts;

use App\Domain\Posts\Post;
use App\Infrastructure\Repositories\PostRepository;
use App\Models\Post as ModelsPost;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function createPost($title, $text, $image = null)
    {
        $post = new Post(null, $title, $text, $image);
        return $this->postRepository->save($post);
    }

    public function getAllPosts()
    {
        return ModelsPost::all();
    }

    public function getPostById($id)
    {
        return $this->postRepository->findById($id);
    }
}
