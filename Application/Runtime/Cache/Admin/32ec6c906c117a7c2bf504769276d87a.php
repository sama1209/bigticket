<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="">
  <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="">

  <title>巨票儿票务管理系统</title>

  <!-- Bootstrap core CSS -->
  <link href="Public/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>

  <![endif]-->
</head>
<body>
<style>
  .s_center {
    margin-left: auto;
    margin-right: auto;
  }
</style>
<div class="s_center container col-lg-6 ">

    <form class="form-signin" enctype="multipart/form-data" >
      <h2 class="form-signin-heading" >管理系统</h2>
      <label class="sr-only">用户名</label>
      <input type="text"  class="form-control" name="username" id ="username" placeholder="请填写用户名" required autofocus >
      <br />
      <label  class="sr-only">密码</label>
      <input type="password" name="password"  id ="password" class="form-control" placeholder="密码" required>
      <br />
      <input type="text" name="passcode"  id ="passcode" class="form-control" placeholder="验证码" required>
      <br />
      <img id="code" src="/bigticket/admin.php/Admin/Login/verify" style="margin: 0 auto; display: block;">
      <br />
      <br />

      <button class="btn btn-lg btn-primary btn-block" type="button" onclick="login.check()">登录</button>
    </form>

</div> <!-- /container -->
<script src="Public/js/jquery.js"></script>
<script src="Public/js/dialog/layer.js"></script>
<script src="Public/js/dialog.js"></script>
<script src="Public/js/admin/login.js"></script>
<script>
    $("#verify_img").click(function() {
        var verifyURL = "public/verify";
        var time = new Date().getTime();
        $("#verify_img").attr({
            "src" : verifyURL + "/" + time
        });
    });
    $("#j_verify").keyup(function() {
        $.post("public/check_verify", {
            code : $("#j_verify").val()
        }, function(data) {
            if (data == true) {
                //验证码输入正确
            } else {
                //验证码输入错误
            }
        });
    });
</script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>