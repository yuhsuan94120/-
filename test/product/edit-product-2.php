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

$row = $pdo->query("SELECT * FROM product WHERE sid=2")->fetch();

$c_sql = "SELECT * FROM categories WHERE parent_sid=0 ORDER BY sid DESC";

$cates = $pdo->query($c_sql)->fetchAll();
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
        <input type="hidden" name="sid" value="2">
        <div class="form-group">
            <label for="bookname">bookname</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>" >
        </div>

        <div class="form-group" style="display: none">
            <label for="category_sid2">分類 (後端設定, 測試)</label>
            <select class="form-control" id="category_sid2">
                <?php foreach($cates as $c): ?>
                    <option value="<?= $c['sid'] ?>" <?= $row['category_sid']== $c['sid'] ? 'selected' : '' ?>><?= $c['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="category_sid">分類</label>
            <select class="form-control" id="category_sid" name="category_sid" data-val="<?= $row['category_sid'] ?>">
                <?php foreach($cates as $c): ?>
                <option value="<?= $c['sid'] ?>"><?= $c['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="category_sid">分類 (radio button group)</label><br>
            <?php foreach($cates as $c): ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" <?php //echo $row['category_sid']== $c['sid'] ? 'checked' : '' ?>
                       name="category_sid3" id="cate<?= $c['sid'] ?>" value="<?= $c['sid'] ?>">
                <label class="form-check-label" for="cate<?= $c['sid'] ?>"><?= $c['name'] ?></label>
            </div>
            <?php endforeach; ?>
        </div>


        <div class="form-group">
            <label for="price">price</label>
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

        const $category_sid = document.querySelector('#category_sid');
        let val = $category_sid.getAttribute('data-val');

        $category_sid.value = val;
        document.form1.category_sid3.value = val;


    </script>

<?php include __DIR__ . '/parts/__html_foot.php'; ?>