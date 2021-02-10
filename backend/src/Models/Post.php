<?php

namespace Sakura\App\Models;

class Post
{
    private $id;
    private $title;
    private $author;
    private $status;
    private $category;
    private $img;
    private $content;

    public static function all(): array
    {

        $db = require_once ('../storage/db.php');
        $posts = $db['posts'];
        return array_map(function($postDb){
            $post = new self;
            $post->setId($postDb['id']);
            $post->setTitle($postDb['title']);
            $post->setAuthor($postDb['author']);
            $post->setStatus($postDb['status']);
            $post->setCategory($postDb['category']);
            $post->setImg($postDb['img']);
            $post->setContent($postDb['content']);
            return $post;
        }, $posts);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): int
    {
        return $this->author;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getCategory(): int
    {
        return $this->category;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function getContent(): string
    {
        return $this->content;
    }
} 