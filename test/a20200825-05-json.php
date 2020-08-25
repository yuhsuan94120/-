<?php

$accounts = [
    'shin' => [
        'pw' => '123456',
        'nickname' => '小新'
    ],
    'der' => [
        'pw' => '1qaz2wsx',
        'nickname' => '小明'
    ],
];

echo json_encode($accounts, JSON_UNESCAPED_UNICODE);

