<?php
if (!isset($page_name)) $page_name = '';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="http://localhost/mfee09/mfee09/test/product/0910.php"><img src="./img/logo.jpg" style="width: 50px;">Shakes Beard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $page_name == 'data-list' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= WEB_ROOT ?>/test/product/proj-front.php">商品列表(前台)</a>
                </li>
                <li class="nav-item <?= $page_name == 'data-insert' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= WEB_ROOT ?>/test/product/proj-end.php">商品管理(後台)</a>
                </li>

            </ul>

            <form id="searchForm" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn" type="submit"><i class="fas fa-search"></i></button>
            </form>

        </div>
    </div>
</nav>
<style>
    .navbar .nav-item.active {
        background-color: #7abaff;
        border-radius: 10px;
    }
</style>