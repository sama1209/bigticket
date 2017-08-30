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

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">

          <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i>  <a href="/bigticket/admin.php?c=scene">场次管理</a>
            </li>
            <li class="active">
              <i class="fa fa-table"></i> 场次列表
            </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
      <div >
        <button  id="button-add" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加 </button>
      </div>
      <br/>
      <div class="row">
        <form action="/bigticket/admin.php" method="get">
          <input type="hidden" name="c" value="scene"/>
          <input type="hidden" name="a" value="index"/>
          <div class="col-md-3">
            <div class="input-group">
              <input class="form-control" name="title" type="text" value="<?php echo ($title); ?>" placeholder="影片名称" />
                <span class="input-group-btn">
                  <button id="sub_data" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
          </div>
        </form>

      </div>
      <div class="row">
        <div class="col-lg-6">
          <h3></h3>
          <!--table-responsive-->
          <div class="">
            <form id="singcms-listorder">
              <table class="table table-bordered table-hover singcms-table">
                <thead>
                <tr>
                <!-- 供推荐位选择 -->
                  <th id="singcms-checkbox-all" width="10"><input type="checkbox"/></th>
                  <th width="14">排序</th><!--6.7-->
                  <th>id</th>
                  <th>片名</th>
                  <th>日期</th>
                  <th>时间</th>
                  <th>影厅</th>
                  <th>票价</th>
                  <th>上座率</th>
                  <th>状态</th>
                  <th>操作</th>
                  <th>购票</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($scene)): $i = 0; $__LIST__ = $scene;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$scene): $mod = ($i % 2 );++$i;?><tr>
                    <td><input type="checkbox" name="pushcheck" value="<?php echo ($scene["scene_id"]); ?>"></td>
                    <td><input size=4 type='text'  name='listorder[<?php echo ($new["news_id"]); ?>]' value="<?php echo ($new["listorder"]); ?>"/></td><!--6.7-->
                    <td><?php echo ($scene["scene_id"]); ?></td>
                    <td><?php echo ($scene["title"]); ?></td>
                    <td><?php echo (date("Y-m-d",$scene["time"])); ?></td>
                    <td><?php echo (date("H:i",$scene["time"])); ?></td>
                    <td><?php echo ($scene["hall"]); ?></td>
                    <td><?php echo ($scene["price"]); ?></td>
                    <td>上座率</td>
                    <td><span  attr-status="<?php if($scene['status'] == 1): ?>0<?php else: ?>1<?php endif; ?>" attr-id="<?php echo ($scene["scene_id"]); ?>" class="sing_cursor singcms-on-off" id="singcms-on-off" ><?php echo (status($scene["status"])); ?></span></td>
                    <td><span class="sing_cursor glyphicon glyphicon-edit" aria-hidden="true" id="singcms-edit" attr-id="<?php echo ($scene["scene_id"]); ?>" ></span>
                      <a href="javascript:void(0)" id="singcms-delete"  attr-id="<?php echo ($scene["scene_id"]); ?>"  attr-message="删除">
                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                      </a>
                      <!--<a target="_blank" href="/bigticket/index.php?c=detail&a=view&id=<?php echo ($movie["movie_id"]); ?>" class="sing_cursor glyphicon glyphicon-eye-open" aria-hidden="true"  ></a>-->
                    </td>
                     <!--只有场次日期大于当前时间的，才会有购票操作-->
                    <td>
                      <span <?php if($scene['time'] > time()): ?><button  id="button-buy" type="button" attr-id="<?php echo ($scene["scene_id"]); ?>" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">购票</button><?php endif; ?>
                      </span>
                    </td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                </tbody>
              </table>
              <nav>

              <ul >
                <?php echo ($pageres); ?>
              </ul>

            </nav>
              <!--<div>-->
                <!--<button  id="button-listorder" type="button" class="btn btn-primary dropdown-toggle" ><span class="glyphicon glyphicon-resize-vertical" aria-hidden="true"></span>更新排序</button>-->
              <!--</div>-->
            </form>
            <!--<div class="input-group">-->
              <!--<select class="form-control" name="position_id" id="select-push">-->
                <!--<option value="0">请选择推荐位进行推送</option>-->
                <!---->
                <!--<?php if(is_array($positions)): foreach($positions as $key=>$position): ?>-->
                  <!--<option value="<?php echo ($position["id"]); ?>"><?php echo ($position["name"]); ?></option>-->
                <!--<?php endforeach; endif; ?>-->
                <!---->
              <!--</select>-->
              <!--<button id="singcms-push" type="button" class="btn btn-primary">推送</button>-->
            <!--</div>-->

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
<script>
  var SCOPE = {
    'jump_url' :'/bigticket/admin.php?c=scene',
    'edit_url' : '/bigticket/admin.php?c=scene&a=edit',
    'add_url' : '/bigticket/admin.php?c=scene&a=add',
      'select_url' : '/bigticket/admin.php?c=buy&a=select',
    'set_status_url' : '/bigticket/admin.php?c=scene&a=setStatus',
    'sing_news_view_url' : '/bigticket/index.php?c=view',
    'listorder_url' : '/bigticket/admin.php?c=movie&a=listorder',
    'push_url' : '/bigticket/admin.php?c=movie&a=push',
  }
</script>
<script src="/bigticket/Public/js/admin/common.js"></script>



</body>

</html>