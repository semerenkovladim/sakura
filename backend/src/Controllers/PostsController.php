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
        $errorData = [];
        if(empty($_POST)) {
            $error['all'] = 'You form is empty';
        } else {
            $validate = new ValidateForm();
            $title = $validate->clean($_POST['title']);
            $author_id = $validate->clean($_POST['author_id']);
            $category_id = $validate->clean($_POST['category_id']);
            $status_id = $validate->clean($_POST['status_id']);
            $content = $validate->clean($_POST['content']);
            $img = ($_FILES['img']['tmp_name']) ? $_FILES['img'] : '';
            if(! $validate->checkLength($title, 1, 120))
            {
                $error['title'] = 'Incorrect length';
            }
            if($validate->isEmpty($title)) {
                $error['title'] = 'Title is required';
            }
            if($validate->isEmpty($author_id)) {
                $error['author_id'] = 'Author is required';
            }
            if($validate->isEmpty($category_id)) {
                $error['category_id'] = 'Category is required';
            }
            if($validate->isEmpty($status_id)) {
                $error['status_id'] = 'Status is required';
            }
            if($validate->isEmpty($content)) {
                $error['content'] = 'Content is required';
            }
            if($validate->isEmpty($img)) {
                $error['img'] = 'Cover image is required';
            }
            if(count($error) > 0) {
                dump($_POST['title']);
                $categories = Category::all();
                $authores = Author::all();
                $statuses = Status::all();
                $errorData['title'] = $title;
                $errorData['author_id'] = $author_id;
                $errorData['category_id'] = $category_id;
                $errorData['status_id'] = $status_id;
                $errorData['content'] = $content;
                $errorData['img'] = $img;
                echo View::render('posts-create', compact('categories', 'authores', 'statuses', 'errorData', 'error'));
            } else {
                $post['title'] = '"' . $title . '"';
                $post['author_id'] = $author_id;
                $post['category_id'] = $category_id;
                $post['status_id'] = $status_id;
                $post['content'] = '"' . $content . '"';
                $destination = '../storage/' . time();
                $fileTempName = $_FILES['img']['tmp_name'];
                $extension = '.' . substr($_FILES['img']['type'], strripos($_FILES['img']['type'], '/') + 1);
                mkdir($destination);
                $newFilename = $destination . '/' . mb_strtolower($title) . $extension;
                move_uploaded_file($fileTempName, $newFilename);
                $post['img'] = '"' . $newFilename . '"';
                $response = Post::store($post);

                if($response) {
                    $this->index();
                }
            }
        }
    }
}