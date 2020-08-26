<?php
$page_title = '新增資料';
$page_name = 'data-insert';
require __DIR__. '/parts/__connect_db.php';
?>
<?php require __DIR__. '/parts/__html_head.php'; ?>
<?php include __DIR__. '/parts/__navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>

                    <form name="form1" onsubmit="checkForm(); return false;">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="mobile">mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile">
                        </div>
                        <div class="form-group">
                            <label for="birthday">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>






</div>
<?php include __DIR__. '/parts/__scripts.php'; ?>
<script>
    function checkForm(){

        // TODO: 檢查資料格式

        const fd = new FormData(document.form1);

        fetch('data-insert-api.php', {
            method: 'POST',
            body: fd
        })
        .then(r=>r.text())
        .then(str=>{
            console.log(str);
        });

        // return false;
    }
</script>
<?php include __DIR__. '/parts/__html_foot.php'; ?>