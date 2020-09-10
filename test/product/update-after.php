<?php

require __DIR__ . '/parts/__connect_db.php';
if(!empty($_POST['sid'])){
    $sql = "UPDATE `product` SET `name`=?, `category`=?, `price`=? WHERE `sid`=?";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
            $_POST['name'],
            $_POST['category'],
            $_POST['price'],
            $_POST['sid'],
    ]);

    if($stmt->rowCount()){
        $modified = true;
    }
}

$sql = "SELECT * FROM product WHERE sid=?";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([    
            $_GET['sid'],
    ]);

$row = $stmt ->fetch();

$c_sql = "SELECT * FROM categories WHERE parent_sid=0 ORDER BY sid DESC";

// $cates = $pdo->query($c_sql)->fetchAll();
?>
<?php require __DIR__ . '/parts/__html_head.php'; ?>
<?php include __DIR__ . '/parts/__navbar.php'; ?>
<div class="container">
    <?php if(isset($modified)): ?>
        <div class="alert alert-success" role="alert">
            修改成功
        </div>
    <?php endif ?>
    <form action="" method="post" name="form1">
        <input type="hidden" name="sid" value="<?= $row['sid']?>">
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>" >
        </div>

        <div class="form-group">
            <label for="category">分類</label>
            <input class="form-control" id="category" name="category" data-val="<?= $row['category'] ?>">

            </input>
        </div>

        <div class="form-group">
            <label for="price">價格</label>
            <input type="text" class="form-control" id="price" name="price" value="<?= $row['price'] ?>">
        </div>


        <div class="d-flex justify-content-end">
            <input type="submit" value="修改" class="btn btn-primary">
        </div>

    </form>

    <input type="file" id="file_input" style="display: none">

</div>
<?php include __DIR__ . '/parts/__scripts.php'; ?>
    <script>
        // const file_input = document.querySelector('#file_input');
        // const avatar = document.querySelector('#avatar');

        const $category = document.querySelector('#category');
        let val = $category.getAttribute('data-val');

        $category.value = val;
        document.form1.category3.value = val;


    </script>

<?php include __DIR__ . '/parts/__html_foot.php'; ?>