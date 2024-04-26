<a href="<?= base_url('Mentors/input_mentors') ?>" class="btn btn-success">Input new mentor data</a>
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
<table class='table table-bordered' id='dataTable'>
    <thead>
        <tr>
            <th>NIM</th>
            <th>Name</th>
            <th>Subjects</th>
            <th>Birth Date</th>
            <th>Birth Place</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mntrs as $key => $value) { ?>
            <tr>
                <td><?= $value->nim ?></td>
                <td><?= $value->name ?></td>
                <td><?= $value->subject ?></td>
                <td><?= $value->birth_date ?></td>
                <td><?= $value->birth_place ?></td>
                <td>
            <a href="<?= base_url('Mentors/edit_mentor/' . $value->id) ?>" class='btn btn-warning'>Edit</a>
            <a href="<?=  base_url('Mentors/delete_mentors/'.$value->id) ?>" onclick="return confirm('Are you sure you want to delete this row?')" class='btn btn-danger'>Delete</a>
        </td>
            </tr>
        <?php } ?>    
    </tbody>
</table>