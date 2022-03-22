<?php $this->layout('layout') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create Tasks</h1>
            <form action="/task/store" method="post">
                <div class="form-group">
                    <input name="title" type="text" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <textarea name="content" class="form-control" ></textarea>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
