<?php 
if ($this->session->flashdata('error')) {
    echo "<br>";
    echo "<br>";
    echo '<div class="alert alert-danger">';
    echo $this->session->flashdata('error');
    echo "</div>";
}
?>
<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Editing study program</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">If you're a teacher and are wondering how to edit the study program, do not worry, it's pretty simple, all you need to do is fill the form below with the new study program you wanted to apply and after you are done doing that, just click the "Edit study program" and it's done!</p>
                                </div>
                            </div>
<?php 
echo validation_errors('<div class="col-lg-12 mb-4">
<div class="card bg-danger text-white shadow">
    <div class="card-body">', '</div>
    </div>
</div>');
?>
<?php echo form_open('Prodi/edit_prodi/' . $prodi->prodi_id) ?>

<div class="form-group">
<label style="display: none;">ID</label>
<input style="display: none;" name="prodi_id" class="form-control" value="<?= $prodi->prodi_id ?>" type="number" placeholder="Insert ID of the faculty">
</div>

<div class="form-group">
<label>Study Program</label>
<input name="prodi" class="form-control" value="<?= $prodi->prodi ?>" type="text" placeholder="Insert name of the study program">
</div>

<button class="btn btn-primary" type="submit">Edit study program</button> <?php "\n" ?>
<a href="<?= base_url('prodi/index') ?>">Go back</a>
<?php echo form_close() ?>