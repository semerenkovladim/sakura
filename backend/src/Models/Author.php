<?php

namespace Sakura\App\Models;

use Sakura\App\Core\QueryBuilder;

class Author
{
    private int $id;
    private string $fullName;

    public static function all(): array
    {

        $query = new QueryBuilder();
        $authors = $query->table('authors')->select()->get();        
        return array_map(function($authorsDb){
            $author = new self;
            $author->setId($authorsDb['id']);
            $author->setFullName($authorsDb['full_name']);
            return $author;
        }, $authors);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFullName()
    {
        return $this->fullName;
    }
} 