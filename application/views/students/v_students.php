<a href="<?= base_url('Students/input_student') ?>" class="btn btn-success">Add Student</a>
<?php
if ($this->session->flashdata('message')) {
    echo "<br>";
    echo "<br>";
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('message');
    echo '</div>';
}

?>
<br>
<br>
<table class="table table-bordered" id="dataTable">
    <thead>
        <tr>
            <th>NIM</th>
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
                <td><?= $value->nim ?></td>
                <td><?= $value->name ?></td>
                <td><?= $value->birth_place ?></td>
                <td><?= $value->birth_date ?></td>
                <td><?= $value->gender == 'M' ? 'Male' : 'Female' ?></td>
                <td><?= $value->faculty_name ?></td>
                <td><?= $value->prodi ?></td>
                <td>
                    <a href="<?=  base_url('Students/edit_students/'.$value->id) ?>" class='btn btn-warning btn-sm'>Edit</a>
            <a href="<?=  base_url('Students/delete_student/'.$value->id) ?>" onclick="return confirm('Are you sure you want to delete this row?')" class='btn btn-sm btn-danger'>Delete</a>
                </td>
            </tr>
        <?php } ?>    
    </tbody>
</table>