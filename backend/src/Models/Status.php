<?php

namespace Sakura\App\Models;

use Sakura\App\Core\QueryBuilder;

class Status
{
    private int $id;
    private string $title;

    public static function all(): array
    {

        $query = new QueryBuilder();
        $statuses = $query->table('statuses')->select()->get();
     
        return array_map(function($statusesDb){
            $status = new self;
            $status->setId($statusesDb['id']);
            $status->setTitle($statusesDb['title']);
            return $status;
        }, $statuses);
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