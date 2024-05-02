<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Details</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Student Details</h1>
    <?php if ($student): ?>
        <table>
            <tr>
                <th>Name</th>
                <td><?php echo $student['name']; ?></td>
            </tr>
            <tr>
                <th>ID</th>
                <td><?php echo $student['nim']; ?></td>
            </tr>
            <tr>
                <th>Birthplace</th>
                <td><?php echo $student['birth_place']; ?></td>
            </tr>
            <tr>
                <th>Birthdate</th>
                <td><?php echo $student['birth_date']; ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td <?php echo $student['gender'];?> ><?php if($student['gender'] == "M") {
                    echo "Male";
                    } else {
                        echo "Female";
                    }?></td>
            </tr>
            <tr>
                <th>Faculty</th>
                <td><?php echo $student['faculty_name']; ?></td>
            </tr>
            <tr>
                <th>Study Program</th>
                <td><?php echo $student['prodi']; ?></td>
            </tr>
        </table>
    <?php else: ?>
        <p>Student not found</p>
    <?php endif; ?>
</body>
</html>
<script>
    window.print() 
</script>