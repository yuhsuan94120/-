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
<div>
    <pre>
    <?php
    $ar = [];

    for($i=1; $i<=49; $i++){
        $ar[] = $i;
    }
    shuffle($ar);
    print_r($ar);
    ?>
    </pre>
</div>
</body>
</html>