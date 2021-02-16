<?php

namespace Sakura\App\Controllers;

use Sakura\App\Core\View;
use Sakura\App\Models\Post;
use Sakura\App\Models\Category;
use Sakura\App\Models\Author;
use Sakura\App\Models\Status;
use Sakura\App\Services\ValidateForm;

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
        $error = [];
        if(empty($_POST)) {
            $error['all'] = 'You form is empty';
        } else {
            $validate = new ValidateFrom();
            $title = $validate->clean($_POST['title']);
            $author_id = $validate->clean($_POST['author_id']);
            $category_id = $validate->clean($_POST['category_id']);
            $status_id = $validate->clean($_POST['status_id']);
            $content = $validate->clean($_POST['content']);
            if(! $validate->checkLength($title, 1, 120))
            {
                $error['title'] = 'Incorrect length';
            }
            if($validate->isEmpty($title)) {
                
            }
        }
    }
}