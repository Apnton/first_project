<?php
namespace App\controllers;
use App\components\Database;
use Aura\SqlQuery\QueryFactory;

use League\Plates\Engine;
use PDO;

class HomeController
{
    private $view;
    private $database;


    public function __construct(Engine $view, Database $database)
    {
        $this->view = $view;
        $this->database = $database;
    }

    public function index()
    {
        $tasks = $this->database->all('tasks');
        echo $this->view->render('tasks/tasks', ['tasksInView' => $tasks]);
    }

    public function show($id)
    {
       $task = $this->database->getOne('tasks', $id);
       echo $this->view->render('tasks/show', ['taskInView' => $task]);
    }

    public function addTask(){

        echo $this->view->render('tasks/addTask');
    }

    public function store()
    {
        $this->database->store('tasks', $_POST);
        header("Location: /tasks");
    }

    public function remove($id)
    {
        $this->database->remove('tasks', $id);
        header("Location: /tasks");

    }

    public function edit($id)
    {
        $task = $this->database->getOne('tasks', $id);
        echo $this->view->render('tasks/edit', ['task'=> $task]);
    }

    public function update()
    {
        $this->database->update('tasks', $_POST);
        header("Location: /tasks");
    }


}