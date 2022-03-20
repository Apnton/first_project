<?php

namespace App\controllers;

class QueryBuilder
{
    public $db;
    public $file;

    public function __construct(ImageManager $file)
    {

        $this->file = $file;
    }

    public function all()
    {
        return [];
    }


}