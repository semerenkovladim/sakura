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
        $query->select('categories');
        $categories = $query->query();        
        return array_map(function($categoriesDb){
            $category = new self;
            $category->setId($categoriesDb['id']);
            $category->setTitle($categoriessDb['title']);
            return $status;
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