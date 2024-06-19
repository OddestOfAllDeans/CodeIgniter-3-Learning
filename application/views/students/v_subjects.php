<a href="<?= base_url('Subjects/input_subject') ?>" class="btn btn-success">Add new class subject</a>
<?php 
if ($this->session->flashdata('message')) {
    echo "<br>";
    echo "<br>";
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('message');
    echo "</div>";
}
?>
<?php for ($i = 1; $i < 1; $i++) ?>
<br>
<br>
<table class="table table-bordered" id="dataTable"> 
    <thead>
        <tr>
            <th style="text-align: center;">No</th>
            <th>Subjects</th>
            <th>Time</th>
            <th>Day</th>
            <th>Edit</th>
            <th>Attendance</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sbjcts as $key => $value) { ?>
            <tr>
                <td style="text-align: center;"><?= $i++ ?></td>
                <td><?= $value->subjects ?></td>
                <td><?= $value->time ?></td>
                <td><?= $value->day ?></td>
                <td><a href="<?= base_url('Subjects/edit_subject/' . $value->subject_id) ?>" class="btn btn-primary">Edit</a>
                <a href="<?= base_url('Subjects/delete_subjects/' . $value->subject_id) ?>" onclick="return confirm('Are you sure you want to delete this row?')" class="btn btn-danger">Delete</a></td>
                <td><a href="<?= base_url("Subjects/attendance/" . $value->subject_id) ?>" class="btn btn-success">Attend</a>
                <a href="<?= base_url("Subjects/absent/" . $value->subject_id) ?>" class="btn btn-warning">Absent</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>