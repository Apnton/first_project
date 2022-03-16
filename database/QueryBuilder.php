<?php

class QueryBuilder
{
    public $db;

    public function __construct()
    {
       $this->db = new PDO('mysql:localhost=host;dbname=crud', 'root');
        return $this->db;
    }


    function getAll()
    {
        $stmt = $this->db->prepare('SELECT * FROM tasks');
        $stmt->execute();
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    function getOne($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM tasks WHERE id = :id');
        $stmt->execute($id);
        return $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function remove($id)
    {
        $stmt = $this->db->prepare('DELETE FROM tasks WHERE id = :id');
        $stmt->execute($id);
    }

    function store($data)
    {
        $stmt = $this->db->prepare("INSERT INTO tasks (title, content) VALUE (:title, :content)");
        $stmt->execute($data);
    }

    function update($data)
    {

        $stmt = $this->db->prepare("UPDATE tasks SET title = :title, content = :content WHERE id =:id");
        $stmt->execute($data);
    }
}