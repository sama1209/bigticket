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
      <div class="row">
        <div class="col-lg-12">

          <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i>  <a href="/bigticket/admin.php?c=content">场次管理</a>
            </li>
            <li class="active">
              <i class="fa fa-edit"></i> 场次添加
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
                <select class="form-control" id="movie_id" name="movie_id">
                  <option value="">==请选择影片==</option>
                  <?php if(is_array($movie_id)): foreach($movie_id as $key=>$movieMenu): ?><option value="<?php echo ($movieMenu["movie_id"]); ?>" <?php if($scene['movie_id'] == $movieMenu['movie_id']): ?>selected="selected"<?php endif; ?>><?php echo ($movieMenu["title"]); ?></option><?php endforeach; endif; ?>
                </select>

              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">年:</label>
              <div class="col-sm-5">
                <select class="form-control"  name="year">
                  <option value="">==请选择年==</option>
                  <?php if(is_array($year)): foreach($year as $key=>$yearMenu): ?><option value="<?php echo ($yearMenu); ?>" <?php if($scene['year'] == $yearMenu): ?>selected="selected"<?php endif; ?>><?php echo ($yearMenu); ?></option><?php endforeach; endif; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputcountry" class="col-sm-2 control-label">月:</label>
              <div class="col-sm-5">
                <select class="form-control"  name="month">
                  <option value="">==请选择月==</option>
                  <?php if(is_array($month)): foreach($month as $key=>$monthMenu): ?><option value="<?php echo ($monthMenu); ?>" <?php if($scene['month'] == $monthMenu): ?>selected="selected"<?php endif; ?>><?php echo ($monthMenu); ?></option><?php endforeach; endif; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputcountry" class="col-sm-2 control-label">日:</label>
              <div class="col-sm-5">
                <select class="form-control"  name="date">
                  <option value="">==请选择日==</option>
                  <?php if(is_array($date)): foreach($date as $key=>$dateMenu): ?><option value="<?php echo ($dateMenu); ?>" <?php if($scene['date'] == $dateMenu): ?>selected="selected"<?php endif; ?>><?php echo ($dateMenu); ?></option><?php endforeach; endif; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputcountry" class="col-sm-2 control-label">时:</label>
              <div class="col-sm-5">
                <select class="form-control"  name="hour">
                  <option value="">==请选择具体时间==</option>
                  <?php if(is_array($hour)): foreach($hour as $key=>$hourMenu): ?><option value="<?php echo ($hourMenu); ?>" <?php if($scene['hour'] == $hourMenu): ?>selected="selected"<?php endif; ?>><?php echo ($hourMenu); ?></option><?php endforeach; endif; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputcountry" class="col-sm-2 control-label">分:</label>
              <div class="col-sm-5">
                <select class="form-control"  name="minute">
                  <option value="">==请选择具体时间==</option>
                  <?php if(is_array($minute)): foreach($minute as $key=>$minuteMenu): ?><option value="<?php echo ($minuteMenu); ?>" <?php if($scene['minute'] == $minuteMenu): ?>selected="selected"<?php endif; ?>><?php echo ($minuteMenu); ?></option><?php endforeach; endif; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputdirector" class="col-sm-2 control-label">影厅:</label>
              <div class="col-sm-5">
                <select class="form-control" id="hall" name="hall">
                  <option value="">==请选择影厅==</option>
                  <?php if(is_array($hall)): foreach($hall as $key=>$hallMenu): ?><option value="<?php echo ($hallMenu["name"]); ?>" <?php if($scene['hall'] == $hallMenu['name']): ?>selected="selected"<?php endif; ?>><?php echo ($hallMenu["name"]); ?></option><?php endforeach; endif; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputdirector" class="col-sm-2 control-label">票价:</label>
              <div class="col-sm-5">
                <input type="text" name="price" class="form-control" id="inputcountry" placeholder="请填写票价" value="<?php echo ($scene["price"]); ?>">
              </div>
            </div>

            <input type="hidden" name="scene_id" value="<?php echo ($scene["scene_id"]); ?>"/>


            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-default" id="singcms-button-submit">提交</button>
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
    'save_url' : '/bigticket/admin.php?c=scene&a=add',
    'jump_url' : '/bigticket/admin.php?c=scene',
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