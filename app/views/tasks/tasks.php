<?php $this->layout('layout') ?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>All Tasks</h1>
            <a class="btn btn-success" href="tasks/addTask">Add Task</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tasksInView as $task): ?>
                    <tr>
                        <td><?=$task['id']?></td>
                        <td><?=$task['title']?></td>
                        <td class="col-4">
                            <a class="btn btn-warning" href="tasks/edit/<?=$task['id']?>">Edit</a>
                            <a class="btn btn-primary" href="tasks/show/<?=$task['id']?>">Show</a>
                            <a onclick="return confirm('are you sure?');" class="btn btn-danger" href="/tasks/remove/<?=$task['id']?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>



