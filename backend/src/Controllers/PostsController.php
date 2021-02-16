<?php

namespace Sakura\App\Controllers;

use Sakura\App\Core\View;
use Sakura\App\Models\Post;
use Sakura\App\Models\Category;
use Sakura\App\Models\Author;
use Sakura\App\Models\Status;

class PostsController
{
    public function index()
    {
        $posts = Post::all();

        echo View::render('posts-index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $authores = Author::all();
        $statuses = Status::all();
        
        echo View::render('posts-create', compact('categories', 'authores', 'statuses'));
    }

    public function add()
    {
        if(! isset($_POST)) {

        }
        $post = $_POST;
        $file = $_FILES;
        dump($post);
    }
}