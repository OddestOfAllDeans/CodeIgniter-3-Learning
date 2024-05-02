<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Inserting new faculty</h6>
            </div>
            <div class="card-body">
                <p class="mb-0">If you're a teacher and are wondering how to insert a new faculty, do not worry, it's pretty simple, all you need to do is fill the form below with the new class subject and after you are done doing that, just click the "Input new faculty" and it's done!</p>
            </div>
        </div>
        <?php 
echo validation_errors('<div class="col-lg-12 mb-4">
<div class="card bg-danger text-white shadow">
    <div class="card-body">', '</div>
    </div>
</div>');
?>
<?php echo form_open('Faculties/input_faculty') ?>

<div class="form-group">
    <label for="">Faculty</label>
    <input type="text" class="form-control" name="faculty_name" placeholder="Insert new faculty">
</div>

<button class="btn btn-primary" type="submit">Input new faculty</button> <?php "\n" ?>
<a href="<?= base_url('faculties/index') ?>">Go back</a>
<?php echo form_close() ?>