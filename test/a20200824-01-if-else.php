<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if(!empty($_GET['age']) and  $_GET['age']>=18){
?>

<img src="../img/cat-old.jpg" alt="">

<?php } else { ?>

<img src="../img/cat-one.jpg" alt="">

<?php } ?>
<br>
<?php if(!empty($_GET['age']) and  $_GET['age']>=18): ?>

    <img src="../img/cat-old.jpg" alt="">

<?php else: ?>

    <img src="../img/cat-one.jpg" alt="">

<?php endif; ?>

</body>
</html>