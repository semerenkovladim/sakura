<?php

namespace Sakura\App\Core;
use PDO;

class QueryBuilder extends DbConnector
{
    private string $query;
    private array $condition;

    public function __construct()
    {
        parent::__construct();
        $this->condition = ['=', '>', '<', '>=', '<=', '!=', 'BETWEEN', 'LIKE', 'IN'];
    }

    public function select(string $table, array|string $fields = '*')
    {
        if(! isset($table)) {
            dump("table is not defined");
            return false;
        }
        $this->query = 'SELECT ';
        if(is_array($fields)) {
            $this->query .= implode(', ', $fields);
        } else {
            $this->query .= $fields;
        }
        $this->query .= " FROM {$table}";
    }

    public function where(string $field, string $value, string $condition = "=")
    {
        if(! isset($field) || ! isset($value)) {
            dump("field or value is not defined");
            return false;
        }
        if(! in_array($condition, $this->condition))
        {
            dump("condition is incorrect");
            return false;
        }

        $this->query .= " WHERE {$field} {$condition} {$value}";
    }

    public function query(): array
    {
        if(! isset($this->query)) {
            dump("query is not builded");
            return false;
        }
        $dbh = $this->getHandler();
        $stmt = $dbh->query($this->query);

        // return $this->getHandler()->query($this->query);
        return $stmt->fetchAll();
    } 
}