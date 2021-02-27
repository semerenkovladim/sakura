<?php

namespace Sakura\App\Core;
use PDO;

class QueryBuilder extends DbConnector
{
    public string $table;
    public array $select;
    private array $where;
    private int $limit;
    private array $insert;
    private array $condition;

    public function __construct()
    {
        parent::__construct();
        $this->condition = ['=', '>', '<', '>=', '<=', '!=', 'BETWEEN', 'LIKE', 'IN'];
        $this->where = [];
        $this->limit = -1;
    }

    public function table(string $table): self
    {
        if($table) {
            $this->table = $table;
        }

        return $this;
    }

    public function select(array $select = ['*']): self
    {
        if(isset($select)) {
            $this->select = $select;
        }

        return $this;
    }

    public function where(array $column, array $value, string $condition = '='): self
    {
        if(in_array($condition, $this->condition)) {
            $this->where = array_combine($column, $value);
        }

        return $this;
    }

    public function limit(int $limit = 0): self
    {
        if($limit >= 0) {
            $this->limit = $limit;
        } else {
            $this->limit = 0;
        }

        return $this;
    }
    public function insert(array $column, array $value)
    {
        if(count($column) === count($value)) {
            $query = "INSERT INTO {$this->table} (";
            $query .= implode(',', $column);
            $query .= ') ';
            $query .= 'VALUES (';
            $query .= implode(',', $value);
            $query .= ')';
            $stmt = $this->getHandler()->query($query);
            return true;
        }
        return false;
    }

    public function delete(int $id)
    {
        if($id >= 0) {
            $query = "DELETE {$this->table} WHERE id = {$id}";
            $stmt = $this->getHandler()->query($query);
            dump($stmt);
        }
    }

    public function get(): array
    {
        $query = 'SELECT ';
        $query .= implode(', ', $this->select);
        $query .= " FROM {$this->table} ";
        if(! empty($this->where)) {
            $column = '';
            $value = '';
            $resultWhere = 'WHERE ';
            foreach($this->where as $key => $value) {
                $resultWhere .= "{$key} {$this->condition} {$value},";
            }
            $resultWhere = substr($resultWhere, 0, strlen($resultWhere) - 1);
            $query .= "{$resultWhere} ";
        }
        if($this->limit >= 0) {
            $query .= "LIMIT {$this->limit}";
        }

        $stmt = $this->getHandler()->query($query);
                
        return is_array($stmt->fetch()) ? $stmt->fetchAll() : [];
    } 
}