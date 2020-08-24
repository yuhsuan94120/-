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
    <?php
    $ar3 = [
        'name' => 'David',
        'age' => 23,
        'data' => [5,6,7],
    ];

    $ar3['data'][] = 12; // array push

    $ar4 = &$ar3; #拷備參照

    $ar3['data'][2] = 100;

    foreach($ar4 as $k => $v){
        if(is_array($v)){
            printf("%s => %s<br>", $k, implode(',', $v));
        } else {
            printf("%s => %s<br>", $k, $v);
        }
    }
    ?>
</div>
</body>
</html>