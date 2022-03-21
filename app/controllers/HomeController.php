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

    public function addTask(){

        echo $this->view->render('addTask');
    }

    public function store()
    {
        $insert = $this->queryFactory->newInsert();

        $insert
            ->into('tasks')                   // INTO this table
            ->cols([                        // bind values as "(col) VALUES (:col)"
                'title',
                'content',
            ])
            ->bindValues($_POST);
                $sth = $this->pdo->prepare($insert->getStatement());
                $sth->execute($insert->getBindValues());

                header("Location: /tasks");

    }

    public function remove($id)
    {
        $delete = $this->queryFactory->newDelete();

        $delete
            ->from('tasks')                   // FROM this table
            ->where('id = :id')           // AND WHERE these conditions
            ->bindValue('id', $id);   // bind one value to a placeholder
                $sth = $this->pdo->prepare($delete->getStatement());
                $sth->execute($delete->getBindValues());
                header("Location: /tasks");

    }

    public function edit($id)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from('tasks')
            ->where('id=:id')
            ->bindValue('id', $id);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $task = $sth->fetch(PDO::FETCH_ASSOC);
        echo $this->view->render('edit', ['task'=> $task]);
    }

    public function update()
    {
        $update = $this->queryFactory->newUpdate();
        $update
            ->table('tasks')                  // update this table
            ->cols([                        // bind values as "SET bar = :bar"
                'title',
                'content',
            ])

            ->where('id = :id')
            ->bindValues($_POST);
        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());
        header("Location: /tasks");
    }


}