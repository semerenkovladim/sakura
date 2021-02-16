<?php

namespace Sakura\App\Controllers;

use Sakura\App\Core\View;
use Sakura\App\Services\CSV;

class CsvController
{

    public function index()
    {
        echo View::render('csv-index');
    }

    public function read()
    {
        $csv = new CSV();
        $tmpPath = $_FILES['csvDocument']['tmp_name'];
        $handler = fopen($tmpPath, 'r');
        $parseCsv = $csv->csvToArray($handler, ';');
        dump($parseCsv);
    }

    public function write()
    {
        $csv = new CSV();
        $handler = fopen('../storage/csv_document.csv', 'a+');
        $array = [];
        $array[] = $_POST['title'];
        $array[] = $_POST['text'];
        $csv->arrayToCsv($handler, $array, ';');

        $handler = fopen('../storage/csv_document.csv', 'r');
        $parseCsv = $csv->csvToArray($handler, ';');
        dump($parseCsv);
    }

    public function todb()
    {
        $csv = new CSV();
        $tmpPath = $_FILES['csvDocument']['tmp_name'];
        $handler = fopen($tmpPath, 'r');
        $parseCsv = $csv->csvToDb('posts', $handler, ';');

    }

    public function fromdb()
    {
        $csv = new CSV();
        $handler = fopen('../storage/csv_document.csv', 'a+');
        $parseCsv = $csv->dbToCsv('posts', $handler, ';');
    }
}