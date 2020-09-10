<?php

require __DIR__ . '/parts/__connect_db.php';

$output['row'] = [];
$order = array("\"","\n");
$replace = "";
$output['post'] =  str_replace($order,$replace,$_POST['search_input']);
$search = $output['post'];
$sql = "SELECT * FROM `product` WHERE name like '%$search%'";
   
$stmt = $pdo->query($sql);
$output['row'] = $stmt ->fetchAll();

echo json_encode($output, JSON_UNESCAPED_UNICODE);


?>