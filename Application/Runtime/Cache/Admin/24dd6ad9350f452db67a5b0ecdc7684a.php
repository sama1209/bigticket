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

		<div class="container-fluid" >

			<div class="row">
				<div class="col-lg-12">

					<ol class="breadcrumb">
						<li>
							<i class="fa fa-dashboard"></i>  <a href="/bigticket/admin.php?c=ticket">购票管理</a>
						</li>
						<li class="active">
							<i class="fa fa-table"></i> 购票
						</li>
					</ol>
				</div>
			</div>

			<div id="body" class="">
				<div id="seat" class="lf">
					<div class="first">
						<b></b><span>可选座位</span>
						<b></b><span>已售座位</span>
						<b></b><span>已选座位</span>
					</div>
					<div id="" class="second">
					</div>
					<div id="seat_content" class="">
						<p>1<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></p>
						<p>2<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></p>
						<p>3<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></p>
						<p>4<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></p>
						<p>5<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></p>
						<p>6<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></p>
						<p>7<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></p>
						<p>8<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></p>
						<p>9<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></p>
					</div>
					<br>
					<div id="instruction" class="">
						<p><b>使用说明：</b></p>
						<p>1.点击上面座位直接选择</p>
						<p>2.已售座位不能再次被选中</p>
						<p>3.不能选择超过4张票，如有需要请进行新一轮购票</p>
					</div>
				</div>
				<div id="seat_info" class="">
					<div id="movie_info" class="">
						<p>片名：<span id="title">
							<?php echo ($scene["title"]); ?>
						</span></p>
						<p>日期：<span id="time">
							<?php echo (date("Y-m-d",$scene["time"])); ?>
						</span></p>
						<p>时间：<span id="hour-min">
							<?php echo (date("H:i",$scene["time"])); ?>
						</span></p>
					</div>
					<div id="movie_room" class="">
						<p>影厅：<span id="movie_room">
							<?php echo ($scene["hall"]); ?>
						</span></p>
						<p>票价：￥<span id="price">
							<?php echo ($scene["price"]); ?>
						</span></p>
					</div>
					<div id="sel_seat" class="clear">
						<br>
						<ul>
							<li>1</li>
							<li>2</li>
							<li>3</li>
							<li>4</li>
						</ul>
						<br>
					</div>
					<div id="form" >
						<input type="button" style="background-color:#337ab7;" id="button-book" value="确定">
					</div>
					<input type="hidden"  name="message" value="<?php echo ($message); ?>">
					<input type="hidden" name="scene_id"  value="<?php echo ($scene["scene_id"]); ?>"/>
				</div>
			</div>
		</div>
	</div>
<!-- /#wrapper -->

	<script src="/bigticket/Public/js/admin/select.js"></script>
<script>
    var SCOPE = {
        'jump_url' :'/bigticket/admin.php?c=buy',
        'edit_url' : '/bigticket/admin.php?c=buy&a=edit',
        'add_url' : '/bigticket/admin.php?c=buy&a=add',
        'set_url' : '/bigticket/admin.php?c=buy&a=set',
        'sing_news_view_url' : '/bigticket/index.php?c=view',
        'listorder_url' : '/bigticket/admin.php?c=movie&a=listorder',
        'push_url' : '/bigticket/admin.php?c=movie&a=push',
    }
</script>
<script src="/bigticket/Public/js/admin/common.js"></script>



</body>

</html>