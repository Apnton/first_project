<?php
namespace App\controllers;
use Aura\SqlQuery\QueryFactory;

use League\Plates\Engine;
use PDO;

class HomeController
{
    private $view;
    private $queryFactory;
    private $pdo;

    public function __construct(Engine $view, QueryFactory $queryFactory, PDO $pdo)
    {
        $this->view = $view;

        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;
    }

    public function index()
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from('tasks');         // table name

            $sth = $this->pdo->prepare($select->getStatement());
            $sth->execute($select->getBindValues());
            $tasks = $sth->fetchAll(PDO::FETCH_ASSOC);

        echo $this->view->render('tasks', ['tasksInView' => $tasks]);
    }

    public function show($id)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from('tasks')
            ->where('id = :id')
            ->bindValues(['id' => $id]);

            $sth = $this->pdo->prepare($select->getStatement());
            $sth->execute($select->getBindValues());
            $task = $sth->fetch(PDO::FETCH_ASSOC);

        echo $this->view->render('show', ['taskInView' => $task]);
    }
}