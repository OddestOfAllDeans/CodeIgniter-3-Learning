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
<br>
<br>
<table class="table table-bordered" id="dataTable"> 
    <thead>
        <tr>
            <th>Subjects</th>
            <th>Time</th>
            <th>Edit</th>
            <th>Attendance</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sbjcts as $key => $value) { ?>
            <tr>
                <td><?= $value->subjects ?></td>
                <td><?= $value->time ?></td>
                <td><a href="<?= base_url('Subjects/edit_subject/' . $value->id) ?>" class="btn btn-primary">Edit</a>
                <a href="<?= base_url('Subjects/delete_subjects/' . $value->id) ?>" onclick="return confirm('Are you sure you want to delete this row?')" class="btn btn-danger">Delete</a></td>
                <td><a href="" class="btn btn-success">Attend</a>
                <a href="" class="btn btn-warning">Absent</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>