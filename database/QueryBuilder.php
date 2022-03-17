<?php

class QueryBuilder
{
    public $pdo;

    public function __construct()
    {
       $this->pdo = new PDO('mysql:localhost=host;dbname=crud', 'root');

    }


    function all($table)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    function getOne($table, $id)
    {
       ;
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id = :id");
        $stmt->execute($id);
        return $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function remove($table, $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->execute($id);
    }

    function store($table, $data)
    {
        $keys = array_keys($data);
        //created string title, content
        $tableFields = implode(", ", $keys);
        //created string :title, :content
        $placeholders = ':'. implode(", :", $keys);

        $stmt = $this->pdo->prepare("INSERT INTO $table ($tableFields) VALUE ($placeholders)");
        $stmt->execute($data);
    }

    function update($table, $data)
    {
        $fields = "";
        foreach ($data as $keys =>$value )
        {
            // created title = :title, content = :content,
            $fields .= $keys ." =:".$keys .", ";

        }
        // created title = :title, content = :content
        $fields = rtrim($fields, ' ,');

        $stmt = $this->pdo->prepare("UPDATE $table SET $fields WHERE id =:id");
        $stmt->execute($data);
    }

    function getUser($table, $data)
    {
        $fields = '';
        foreach ($data as $key => $value)
        {
            //email = :email AND password = :password AND
            $fields .= $key ." = :".$key ." AND ";

        }
        //email = :email AND password = :password
        $fields = rtrim($fields, 'AND ');

        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $fields LIMIT 1");
        $stmt->execute($data);
        return $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}