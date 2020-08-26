<?php
$page_title = '資料列表';
require __DIR__. '/parts/__connect_db.php';

$stmt = $pdo->query("SELECT * FROM `address_book` LIMIT 5");

$rows = $stmt->fetchAll();


?>
<?php require __DIR__. '/parts/__html_head.php'; ?>
<style>
    .my-trash-i {
        color: brown;
        cursor: pointer;
    }
</style>
<?php include __DIR__. '/parts/__navbar.php'; ?>
<div class="container">
    <table class="table table-striped">
        <!-- `sid`, `name`, `email`, `mobile`, `birthday`, `address`, `created_at` -->
        <thead>
        <tr>
            <th scope="col"><i class="fas fa-trash-alt"></i></th>
            <th scope="col">#</th>
            <th scope="col">姓名</th>
            <th scope="col">電郵</th>
            <th scope="col">手機</th>
            <th scope="col">生日</th>
            <th scope="col">地址</th>
            <th scope="col">建立時間</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($rows as $r): ?>
        <tr>
            <td><i class="fas fa-trash-alt my-trash-i"></i></td>
            <td><?= $r['sid'] ?></td>
            <td><?= $r['name'] ?></td>
            <td><?= $r['email'] ?></td>
            <td><?= $r['mobile'] ?></td>
            <td><?= $r['birthday'] ?></td>
            <td><?= $r['address'] ?></td>
            <td><?= $r['created_at'] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
<?php include __DIR__. '/parts/__scripts.php'; ?>
<script>
    const trashes = document.querySelectorAll('.my-trash-i');

    const trashHandler = (event)=>{
        const t = event.target;
        const tr = t.closest('tr');
        tr.style.backgroundColor = 'yellow';
        setTimeout(function(){
            tr.remove();
        }, 300);
    };

    trashes.forEach((el)=>{
        el.addEventListener('click', trashHandler);
    })
</script>
<?php include __DIR__. '/parts/__html_foot.php'; ?>


