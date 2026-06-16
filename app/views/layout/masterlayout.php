<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Quản lý sinh viên" ?></title>
</head>

<body>

<?php require '../app/views/layout/partial/header.php'; ?>

<div class="container">

    <?php
        require '../app/views/'.$viewname.'.php';
    ?>

</div>

<?php require '../app/views/layout/partial/footer.php'; ?>

</body>

<style>

body{

    margin:0;
    background:#f4f4f4;

    font-family:Arial;

}

.container{

    width:90%;

    margin:30px auto;

}

</style>

</html>