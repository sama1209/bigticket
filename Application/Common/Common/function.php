<?php
/*
 * 公用的方法
 */
 //信息提醒
 function show ($status , $message, $data=array()){
     $result = array(
         'status' =>$status,
         'message'=>$message,
         'data'=>$data,
     );
     exit(json_encode($result));
 }
 
 function getMd5Password($password){
     return md5($password . C('MD5_PRE'));
 }
 function getMenuType($type){
     return $type==1 ? '后台菜单' : '前端导航';
 }
 function status($status){
     if($status == 0){
         $str = '关闭';
     }else if($status == 1){
         $str = '正常';
     }else if(status == -1){
         $str = '删除';
     }
     return $str;
 }
 
 function getLoginUsername() {
     //获取当前管理员的名字，存储时要用到
     return $_SESSION['loginAdmin']['username'] ? $_SESSION['loginAdmin']['username']: '';
 }
 function getActive($navc){
     $c = strtolower(CONTROLLER_NAME);
     if(strtolower($navc) == $c) {
         return 'class="active"';
     }
     return '';
 }
 function getAdminMenuUrl($nav) {
    $url = '/admin.php?c='.$nav['c'].'&a='.$nav['a'];
    if($nav['f']=='index') {
        //如果是Index则省略方法名
        $url = '/bigticket/admin.php?c='.$nav['c'];
    }
    return $url;
}
//文章管理页面，编辑器
function showKind($status ,$data){
    header('Movie-type:application/json;charset=UTF-8');
    if($status == 0){
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'message'=>'上传失败')));
}

function getCatName($navs,$id){
    foreach ($navs as $nav){
        $navList[$nav['menu_id']] = $nav['name'];
    }
    return isset($navList[$id]) ? $navList[$id] : '';
}
//
function getCopyFromById($id){
    $copyFrom = C('COPY_FROM');
    return $copyFrom[$id]?$copyFrom[$id]:"";
}
//封面图
function isThumb($thumb){
    if($thumb){
        return '<span style="color:red">有</span>';
    }
    return '无';
}
function getHallById($id){
    $hall = D("Hall")->find($id);
    return $hall['name'];
}
function getMovieTitleById($id){
    $movie=  D("Movie")->find($id);
    return $movie['title'];
}

function getMovieBigById($id){
    $movie=  D("Movie")->find($id);
    if($movie['photo_big']){
        return '<span style="color:red">有</span>';
    }
    return '无';
}
function getMovieSmallById($id){
    $movie=  D("Movie")->find($id);
    if($movie['photo_small']){
        return '<span style="color:red">有</span>';
    }
    return '无';
}
function getBigUrl($id){
    $moive = D("Movie")->find($id);
    return $moive['photo_big'];
}
function getSmallUrl($id){
    $moive = D("Movie")->find($id);
    return $moive['photo_small'];
}
function getMoviegradeById($id){
    $moive = D("Movie")->find($id);
    return $moive['grade'];
}
function getDateById($id){
    $moive = D("Movie")->find($id);
    return $moive['date'];
}