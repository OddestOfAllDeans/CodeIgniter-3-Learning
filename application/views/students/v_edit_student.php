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
                                    <h6 class="m-0 font-weight-bold text-primary">Editing student data</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">If you're a teacher and are wondering how to edit student data, do not worry, it's pretty simple, all you need to do is fill all of the forms below with the student's details and after you are done doing that, just click the "Edit student data" and it's done!</p>
                                </div>
                            </div>
<?php 
echo validation_errors('<div class="col-lg-12 mb-4">
<div class="card bg-danger text-white shadow">
    <div class="card-body">', '</div>
    </div>
</div>');
?>
<?php echo form_open('students/edit_students/' . $stds->id) ?>
<div class="form-group">
    <label>NIM</label>
    <input name="nim" value="<?= $stds->nim ?>" class="form-control" type="number" placeholder="Insert NIM">
</div>

<div class="form-group">
<label>Name</label>
<input name="name" class="form-control" value="<?= $stds->name ?>" type="text" placeholder="Insert name">
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
        <label>Birthplace</label>
        <input name="birth_place" value="<?= $stds->birth_place ?>" class="form-control" type="text" placeholder="Insert birthplace">
    </div>
</div>
    <div class="col-sm-6">
    <div class="form-group">
    <label>Birthdate</label>
    <input name="birth_date" class="form-control" value="<?= $stds->birth_date ?>" type="date" placeholder="Insert birthdate">
    </div>
</div>
</div>

<div class="form-group">
<label>Gender</label>
<select name="gender" id="gender" class="form-control" placeholder="choose gender (NO LGBTQ+ OPTIONS, FUCK THE LGBTQ+ COMMUNITY THEY CAN GO DIE!)">
    <option value="M" <?= $stds->gender == 'M' ? 'selected' : '' ?> >Male</option>
    <option value="F" <?= $stds->gender == 'F' ? 'selected' : '' ?>>Female</option>
</select>
</div>

<div class="form-group">
<label>Faculties</label>
<select name="faculty_id" id="faculty_id" class="form-control" placeholder="choose gender (NO LGBTQ+ OPTIONS, FUCK THE LGBTQ+ COMMUNITY THEY CAN GO DIE!)">
    <option value="">--Select Faculty--</option>
    <?php foreach ($faculties as $key => $value) { ?>
        <option value="<?= $value->faculty_id ?>" <?= ($value->faculty_id == $stds->faculty_id) ? 'selected' : '' ?>>
            <?= $value->faculty_name ?>
        </option>
    <?php } ?>
</select>
</div>


<div class="form-group">
<label>Study Program</label>
<select name="prodi_id" id="prodi_id" class="form-control" placeholder="choose gender (NO LGBTQ+ OPTIONS, FUCK THE LGBTQ+ COMMUNITY THEY CAN GO DIE!)">
<option value="">--Select Study Program--</option>
<?php foreach($prodi as $key => $value) { ?>
<option value="<?= $value->prodi_id ?>" <?= ($value->prodi_id == $stds->prodi_id) ? 'selected' : '' ?>>
    <?= $value->prodi ?>
</option>
<?php } ?>
</select>
</div>

<button class="btn btn-primary" type="submit">Edit student data</button> <?php "\n" ?>
<a href="<?= base_url('students/index') ?>">Go back</a>
<?php echo form_close() ?>