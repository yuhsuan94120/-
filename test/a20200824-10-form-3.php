<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./../bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="alert alert-info" role="alert">
                <pre><?php
                    print_r($_POST);
                ?></pre>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form method="post" name="form1">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="游泳" name="sports[]">
                        <label class="form-check-label" for="inlineCheckbox1">游泳</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="跑步" name="sports[]">
                        <label class="form-check-label" for="inlineCheckbox2">跑步</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="爬山" name="sports[]">
                        <label class="form-check-label" for="inlineCheckbox3">爬山</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="甲">
                        <label class="form-check-label" for="inlineRadio1">甲</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="乙">
                        <label class="form-check-label" for="inlineRadio2">乙</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="丙">
                        <label class="form-check-label" for="inlineRadio3">丙</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>



</div>




<script src="./../lib/jquery-3.5.1.min.js"></script>
<script src="./../bootstrap/js/bootstrap.js"></script>
<script>
    function checkCheckBox(){
        document.querySelectorAll('[name=sports\\[\\]]').forEach((el)=>{
            console.log(el.value, el.checked);
        })
    }
</script>
</body>
</html>