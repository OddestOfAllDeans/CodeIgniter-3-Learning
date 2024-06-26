<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Inserting new study program</h6>
            </div>
            <div class="card-body">
                <p class="mb-0">If you're a teacher and are wondering how to insert a new study program, do not worry, it's pretty simple, all you need to do is fill the form below with a new study program and after you are done doing that, just click the "Input new study program" and it's done!</p>
            </div>
        </div>
<?php echo form_open('Prodi/input_prodi') ?>

<div class="form-group">
    <label for="">Study Program</label>
    <input type="text" class="form-control" name="prodi" placeholder="Insert new study program">
</div>

<button class="btn btn-primary" type="submit">Input new study program</button> <?php "\n" ?>
<a href="<?= base_url('prodi/index') ?>">Go back</a>
<?php echo form_close() ?>