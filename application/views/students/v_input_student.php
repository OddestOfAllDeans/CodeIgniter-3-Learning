<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Inputting student data</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">If you're a teacher and are wondering how to insert a new student data, do not worry, it's pretty simple, all you need to do is fill all of the forms below with the student's details and after you are done doing that, just click the "Input new student data" and it's done!</p>
                                </div>
                            </div>
<?php 
echo validation_errors('<div class="col-lg-12 mb-4">
<div class="card bg-danger text-white shadow">
    <div class="card-body">', '</div>
    </div>
</div>');
?>
<?php echo form_open('students/input_student') ?>
<div class="form-group">
    <label>NIM</label>
    <input name="nim" class="form-control" type="number" placeholder="Insert NIM">
</div>

<div class="form-group">
<label>Name</label>
<input name="name" class="form-control" type="text" placeholder="Insert name">
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
        <label>Birthplace</label>
        <input name="birth_place" class="form-control" type="text" placeholder="Insert birthplace">
    </div>
</div>
    <div class="col-sm-6">
    <div class="form-group">
    <label>Birthdate</label>
    <input name="birth_date" class="form-control" type="date" placeholder="Insert birthdate">
    </div>
</div>
</div>

<div class="form-group">
<label>Gender</label>
<select name="gender" id="gender" class="form-control" placeholder="choose gender (NO LGBTQ+ OPTIONS, FUCK THE LGBTQ+ COMMUNITY THEY CAN GO DIE!)">
    <option value="M">Male</option>
    <option value="F">Female</option>
</select>
</div>

<div class="form-group">
<label>Faculties</label>
<select name="faculty_id" id="faculty_id" class="form-control" placeholder="choose gender (NO LGBTQ+ OPTIONS, FUCK THE LGBTQ+ COMMUNITY THEY CAN GO DIE!)">
    <option>--Choose Faculties--</option>
    <?php foreach ($faculties as $Key => $value) { ?>
        <option value="<?= $value->faculty_id ?>"><?= $value->faculty_name ?></option>
     <?php } ?>   
</select>
</div>

<div class="form-group">
<label>Study Program</label>
<select name="prodi_id" id="prodi_id" class="form-control" placeholder="choose gender (NO LGBTQ+ OPTIONS, FUCK THE LGBTQ+ COMMUNITY THEY CAN GO DIE!)">
    <option>--Choose Program Study--</option>
    <?php foreach ($prodi as $Key => $value) { ?>
        <option value="<?= $value->prodi_id ?>"><?= $value->prodi ?></option>
     <?php } ?>
</select>
</div>

<button class="btn btn-primary" type="submit">Input new student data</button> <?php "\n" ?>
<a href="<?= base_url('students/index') ?>">Go back</a>
<?php echo form_close() ?>