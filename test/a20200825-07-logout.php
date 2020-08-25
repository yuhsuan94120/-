<?php

session_start();

unset($_SESSION['user']);

# session_destroy(); // 清掉所有 session 資料

header('Location: a20200825-06-login.php');

// redirect // 轉向