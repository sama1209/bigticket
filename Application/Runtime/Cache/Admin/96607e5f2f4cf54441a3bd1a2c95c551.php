<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sing后台管理平台</title>
    <!-- Bootstrap Core CSS -->
    <link href="/singcms/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/singcms/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/singcms/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/singcms/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/singcms/Public/css/sing/common.css" />
    <link rel="stylesheet" href="/singcms/Public/css/party/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/singcms/Public/css/party/uploadify.css">

    <!-- jQuery -->
    <script src="/singcms/Public/js/jquery.js"></script>
    <script src="/singcms/Public/js/bootstrap.min.js"></script>
    <script src="/singcms/Public/js/dialog/layer.js"></script>
    <script src="/singcms/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/singcms/Public/js/party/jquery.uploadify.js"></script>

</head>

    



<body>
<div id="wrapper">

  <?php
 $navs = D("Menu")->getAdminMenus(); $username = getLoginUsername(); foreach($navs as $k=>$v) { if($v['c'] == 'admin' && $username != 'admin') { unset($navs[$k]); } } $index = 'index'; ?>
<!-- 上面这一段的内容就是只让admin管理员可以管理其他用户，其他用户登录就没法看到用户管理这一模块 -->
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    
    <a class="navbar-brand" href="/singcms/admin.php?c=index">singcms内容管理平台</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo getLoginUsername()?> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="/singcms/admin.php?c=admin&a=personal"><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
       
        <li class="divider"></li>
        <li>
          <a href="/singcms/index.php?m=admin&c=login&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li <?php echo (getActive($index)); ?>>
        <a href="/singcms/admin.php"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
      </li>
      <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navo): $mod = ($i % 2 );++$i;?><li <?php echo (getActive($navo["c"])); ?>>
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
		<a href="/singcms/admin.php?c=basic"><button type="button" class="btn <?php if($type == 1): ?>btn-primary<?php endif; ?>"> 基本配置</button></a>
		<a href="/singcms/admin.php?c=basic&a=cache"><button type="button" class="btn <?php if($type == 2): ?>btn-primary<?php endif; ?>"> 缓存配置</button></a>
	</div>
</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="inputname" class="col-sm-2 control-label">更新首页缓存:</label>
					<div class="col-sm-5">
						<button type="button" class="btn" id="cache-index">确定更新</button>
					</div>
				</div>

				

			</div>

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script type="text/javascript" src="/singcms/Public/js/admin/form.js"></script>
<script>
 $("#cache-index").click(function(){
	 var url = '/singcms/index.php?c=index&a=build_html';
	 var postData = {};
	 var jump_url = '/singcms/admin.php?c=basic&a=cache';
	 $.post(url,postData,function(result){
		 if(result.status==1){
			 //成功
			 return dialog.success(result.message,jump_url);
		 }else if(result.status ==0){
			 return dialog.error(result.message);
		 } 
	 },"JSON");
	 
 });
</script>
<script src="/singcms/Public/js/admin/common.js"></script>



</body>

</html>