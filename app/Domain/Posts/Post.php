<?php

namespace App\Domain\Posts;

class Post
{
    public $id;
    public $title;
    public $text;
    public $image;

    public function __construct($id, $title, $text, $image = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->image = $image;
    }
}
