<?php $this->layout('layout') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Tasks</h1>
            <form action="update" method="post">
                <div class="form-group">
                    <div class="form-group">
                        <input name="id" type="hidden" value="<?=$task['id']?>" class="form-control">
                    </div>
                    <input name="title" type="text" value="<?=$task['title']?>" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <textarea name="content" class="form-control" ><?=$task['content']?></textarea>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>