<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Attending a class subject</h6>
    </div>
    <div class="card-body">
        <p class="mb-0">By filling up all of the forms below you can attend the class you are going to attend. After filling the forms you can submit your attendance.</p>
    </div>
</div>

<?php 
if ($this->session->flashdata('error')) {
    echo "<br>";
    echo '<div class="alert alert-danger">';
    echo $this->session->flashdata('error');
    echo "</div>";
}
?>

<?php 
echo validation_errors('<div class="col-lg-12 mb-4">
<div class="card bg-danger text-white shadow">
    <div class="card-body">', '</div>
    </div>
</div>');
?>

<?php echo form_open('Subjects/attendance/' . $subject_id) ?>
<div class="form-group">
    <label for="nim">NIM</label>
    <input type="text" class="form-control" name="nim" placeholder="Insert NIM" value="<?php echo set_value('nim'); ?>">
</div>
<button class="btn btn-primary" type="submit">Check NIM</button>
<?php echo form_close() ?>

<?php if (isset($student)): ?>
    <h2 style="margin-top: 2rem;">Welcome, <?php echo $student->name; ?> are you ready to attend?</h2>
    <?php echo form_open('Subjects/confirm_attendance/' . $subject_id) ?>
        <input type="hidden" name="nim" value="<?php echo $student->nim; ?>">
        <button class="btn btn-primary" type="submit">Mark Attendance</button>
        <a href="<?= base_url('Subjects/index') ?>">Go back</a>
    <?php echo form_close() ?>
<?php endif; ?>
