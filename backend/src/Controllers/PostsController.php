<?php

namespace Sakura\App\Controllers;

use Sakura\App\Models\Post;

class PostsController
{
    public function index()
    {
        $posts = Post::all();
    }
}