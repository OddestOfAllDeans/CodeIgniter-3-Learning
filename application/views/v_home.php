<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $title; ?></h1>
    <h2><?php echo $subtitle; ?></h2>

    <ul>
        <li><a href="<?= base_url('home/about') ?>">About</a></li><br>
        <li><a href="<?= base_url('blog') ?>">Blog</a></li><br>
        <li><a href="<?= base_url('home/grades') ?>">Grades</a></li>
    </ul>
</body>
</html>