<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>巨票儿票务管理平台</title>
    <!-- Bootstrap Core CSS -->
    <link href="/bigticket/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/bigticket/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/bigticket/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/bigticket/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/bigticket/Public/css/sing/common.css" />
    <link rel="stylesheet" href="/bigticket/Public/css/party/bootstrap-switch.css" />
    <link rel="stylesheet" href="/bigticket/Public/css/party/uploadify.css">
    <link rel="stylesheet" href="/bigticket/Public/css/select.css">

    <!-- jQuery -->
    <script src="/bigticket/Public/js/jquery.js"></script>
    <script src="/bigticket/Public/js/bootstrap.min.js"></script>
    <script src="/bigticket/Public/js/dialog/layer.js"></script>
    <script src="/bigticket/Public/js/dialog.js"></script>
    <script src="/bigticket/Public/js/party/jquery.uploadify.js"></script>

</head>

    



<body>
<div id="wrapper">

  <?php
 $navs = D("Menu")->getAdminMenus(); $username = getLoginUsername(); foreach($navs as $k=>$v){ if($v['c']=='admin' && $username !='admin'){ unset($navs[$k]); } if($v['c']=='menu' && $username !='admin'){ unset($navs[$k]); } } ?>
<!-- 上面这一段的内容就是只让admin管理员可以管理其他管理员以及菜单管理，超级管理员拥有最高权限，其他用户登录就没法看到用户管理这一模块 -->
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    
    <a class="navbar-brand" href="/bigticket/admin.php">巨票儿票务管理平台</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo getLoginUsername()?> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="/bigticket/admin.php?c=admin&a=personal"><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
        <li>
          <a href="/bigticket/admin.php?c=admin&a=change"><i class="fa fa-fw fa-user"></i> 修改密码</a>
        </li>
        <li class="divider"></li>
        <li>
          <a href="/bigticket/admin.php?m=admin&c=login&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li <?php echo (getActive($index)); ?>>
        <a href="/bigticket/admin.php"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
      </li>
      <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navo): $mod = ($i % 2 );++$i;?><!--菜单，循环-->
      <li <?php echo (getActive($navo["c"])); ?>>
        <a href="<?php echo (getAdminMenuUrl($navo)); ?>"><i class="fa fa-fw fa-bar-chart-o"></i> <?php echo ($navo["name"]); ?></a>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
  <script src="/bigticket/Public/js/kindeditor/kindeditor-all.js"></script>
  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row" >
        <div class="col-lg-12">

          <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i>  <a href="/bigticket/admin.php?c=content">购票管理</a>
            </li>
            <li class="active">
              <i class="fa fa-edit"></i> 信息确认
            </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-lg-6">


          <form class="form-horizontal" id="singcms-form">
            <div class="form-group">
              <label class="col-sm-2 control-label">影片:</label>
              <div class="col-sm-5">
                <label class="form-control"><?php echo ($scene["title"]); ?></label>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">日期:</label>
              <div class="col-sm-5">
                <label class="form-control"><?php echo (date('Y-m-d',$scene["time"])); ?></label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">时间:</label>
              <div class="col-sm-5">
                <label class="form-control"><?php echo (date('H:i',$scene["time"])); ?></label>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">影厅:</label>
              <div class="col-sm-5">
                <label class="form-control"><?php echo ($scene["hall"]); ?></label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">票数:</label>
              <div class="col-sm-5">
                <label class="form-control"><?php echo ($number); ?></label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">座位:</label>
              <div class="col-sm-5">
                <label class="form-control"><?php echo ($message); ?></label>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">总票价:</label>
              <div class ="col-sm-5">
                <label class="form-control"><?php echo ($totalprice); ?>元</label>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">扫码支付:</label>
              <img src="/bigticket/Public/images/qr_code.jpg" style="height: 200px;height: 200px; " alt="">
            </div>




            <input type="hidden"  name="totalprice"  class="form-control" id="totalprice" value="<?php echo ($totalprice); ?>">
            <input type="hidden"  name="number"  class="form-control" id="number" value="<?php echo ($number); ?>">
            <input type="hidden"  name="scene_id"  class="form-control" id="scene_id" value="<?php echo ($scene["scene_id"]); ?>">
            <input type="hidden"  name="row1"  class="form-control" id="inputrow1" value="<?php echo ($seat["row1"]); ?>">
            <input type="hidden"  name="column1" class="form-control" id="inputcolumn1" value="<?php echo ($seat["column1"]); ?>">
            <input type="hidden"  name="row2"  class="form-control" id="inputrow2" value="<?php echo ($seat["row2"]); ?>">
            <input type="hidden"  name="column2" class="form-control" id="inputcolumn2" value="<?php echo ($seat["column2"]); ?>">
            <input type="hidden"  name="row3"  class="form-control" id="inputrow3" value="<?php echo ($seat["row3"]); ?>">
            <input type="hidden"  name="column3" class="form-control" id="inputcolumn3" value="<?php echo ($seat["column3"]); ?>">
            <input type="hidden"  name="row4"  class="form-control" id="inputrow4" value="<?php echo ($seat["row4"]); ?>">
            <input type="hidden"  name="column4" class="form-control" id="inputcolumn4" value="<?php echo ($seat["column4"]); ?>">



            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-default" id="singcms-button-submit">确定提交</button>
              </div>
            </div>
          </form>


        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>
<script>
  var SCOPE = {
    'save_url' : '/bigticket/admin.php?c=buy&a=add',
    'jump_url' : '/bigticket/admin.php?c=buy&a=index',
    'ajax_upload_image_url' : '/bigticket/admin.php?c=image&a=ajaxuploadimage',
    'ajax_upload_swf' : '/bigticket/Public/js/party/uploadify.swf',
  };

</script>
<!-- /#wrapper -->
<script src="/bigticket/Public/js/admin/image.js"></script>
<script>
  // 6.2
  KindEditor.ready(function(K) {
    window.editor = K.create('#editor_singcms',{
      uploadJson : '/bigticket/admin.php?c=image&a=kindupload',
      afterBlur : function(){this.sync();}, //
    });
  });
</script>
<script src="/bigticket/Public/js/admin/common.js"></script>



</body>

</html>