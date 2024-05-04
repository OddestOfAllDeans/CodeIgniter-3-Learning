<a href="<?= base_url('Students/input_student') ?>" class="btn btn-success">Add Student</a>
<button onclick="window.open('<?=  base_url('Students/print') ?>', '_blank')" class="btn btn-dark">Print</button>
<?php
if ($this->session->flashdata('message')) {
    echo "<br>";
    echo "<br>";
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('message');
    echo '</div>';
}

?>
<?php
for ($i = 0; $i < 1; $i++) {

    }
?>
<br>
<br>
<table class="table table-bordered" id="dataTable">
    <thead>
        <tr>
            <td>No</td>
            <th style="text-align: center;">ID</th>
            <th>Name</th>
            <th>Birthplace</th>
            <th>Birthdate</th>
            <th>Gender</th>
            <th>Faculties</th>
            <th>Study Program</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($stds as $key => $value) { ?>
            <tr>
                <td style="text-align: center;"><?= $i++ ?></td>
                <td><?= $value->nim ?></td>
                <td><?= $value->name ?></td>
                <td><?= $value->birth_place ?></td>
                <td><?= $value->birth_date ?></td>
                <td><?= $value->gender == 'M' ? 'Male' : 'Female' ?></td>
                <td><?= $value->faculty_name ?></td>
                <td><?= $value->prodi ?></td>
                <td>
            <a href="<?=  base_url('Students/edit_students/'.$value->id) ?>" class='btn btn-warning'>Edit</a><br><br>
            <a href="<?=  base_url('Students/delete_student/'.$value->id) ?>" onclick="return confirm('Are you sure you want to delete this row?')" class='btn btn-danger'>Delete</a><br><br>
            <button onclick="window.open('<?=  base_url('Students/view/'.$value->id) ?>', '_blank')" class="btn btn-dark">Print</button><br><br>
            <button onclick="window.open('<?=  base_url('PdfController/generate_student_pdf/'.$value->id) ?>', '_blank')" class="btn btn-primary">PDF</button>
        </td>
            </tr>
        <?php } ?>    
    </tbody>
</table>