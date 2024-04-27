<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px; /* Adjust the padding as needed */
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>NIM</th>
            <th>Name</th>
            <th>Birthplace</th>
            <th>Birthdate</th>
            <th>Gender</th>
            <th>Faculties</th>
            <th>Study Program</th>
        </tr>

        <?php foreach($students as $key => $value) : ?>
    <tr>
        <td><?php echo $value->nim ?></td>
        <td><?php echo $value->name ?></td>
        <td><?php echo $value->birth_place ?></td>
        <td><?php echo $value->birth_date ?></td>
        <td><?php echo $value->gender == 'M' ? 'Male' : 'Female' ?></td>
        <td><?php echo $value->faculty_name ?></td>
        <td><?php echo $value->prodi ?></td>
    </tr>
    <?php endforeach; ?>
        </table>
</body>
</html>
<script type="text/javascript">
    window.print();
</script>