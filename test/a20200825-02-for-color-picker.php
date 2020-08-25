<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <td style="background-color: purple">
            <div style="background-color: red">123</div>
        </td>
    </tr>
    <?php for($i=0; $i<=255; $i+=17): ?>
        <tr>
            <?php for($k=0; $k<=255; $k+=17): ?>
            <td style="background-color: #<?= sprintf("%'.06X", $i*256+$k) ?>"></td>
            <?php endfor ?>
        </tr>
    <?php endfor ?>
</table>

<script>
    const table = document.querySelector('table');

    table.addEventListener('click', function(event){
        const t = event.target; // 最裡面的元素
        console.log(t.style.backgroundColor);
    });


</script>
</body>
</html>