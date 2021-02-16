<?php

namespace Sakura\App\Models;

use Sakura\App\Core\QueryBuilder;

class Category
{
    private int $id;
    private string $title;

    public static function all(): array
    {

        $query = new QueryBuilder();
        $categories = $query->table('categories')->select()->get();       
        return array_map(function($categoriesDb){
            $category = new self;
            $category->setId($categoriesDb['id']);
            $category->setTitle($categoriesDb['title']);
            return $category;
        }, $categories);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }
} 