<?php
$page_title = '資料列表';
require __DIR__. '/parts/__connect_db.php';

$perPage = 5; // 每頁有幾筆資料

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$t_sql = "SELECT COUNT(1) FROM `address_book`";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
// die('~~~'); //exit; // 結束程式
$totalPages = ceil($totalRows/$perPage);

$rows = [];
if($totalRows > 0){
    if($page < 1){
        header('Location: data-list.php');
        exit;
    }
    if($page > $totalPages){
        header('Location: data-list.php?page='. $totalPages);
        exit;
    };

    $sql = sprintf("SELECT * FROM `address_book` LIMIT %s, %s", ($page-1)*$perPage, $perPage);
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
}


?>
<?php require __DIR__. '/parts/__html_head.php'; ?>
<?php include __DIR__. '/parts/__navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <?php for($i=1; $i<=$totalPages; $i++): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>

        </div>
    </div>


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
            <td><a href="javascript:"><i class="fas fa-trash-alt"></i></a></td>
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
<?php include __DIR__. '/parts/__html_foot.php'; ?>


