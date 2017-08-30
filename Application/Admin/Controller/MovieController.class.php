<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;
use Think\Exception;

class MovieController extends CommonController {
    public function index(){
        $conds=array();
        $title = $_GET['title'];
        if($title){
            $conds['title'] = $title;
        }
        //如果没有选择，默认第一页
        $page = $_REQUEST['p'] ? $_REQUEST['p']:1;
        $pageSize = 10;
        //conds 是判别条件，news得到符合条件的新闻，count则是其个数
        $conds['status'] = array('neq',-1);
        //获取电影，电影数目
        $movie = D('Movie')->getMovie($conds,$page,$pageSize);
        $count = D('Movie')->getMovieCount($conds);
        //再利用think自带的分页函数，传入总数，每页个数
        $res = new \Think\Page($count,$pageSize);
        //渲染
        $pageres = $res->show();

        //$positions = D("Position")->getNormalPositions();

        $this->assign('pageres',$pageres);
        $this->assign('movie',$movie);
        //$this->assign('positions',$positions);
        //把前端导航的数据获取
        //$this->assign('webSiteMenu',D("Menu")->getBarMenus());
        //把搜索关键字渲染到前台模板中
        $this->assign('title',$title);
        $positions =D('Position')->getNormalPositions();
        $this->assign('positions',$positions);
        $this->display();
    }
    public function add(){
        if($_POST){
            if(!isset($_POST['title']) || !$_POST['title']){
                return show(0,'片名不能为空');
            }
            if(!isset($_POST['country']) || !$_POST['country']){
                return show(0,'所属国家不能为空');
            }
            if(!isset($_POST['director']) || !$_POST['director']){
                return show(0,'导演不能为空');
            }
            if(!isset($_POST['length']) || !$_POST['length']){
                return show(0,'片长不能为空');
            }
            if(!isset($_POST['mainactor']) || !$_POST['mainactor']){
                return show(0,'主演不能为空');
            }
            if(!isset($_POST['type']) || !$_POST['type']){
                return show(0,'影片类型不能为空');
            }
            if(!isset($_POST['date']) || !$_POST['date']){
                return show(0,'上映日期不能为空');
            }
//            if(!isset($_POST['grade']) || !$_POST['grade']){
//                return show(0,'影片评分不能为空');
//            }
            if(!isset($_POST['content']) || !$_POST['content']){
                return show(0,'内容简介不能为空');
            }
//            if(!isset($_POST['thumb_big']) || !$_POST['thumb_big']){
//                return show(0,'横幅海报不能为空');
//            }
//            if(!isset($_POST['thumb_small']) || !$_POST['thumb_small']){
//                return show(0,'竖幅海报不能为空');
//            }
            if($_POST['movie_id']){
                return $this->save($_POST);
            }
            else{
//                print_r($_POST);
//                exit();
                $movieId = D("Movie")->insert($_POST);

                return show(1,'新增成功');
            }
        }else{
            $this->display();
        }
    }
    public function edit(){
        $movieid =$_GET['id'];
        if(!$movieid){
            $this->redirect('/bigticket/admin.php?c=movie');
        }
        $movie = D('Movie')->find($movieid);
        if(!$movie){
            $this->redirect('/bigticket/admin.php?c=movie');
        }

        $this->assign('movie',$movie);


        $this->display();

    }
    public function save($data){
        $movieId = $data['movie_id'];
        unset($data['movie_id']);

        try{
            $id = D('Movie')->updateById($movieId,$data);
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
                $res = D('Movie')->updateStautusById($id,$status);

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