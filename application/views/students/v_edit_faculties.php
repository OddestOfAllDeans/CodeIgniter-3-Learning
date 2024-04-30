<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Editing faculty data</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">If you're a teacher and are wondering how to edit a faculty data, do not worry, it's pretty simple, all you need to do is fill all of the forms below with the change you want and after you are done doing that, just click the "Edit faculty" and it's done!</p>
                                </div>
                            </div>
<?php 
echo validation_errors('<div class="col-lg-12 mb-4">
<div class="card bg-danger text-white shadow">
    <div class="card-body">', '</div>
    </div>
</div>');
?>
<?php echo form_open('faculties/edit_faculty/' . $fclts->faculty_id) ?>

<div class="form-group">
<label style="display: none;">ID</label>
<input style="display: none;" name="faculty_id" class="form-control" value="<?= $fclts->faculty_id ?>" type="number" placeholder="Insert ID of the faculty">
</div>

<div class="form-group">
<label>Faculty</label>
<input name="faculty_name" class="form-control" value="<?= $fclts->faculty_name ?>" type="text" placeholder="Insert name of the faculty">
</div>

<button class="btn btn-primary" type="submit">Edit faculty</button> <?php "\n" ?>
<a href="<?= base_url('faculties/index') ?>">Go back</a>
<?php echo form_close() ?>