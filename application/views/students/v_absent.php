<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Taking an absent from a class subject</h6>
            </div>
            <div class="card-body">
                <p class="mb-0">To take an absent you must fill up all of the forms below including your name, reason for the absent, and the date and time of the absent</p>
            </div>
        </div>
        <?php 
echo validation_errors('<div class="col-lg-12 mb-4">
<div class="card bg-danger text-white shadow">
    <div class="card-body">', '</div>
    </div>
</div>');
?>
<?php echo form_open('Subjects/absent') ?>

<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Insert name">
</div>

<div class="form-group">
    <label for="">Reason for absent</label>
    <input type="text" class="form-control" name="reason" placeholder="Insert reason">
</div>

<div class="form-group">
    <label for="">Date and Time</label>
    <input type="datetime-local" class="form-control" name="time" placeholder="">
</div>

<button class="btn btn-primary" type="submit">Take an absent</button> <?php "\n" ?>
<a href="<?= base_url('Subjects/index') ?>">Go back</a>
<?php echo form_close() ?>