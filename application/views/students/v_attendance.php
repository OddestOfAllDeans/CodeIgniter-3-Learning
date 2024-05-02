<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Attending a class subject</h6>
            </div>
            <div class="card-body">
                <p class="mb-0">By filling up all of the forms below you can attend the class you are going to attend to after filling the forms you can submit your attendance</p>
            </div>
        </div>
        <?php 
echo validation_errors('<div class="col-lg-12 mb-4">
<div class="card bg-danger text-white shadow">
    <div class="card-body">', '</div>
    </div>
</div>');
?>
<?php echo form_open('Subjects/attendance') ?>

<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Insert name">
</div>

<div class="form-group">
    <label for="">Time</label>
    <input type="datetime-local" class="form-control" name="time" placeholder="Insert time">
</div>

<button class="btn btn-primary" type="submit">Submit attendance</button> <?php "\n" ?>
<a href="<?= base_url('Subjects/index') ?>">Go back</a>
<?php echo form_close() ?>