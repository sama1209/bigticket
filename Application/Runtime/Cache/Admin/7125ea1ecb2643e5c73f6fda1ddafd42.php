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
<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">

				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="/admin.php?c=positioncontent">推荐位内容管理</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> 添加推荐位内容
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
							<select class="form-control" name="movie_id">
								<option >请选择影片</option>
								<?php if(is_array($movie)): foreach($movie as $key=>$movie): ?><option value="<?php echo ($movie["movie_id"]); ?>" <?php if($vo['movie_id'] == $movie['movie_id']): ?>selected="selected"<?php endif; ?>><?php echo ($movie["title"]); ?></option><?php endforeach; endif; ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">推荐位:</label>
						<div class="col-sm-5">
							<select class="form-control" name="position_id">
								<option >请选择推荐位</option>
								<?php if(is_array($positions)): foreach($positions as $key=>$position): ?><option value="<?php echo ($position["id"]); ?> "  <?php if($vo['position_id'] == $position['id']): ?>selected="selected"<?php endif; ?>><?php echo ($position["name"]); ?></option><?php endforeach; endif; ?>
							</select>
						</div>
					</div>
					<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>

					<div class="form-group">
					<label  class="col-sm-2 control-label">状态:</label>
					<div class="col-sm-5">
						<input type="radio" name="status" id="optionsRadiosInline1" value="1" checked> 开启
						<input type="radio" name="status" id="optionsRadiosInline2" value="0"> 关闭
					</div>

				</div>

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
		'save_url' : '/bigticket/admin.php?c=positioncontent&a=add',
		'jump_url' : '/bigticket/admin.php?c=positioncontent&a=index',
		'ajax_upload_image_url' : '/bigticket/admin.php?c=image&a=ajaxuploadimage',
		'ajax_upload_swf' : '/bigticket/Public/js/party/uploadify.swf'
	};
</script>
<!-- /#wrapper -->
<script type="text/javascript" src="/bigticket/Public/js/admin/form.js"></script>
<script src="/bigticket/Public/js/admin/image.js"></script>
<script src="/bigticket/Public/js/admin/common.js"></script>



</body>

</html>