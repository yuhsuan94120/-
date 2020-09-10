<?php
$page_title = '資料列表';
require __DIR__. '/parts/__connect_db.php';

$perPage = 1; // 每頁有幾筆資料

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
                    <li class="page-item <?= $page==1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page-1 ?>">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </li>
                    <?php for($i=$page-3; $i<=$page+3; $i++):
                        if($i<1) continue;
                        if($i>$totalPages) break;
                        ?>
                    <li class="page-item <?= $i==$page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item <?= $page==$totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page+1 ?>">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>


    
</div>
<?php include __DIR__. '/parts/__scripts.php'; ?>
<?php include __DIR__. '/parts/__html_foot.php'; ?>
