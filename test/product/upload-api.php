<?php
require __DIR__. '/parts/__connect_db.php';

// require __DIR__. '/parts/__admin_required.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

// TODO: 檢查資料格式
// email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
// mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;


    
    

// if(mb_strlen($_POST['name'])<2){
//     $output['code'] = 410;
//     $output['error'] = '姓名長度要大於 2';
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }

// if(! preg_match('/^09\d{2}-?\d{3}-?\d{3}$/', $_POST['mobile'])){
//     $output['code'] = 420;
//     $output['error'] = '手機號碼格式錯誤';
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }

// $file=$_FILES["file"]['name'];
$sql = "INSERT INTO `product`(
 `name`,`price`,`img-name`
 ) VALUES (?,?,?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
        $_POST['name'],
        $_POST['price'],
        $_POST['img-name']
        ]);

if($stmt->rowCount()){
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);?>