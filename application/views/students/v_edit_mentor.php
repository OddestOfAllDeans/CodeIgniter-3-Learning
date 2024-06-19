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
                                    <h6 class="m-0 font-weight-bold text-primary">Editing mentor's data</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">If you're a teacher and are wondering how to edit mentor's data, do not worry, it's pretty simple, all you need to do is fill all of the forms below with the mentor's details and after you are done doing that, just click the "Edit mentor's data" and it's done!</p>
                                </div>
                            </div>
<?php 
echo validation_errors('<div class="col-lg-12 mb-4">
<div class="card bg-danger text-white shadow">
    <div class="card-body">', '</div>
    </div>
</div>');
?>
<?php echo form_open('Mentors/edit_mentor/' . $mntrs->id) ?>
<div class="form-group">
    <label>NIM</label>
    <input name="nim" value="<?= $mntrs->nim ?>" class="form-control" type="number" placeholder="Insert NIM">
</div>

<div class="form-group">
<label>Name</label>
<input name="name" class="form-control" value="<?= $mntrs->name ?>" type="text" placeholder="Insert name">
</div>

<div class="form-group">
<label>Subject</label>
<select name="subject_id" id="subject_id" class="form-control" placeholder="choose gender (NO LGBTQ+ OPTIONS, FUCK THE LGBTQ+ COMMUNITY THEY CAN GO DIE!)">
    <option value="">--Select Subject--</option>
    <?php foreach ($subjects as $Key => $value) { ?>
        <option value="<?= $value->subject_id ?>" <?= ($value->subject_id == $mntrs->subject_id) ? 'selected' : '' ?>>
        <?= $value->subjects ?>
        </option>
     <?php } ?>   
</select>
</div>


<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>Birthdate</label>
<input name="birth_date" class="form-control" value="<?= $mntrs->birth_date ?>" type="date" placeholder="Insert birthdate">
</div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label>Birthplace</label>
        <input name="birth_place" value="<?= $mntrs->birth_place ?>" class="form-control" type="text" placeholder="Insert birthplace">
    </div>
    </div>
</div>

<button class="btn btn-primary" type="submit">Edit mentor's data</button> <?php "\n" ?>
<a href="<?= base_url('mentors/index') ?>">Go back</a>
<?php echo form_close() ?>