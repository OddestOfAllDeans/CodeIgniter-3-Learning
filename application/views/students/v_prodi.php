<a href="<?= base_url('Prodi/input_prodi') ?>" class="btn btn-success">Add new study program</a>
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
            <th>ID</th>
            <th>Study Program</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($prodi as $key => $value) { ?>
            <tr>
                <td><?= $value->prodi_id ?></td>
                <td><?= $value->prodi ?></td>
                <td><a href="<?= base_url('Prodi/edit_prodi/' . $value->prodi_id) ?>" class="btn btn-primary">Edit</a>
                <a href="<?= base_url('Prodi/delete_prodi/' . $value->prodi_id) ?>" onclick="return confirm('Are you sure you want to delete this row?')" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>