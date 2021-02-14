<?php

namespace Sakura\App\Controllers;

use Sakura\App\Core\View;
use Sakura\App\Models\Post;

class PostsController
{
    public function index()
    {
        $posts = Post::all();

        echo View::render('posts-index', compact('posts'));
    }
}