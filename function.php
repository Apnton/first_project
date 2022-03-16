<?php

function db()
{
    $dbh = new PDO('mysql:localhost=host;dbname=crud', 'root');
    return $dbh;
}

function getAll()
{
    $pdo = db();
    $stmt = $pdo->prepare('SELECT * FROM tasks');
    $stmt->execute();
    return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function getOne($id)
{
    $pdo = db();
    $stmt = $pdo->prepare('SELECT * FROM tasks WHERE id = :id');
    $stmt->execute($id);
   return $result = $stmt->fetch(PDO::FETCH_ASSOC);
}

function remove($id)
{
    $pdo = db();
    $stmt = $pdo->prepare('DELETE FROM tasks WHERE id = :id');
    $stmt->execute($id);
}

function store($data)
{
    $pdo = db();
    $stmt = $pdo->prepare("INSERT INTO tasks (title, content) VALUE (:title, :content)");
    $stmt->execute($data);
}

function update($data)
{
    $pdo = db();
    $stmt = $pdo->prepare("UPDATE tasks SET title = :title, content = :content WHERE id =:id");
    $stmt->execute($data);
}
