<?php
require __DIR__. '/parts/__connect_db.php';

// TODO: 檢查資料格式


$sql = "INSERT INTO `address_book`(
`name`, `email`, `mobile`,
 `birthday`, `address`, `created_at`
 ) VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = $pdo->prepare($sql);
$stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['mobile'],
        $_POST['birthday'],
        $_POST['address'],
]);

echo $stmt->rowCount();
echo 'ok';


