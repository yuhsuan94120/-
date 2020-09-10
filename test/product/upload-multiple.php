<?php
require __DIR__. '/parts/__connect_db.php';
 header('Content-Type: application/json');
$path = __DIR__. '/upload/';
$output = [
    'success' => false,
    'error' => '沒有上傳檔案',
    'ext' => $_FILES['myfiles']['name'],
    'filenames' => []
];

if(!empty($_FILES['myfiles']) && is_array($_FILES['myfiles']['name'])){
    $output['error'] = '!empty';
    foreach($_FILES['myfiles']['name'] as $k => $v){
        $ext = '';
        $filename1 = md5($_FILES['myfiles']['name'][$k]. uniqid());
        switch($_FILES['myfiles']['type'][$k]){
            case 'image/png':
                $ext = '.png';
                break;
            case 'image/jpeg':
                $ext = '.jpg';
                break;
            case 'image/gif':
                $ext = '.gif';
                break;
        }
        $output['ext'] = $ext;
        if(empty($ext)) continue;
        $filename = $filename1;
        $output['error'] = 'file:' . $filename;
        if(move_uploaded_file( $_FILES['myfiles']['tmp_name'][$k],
            $path. $filename)){
            $output['filenames'][] = $filename;
            $output['success'] = true;
            $output['error'] = '';
        }

    }
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);