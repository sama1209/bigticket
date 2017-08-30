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
              <i class="fa fa-dashboard"></i>  <a href="/bigticket/admin.php?c=movie">影片管理</a>
            </li>
            <li class="active">
              <i class="fa fa-edit"></i> 影片添加
            </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-lg-6">

          <form class="form-horizontal" id="singcms-form">
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label">片名:</label>
              <div class="col-sm-5">
                <input type="text" name="title" class="form-control" id="inputname" placeholder="请填写片名" value="<?php echo ($movie["title"]); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputcountry" class="col-sm-2 control-label">所属国家:</label>
              <div class="col-sm-5">
                <input type="text" name="country" class="form-control" id="inputcountry" placeholder="请填写国家" value="<?php echo ($movie["country"]); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputdirector" class="col-sm-2 control-label">导演:</label>
              <div class="col-sm-5">
                <input type="text" name="director" class="form-control" id="inputdirector" placeholder="请填写导演" value="<?php echo ($movie["director"]); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputlength" class="col-sm-2 control-label">片长:</label>
              <div class="col-sm-5">
                <input type="text" name="length" class="form-control" id="inputlength" placeholder="请填写片长" value="<?php echo ($movie["length"]); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputmainactor" class="col-sm-2 control-label">主演:<br/>（空格隔开）</label>
              <div class="col-sm-5">
                <input type="text" name="mainactor" class="form-control" id="inputmainactor" placeholder="请填写主演" value="<?php echo ($movie["mainactor"]); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputtype" class="col-sm-2 control-label">影片类型:<br/>（空格隔开）</label>
              <div class="col-sm-5">
                <input type="text" name="type" class="form-control" id="inputtype" placeholder="请填写类型" value="<?php echo ($movie["type"]); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputdate" class="col-sm-2 control-label">上映日期:<br/>（年 - 月 - 日）</label>
              <div class="col-sm-5">
                <input type="text" name="date" class="form-control" id="inputdate" placeholder="请填写上映日期" value="<?php echo ($movie["date"]); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputgrade" class="col-sm-2 control-label">影片评分</label>
              <div class="col-sm-5">
                <input type="text" name="grade" class="form-control" id="inputgrade" placeholder="请填写评分" value="<?php echo ($movie["grade"]); ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="file_upload" class="col-sm-2 control-label">横幅海报:</label>
              <div class="col-sm-5">
                <input id="file_upload"  type="file" multiple="true" >
                <img style="" id="upload_org_code_img" src="<?php echo ($movie["photo_big"]); ?>" width="300" height="150">
                <input id="file_upload_image" name="photo_big" type="hidden" multiple="true" value="<?php echo ($movie["photo_big"]); ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="file_upload_small" class="col-sm-2 control-label">竖幅小图:</label>
              <div class="col-sm-5">
                <input id="file_upload_small"  type="file" multiple="true" >
                <img style="" id="upload_org_code_img_small" src="<?php echo ($movie["photo_small"]); ?>" width="150" height="200">
                <input id="file_upload_image_small" name="photo_small" type="hidden" multiple="true" value="<?php echo ($movie["photo_small"]); ?>">
              </div>
            </div>

            <!--<div class="form-group">-->
              <!--<label for="file_upload_small" class="col-sm-2 control-label">竖幅小图:</label>-->
              <!--<div class="col-sm-5">-->
                <!--<input id="file_upload_small"  type="file" multiple="true" >-->
                <!--<img style="display: none" id="upload_org_code_img_small" src="" width="150" height="150">-->
                <!--<input id="file_upload_image_small" name="thumb_small" type="hidden" multiple="true" value="">-->
              <!--</div>-->
            <!--</div>-->


            <div class="form-group">
              <!--for属性，先留着不知道后面会不会用得着-->
              <label for="editor_singcms"  class="col-sm-2 control-label">内容简介:</label>
              <div class="col-sm-5">
                <textarea class="input js-editor" id="editor_singcms" name="content" rows="20" ><?php echo ($movie["content"]); ?></textarea>
              </div>
            </div>
            <!--<div class="form-group">-->
              <!--<label for="inputPassword3" class="col-sm-2 control-label">描述:</label>-->
              <!--<div class="col-sm-9">-->
                <!--<input type="text" class="form-control" name="description" id="inputPassword3" placeholder="描述">-->
              <!--</div>-->
            <!--</div>-->
            <!--<div class="form-group">-->
              <!--<label for="inputPassword3" class="col-sm-2 control-label">关键字:</label>-->
              <!--<div class="col-sm-5">-->
                <!--<input type="text" class="form-control" name="keywords" id="inputPassword3" placeholder="请填写关键词">-->
              <!--</div>-->
            <!--</div>-->
            <!--隐藏的id，这个必须要有，否则无法提供带有id的form表单，会认为是新的，采取新增操作-->
            <input type="hidden" name="movie_id" value="<?php echo ($movie["movie_id"]); ?>"/>

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
    'save_url' : '/bigticket/admin.php?c=movie&a=add',
    'jump_url' : '/bigticket/admin.php?c=movie',
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