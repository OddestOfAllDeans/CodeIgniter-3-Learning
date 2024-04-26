<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Inserting new class subject</h6>
            </div>
            <div class="card-body">
                <p class="mb-0">If you're a teacher and are wondering how to insert a new class subject, do not worry, it's pretty simple, all you need to do is fill all of the forms below with the new class subject and after you are done doing that, just click the "Input new subject" and it's done!</p>
            </div>
        </div>
<?php echo form_open('Subjects/input_subject') ?>

<div class="form-group">
    <label for="">Subject</label>
    <input type="text" class="form-control" name="subjects" placeholder="Insert new subject">
</div>

<div class="form-group">
    <label for="">Time</label>
    <input type="time" class="form-control" name="time" placeholder="Insert time for class subject">
</div>

<button class="btn btn-primary" type="submit">Insert</button> <?php "\n" ?>
<a href="<?= base_url('Subjects/index') ?>">Go back</a>
<?php echo form_close() ?>