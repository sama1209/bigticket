<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
use Think\Exception;

class SceneController extends CommonController{
    public function index(){
        $conds=array();
        $title = $_GET['title'];
        if($title){
            $conds['title'] = $title;
        }
        //如果没有选择，默认第一页
        $page = $_REQUEST['p'] ? $_REQUEST['p']:1;
        $pageSize = 10;
        //conds 是判别条件，news得到符合条件的，count则是其个数
        $conds['status'] = array('neq',-1);
        //获取具体的场次
        $scene = D('Scene')->getScene($conds,$page,$pageSize);
        $count = D('Scene')->getSceneCount($conds);
        //再利用think自带的分页函数，传入总数，每页个数
        $res = new \Think\Page($count,$pageSize);
        //渲染
        $pageres = $res->show();

//        $hall = D("Hall")->find($scene['hall_id']);

        $this->assign('pageres',$pageres);
        $this->assign('scene',$scene);
        $this->assign('title',$title);
        //$this->assign('positions',$positions);
        //把前端导航的数据获取

        //把搜索关键字渲染到前台模板中
//        $this->assign('hall',$hall);
        $this->display();

    }
    public function add(){
        if($_POST){
            //先判断是否全填好了
            if(!$_POST['movie_id'] || !isset($_POST['movie_id'])){
                return show(0,'影片不能为空');
            }
            if(!$_POST['year'] || !isset($_POST['year'])){
                return show(0,'年份不能为空');
            }
            if(!$_POST['month'] || !isset($_POST['month'])){
                return show(0,'月份不能为空');
            }
            if(!$_POST['date'] || !isset($_POST['date'])){
                return show(0,'日期不能为空');
            }
            if(!$_POST['hour'] || !isset($_POST['hour'])){
                return show(0,'时间不能为空');
            }
            if(!$_POST['minute'] || !isset($_POST['minute'])){
                return show(0,'时间不能为空');
            }
            if(!$_POST['hall'] || !isset($_POST['hall'])){
                return show(0,'影厅不能为空');
            }

            //print_r($_POST);
            //再来操作Post过来的数据
            //先判断下是否有id，有就执行更新操作

            if($_POST['scene_id']){
                $this->save($_POST);
            }else{

                $movieid = $_POST['movie_id'];
                $data = D('Movie')->find($_POST['movie_id']);
                $_POST['title'] = $data['title'];
//                print_r($_POST);
//                die();
                $sceneId = D('Scene')->insert($_POST);
                if($sceneId){
                    return show(1,'新增成功');
                }
                else{
                    return show(0,'新增失败');
                }
            }
        }
        else{
            //没有数据提交的时候，即是单纯地进入页面进行添加，下面的下拉框的内容
            $movie = D('Movie')->getBarMovie();
            $year = C('YEAR');
            $month= C('MONTH');
            $date = C('DATE');
            $hour = C('HOUR');
            $minute = C('MINUTE');
            $hall = D('Hall')->getBarHall();

            $this->assign('movie_id',$movie);
            $this->assign('year',$year);
            $this->assign('month',$month);
            $this->assign('date',$date);
            $this->assign('hour',$hour);
            $this->assign('minute',$minute);
            $this->assign('hall',$hall);
            $this->display();
        }

    }
    public function edit(){
        $sceneId = $_GET['id'];
//        print_r($sceneId);
//        die();
        $scene = D("Scene")->find($sceneId);
        if(!$scene){
            $this->redirect('/bigticket/admin.php?c=scene');
        }

        $this->assign('scene',$scene);
        $movie = D('Movie')->getBarMovie();
        $year = C('YEAR');
        $month= C('MONTH');
        $date = C('DATE');
        $hour = C('HOUR');
        $minute = C('MINUTE');
        $hall = D('Hall')->getBarHall();

        $this->assign('movie_id',$movie);
        $this->assign('year',$year);
        $this->assign('month',$month);
        $this->assign('date',$date);
        $this->assign('hour',$hour);
        $this->assign('minute',$minute);
        $this->assign('hall',$hall);
        $this->display();
    }

    public function save($data){
        $sceneId = $data['scene_id'];
        unset($data['movie_id']);
        try{
            $id = D("Scene")->updateById($sceneId,$data);
            if($id === false ){
                return show(0,'更新失败');
            }else if($id == false){
                return show(1,'更新成功，但没有数据发送变化');
            }
            return show(1,'更新成功');

        }catch (Exception $exception){
            return show(0,$exception->getMessage());
        }

    }
    public function setStatus(){
        try{
            if($_POST){
                $id = $_POST['id'];
                $status = $_POST['status'];

                if(!$id){
                    return show(0,'ID不存在');
                }
                $res = D('Scene')->updateStautusById($id,$status);

                if($res){
                    return show(1,'操作成功');
                }else{
                    return show(0,'操作失败');
                }
            }
            else{
                return show(0,'没有提交的内容');
            }
        }catch (Exception $exception){
            return show(0,$exception->getMessage());
        }
    }
}