<?php

require __DIR__ . '/parts/__connect_db.php';
if (!empty($_POST['sid'])) {
    $sql = "UPDATE `product` SET 
                    `name`=?, 
                    `category`=?, 
                    `price`=?,
                    `on-sale`=?
                    `hash`=?
                WHERE `sid`=?";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['name'],
        $_POST['category'],
        $_POST['price'],
        $_POST['sid'],
    ]);

    if ($stmt->rowCount()) {
        $modified = true;
    }
}

$row = $pdo->query("SELECT * FROM product WHERE sid=''")->fetch();

// 呈現勾選y
// $h_sids = json_decode($row['introduction'], true);
// if($h_sids===null)
// $h_sids=[]; //資料庫新增值

// $c_sql = "SELECT * FROM categories WHERE parent_sid=0 ORDER BY sid DESC";
// $cates = $pdo->query($c_sql)->fetchAll();

// $h_sql = "SELECT * FROM `hobbies` WHERE `visible`=1 ORDER BY `seq`";
// $hobbies = $pdo->query($h_sql)->fetchAll();
?>
<?php require __DIR__ . '/parts/__html_head.php'; ?>
<?php include __DIR__ . '/parts/__navbar.php'; ?>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/Kingsmen.jpg" class=" w-100 h-50" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/Kingsmen-1.jpg" class=" w-100 h-50" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/Kingsmen-2.jpg" class=" w-100 h-50" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    


<?php include __DIR__ . '/parts/__scripts.php'; ?>
<script>
    // const file_input = document.querySelector('#file_input');
    // const avatar = document.querySelector('#avatar');

    const $category_sid = document.querySelector('#category_sid');
    let val = $category_sid.getAttribute('data-val');

    $category_sid.value = val;
</script>

<?php include __DIR__ . '/parts/__html_foot.php'; ?>