<?php

namespace Sakura\App\Services;

use Sakura\App\Core\QueryBuilder;

class Csv
{
    public function csvToArray($handler, string $delimiter = ';'): array 
    {
        $resultArray = [];
        while(($csvToArray = fgetcsv($handler , 0, $delimiter)) !== false){
            $resultArray[] = explode(',', $csvToArray[0]);
        }

        return $resultArray;
    }

    public function arrayToCsv($handler, array $fields, string $delimiter = ';')
    {
        $arrayToCsv = fputcsv($handler, $fields, $delimiter);
    }

    public function csvToDb(string $table, $handler, string $delimiter = ',')
    {
        $csvArray = $this->csvToArray($handler, $delimiter);
        $column = $csvArray[0];
        $values = array_slice($csvArray, 1);
        $db = new QueryBuilder();
        foreach($values as $value) {
            $db->table($table)->insert($column, $value);
        }
        $posts = $db->table('posts')->select()->get();
        dump($posts);
    }

    public function dbToCsv(string $table, $handler, string $delimiter = ',')
    {
        $db = new QueryBuilder();
        $stmt = $db->table($table)->select()->get();
        $headerFile = array_keys($stmt[0]);
        $this->arrayToCsv($handler, $headerFile);
        foreach($stmt as $item) {
            $this->arrayToCsv($handler, $item);
        }
    }
}