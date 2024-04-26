<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Editing class subject</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">If you're a teacher and are wondering how to edit a class subject, do not worry, it's pretty simple, all you need to do is fill all of the forms below with the new class subject and after you are done doing that, just click the "Edit new class subject" and it's done!</p>
                                </div>
                            </div>
<?php 
echo validation_errors('<div class="col-lg-12 mb-4">
<div class="card bg-danger text-white shadow">
    <div class="card-body">', '</div>
    </div>
</div>');
?>
<?php echo form_open('subjects/edit_subject/' . $sbjcts->id) ?>
<div class="form-group">
    <label>Subjects</label>
    <input name="subjects" value="<?= $sbjcts->subjects ?>" class="form-control" type="text" placeholder="Insert subject">
</div>

<div class="form-group">
<label>Time</label>
<input name="time" class="form-control" value="<?= $sbjcts->time ?>" type="time" placeholder="Insert time">
</div>

<button class="btn btn-primary" type="submit">Edit new class subject</button> <?php "\n" ?>
<a href="<?= base_url('Subjects/index') ?>">Go back</a>
<?php echo form_close() ?>