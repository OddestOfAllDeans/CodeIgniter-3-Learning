<a href="<?= base_url('Faculties/input_faculty') ?>" class="btn btn-success">Add Faculty</a>
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
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($fclts as $key => $value) { ?>
            <tr>
                <td><?= $value->faculty_id ?></td>
                <td><?= $value->faculty_name ?></td>
                <td>
            <a href="<?=  base_url('Faculties/edit_faculty/'.$value->faculty_id) ?>" class='btn btn-warning'>Edit</a>
            <a href="<?=  base_url('Faculties/delete_faculty/'.$value->faculty_id) ?>" onclick="return confirm('Are you sure you want to delete this row?')" class='btn btn-danger'>Delete</a>
        </td>
            </tr>
        <?php } ?>    
    </tbody>
</table>