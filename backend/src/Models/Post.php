<?php

namespace Sakura\App\Models;
use Sakura\App\Core\QueryBuilder;

class Post
{
    private $id;
    private $title;
    private $author;
    private $status;
    private $category;
    private $img;
    private $shortContent;
    private $content;

    public static function all(): array
    {

        $query = new QueryBuilder();
        $posts = $query->table('posts')->select()->get();
        return array_map(function($postDb){
            $post = new self;
            $post->setId($postDb['id']);
            $post->setTitle($postDb['title']);
            $post->setAuthor($postDb['author_id']);
            $post->setStatus($postDb['status_id']);
            $post->setCategory($postDb['category_id']);
            $post->setImg($postDb['img']);
            $post->setShortContent($post->truncateString($postDb['content'], 100));
            $post->setContent($postDb['content']);
            return $post;
        }, $posts);
    }

    public function truncateString(string $str, int $maxSymbol):string
    {
        if(mb_strlen($str) > $maxSymbol) {
            $str = mb_substr($str, 0, $maxSymbol - 3);
            $str .= '...';
        }
        return $str;
    }

    public static function store(array $arr): bool {
        $query = new QueryBuilder();
        $column = array_keys($arr);
        $value = array_values($arr);
        $result = $query->table('posts')->insert($column, $value);
        return $result;
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

    public function setShortContent($shortContent)
    {
        $this->shortContent = $shortContent;
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

    public function getShortContent(): string
    {
        return $this->shortContent;
    }
} 