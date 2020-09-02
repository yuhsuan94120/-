<?php
require __DIR__.'/parts/__connect_db.php';

if(!empty($_FILES) && !empty($_FILES['myfile']['name'])){
   //header('Content-Type:text/plain');
   echo '<pre>';
    var_dump($_FILES);
    echo '</pre>';
    move_uploaded_file(
            $_FILES['myfile']['tmp_name'],
            __DIR__. '/parts/upload/'. $_FILES['myfile']['name']); //磁碟路徑

    echo "<img src='./parts/upload/{$_FILES['myfile']['name']}'>"; //網站路徑
    exit;
}
?>
<?php require __DIR__.'/parts/__html_head.php';?>
<?php include __DIR__.'/parts/__navbar.php';?>
<div class="container">
<form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="myfile" name="myfile"
                accept="image/*">
        </div>
        <input class="btn btn-primary" type="submit" value="上傳">
    </form>

</div>
<?php include __DIR__. '/parts/__scripts.php'; ?>
<?php include __DIR__. '/parts/__html_foot.php'; ?>