<?php
$page_title = '上架';
require __DIR__ . '/parts/__connect_db.php';

if (!empty($_FILES)) {
  header('Content-Type: text/plain');
  var_dump($_FILES);
  exit;
}

?>
<?php require __DIR__ . '/parts/__html_head.php'; ?>
<style>
  .row {
    /* display:block;  */
    height: 90vh;
    /* margin: 0; */
  }

  .left {
    /* flex: 50%; */
    padding: 15px 0;
    width: 200px;
  }

  .left h2 {
    padding-left: 40px;
  }

  /* Style the navigation menu inside the left column */
  #Manager {
    list-style-type: none;
    padding: 50;
    margin: 0;
  }

  #Manager li a {
    padding: 10px;
    text-decoration: none;
    color: black;
    display: block
  }

  #Manager li a:hover {
    background-color: #eee;
    margin-right: 20px;
  }

  .list {
    width: 87vw;
    text-align: center;
  }

  .img-fluid {
    overflow: hidden;
  }

  .img-fluid {
    transform: scale(1, 1);
    transition: all .3s ease-out;
  }

  .img-fluid:hover {
    transform: scale(1.5, 1.5);
  }

  ul li {
    display: inline-block;
  }

  ul li:hover ul {
    display: block
  }

  ul li ul {

    display: none;
  }

  ul li ul li {
    display: block;
  }
</style>

<?php include __DIR__ . '/parts/__navbar.php'; ?>

<div class="row">
  <div class="left" style="background-color:#DCDCDC;">
    <h2>管理者</h2>
    <ul id="Manager">

      <li><a href="#">商品管理</a>
        <ul>
          <li><a href="#">商品分類</a>
          </li>
          <li><a href="http://localhost/mfee09/mfee09/test/product/upload.php">商品上架</a>
          </li>
          <li><a href="http://localhost/mfee09/mfee09/test/product/delete.php">商品下架</a>
          </li>
          <li><a href="http://localhost/mfee09/mfee09/test/product/update.php">商品更新</a>
          </li>
        </ul>

      </li>
      <li><a href="#">銷售管理</a></li>
      <li><a href="#">行銷活動</a></li>
      <li><a href="#">統計報表</a></li>
    </ul>
  </div>
  <form name="insertForm" onsubmit="checkForm(); return false;" novalidate>
    <div class="container">
      <div class="form-group">
        <label for="exampleFormControlInput1">品名</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" id="name">
        <!-- <small class="form-text error-msg"></small> -->
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">價格</label>
        <input class="form-control" id="exampleFormControlSelect1" name="price" id="price">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">上傳圖片</label>
        <input type="file" id="file_input" class="form-control-file " id="myfile" name="myfile" accept="image/*">
        <!-- <button type="button" onclick="file_input.click()" >送出</button>-->
            <input type="hidden" id="field1" name="img-name" value=""> 
        <img src="<?= WEB_ROOT ?>/upload/" alt="" id="myimg" width="250px">
      </div>

      <input type="file" style="display: none">
      <input class="btn btn-primary" type="submit" value="上傳" id="button">
  </form>
</div>
<?php include __DIR__ . '/parts/__scripts.php'; ?>
<script>
  const file_input = document.querySelector('#file_input');
  const field1 = document.querySelector('#field1');
  file_input.addEventListener('change', function(event) {
    console.log(file_input.files)
    const fd = new FormData();
    fd.append('myfiles[]', file_input.files[0]);

    fetch('upload-multiple.php', {
        method: 'POST',
        body: fd
      })
      .then(r => r.json())
      .then(obj => {
        console.log(field1);
        console.log(obj);
        field1.value = obj.filenames;
        document.querySelector('#myimg').src = '/mfee09/mfee09/test/product/upload/' + obj.filenames;
      });
  });

  const $name = document.querySelector('#name');
  const $price = document.querySelector('#price');
  const r_fields = [$name, $price];
  const submitBtn = document.querySelector('#button');

  function checkForm() {
    let isPass = true;

    // r_fields.forEach(el => {
    //   el.style.borderColor = '#CCCCCC';
    //   el.nextElementSibling.innerHTML = '';
    // });
    // submitBtn.style.display = 'none';
    // // TODO: 檢查資料格式
    // if ($name.value.length < 2) {
    //   isPass = false;
    //   $name.style.borderColor = 'red';
    //   $name.nextElementSibling.innerHTML = '請填寫正確的姓名';
    // }


    // if(! email_pattern<? //echo WEB_ROOT ?>  //     isPass = false;
    //     $email.style.borderColor = 'red';
    //     $email.nextElementSibling.innerHTML = '請填寫正確格式的電子郵箱';
    // }

    // if(! mobile_pattern.test($mobile.value)) {
    //     isPass = false;
    //     $mobile.style.borderColor = 'red';
    //     $mobile.nextElementSibling.innerHTML = '請填寫正確的手機號碼';
    // }

    if (isPass) {
      const fd = new FormData(document.insertForm);

      fetch('upload-api.php', {
          method: 'POST',
          body: fd
        })
        .then(r => r.json())
        .then(obj => {
          console.log(obj);
          if (obj.success) {
            // infobar.innerHTML = '新增成功';
            // infobar.className = "alert alert-success";
            // if(infobar.classList.contains('alert-danger')){
            //     infobar.classList.replace('alert-danger', 'alert-success')
            // }
            setTimeout(() => {
              location.href = 'proj-end.php';
            }, 1000)
          } else {
            // infobar.innerHTML = obj.error || '新增失敗';
            // infobar.className = "alert alert-danger";
            // if(infobar.classList.contains('alert-success')){
            //     infobar.classList.replace('alert-success', 'alert-danger')
            // }
            submitBtn.style.display = 'block';
          }
          // infobar.style.display = 'block';
        });

    } else {
      submitBtn.style.display = 'block';
    }
  }
</script>
<?php include __DIR__ . '/parts/__html_foot.php'; ?>