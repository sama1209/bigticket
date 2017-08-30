<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;
use Think\Exception;

class PositioncontentController extends CommonController {
    public function index(){
        if(isset($_REQUEST['position_id']) && $_REQUEST['position_id']!=-1){
            $data['position_id'] = intval($_REQUEST['position_id']);
            $this->assign('position_id', $data['position_id']);
        }
        else{
            //便于控制
            $this->assign('position_id',-1);
        }
        if(isset($_GET['title'])) {
            $tt = $_GET['title'];
            echo $tt;
//            $data['title'] = $_GET['title'];
//            $this->assign('title',$_REQUEST['title']);
        }


        //获得所有的推荐位，下面没他的事了
        $positions =D('Position')->getNormalPositions();

        //获取筛选后的内容
        $data['status'] = array('neq',-1);

        // $contents = D('PositionContent')->select($data);

        //做下分页处理
        $page = $_REQUEST['p'] ? $_REQUEST['p']:1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        //$conds['status'] = array('neq',1);
        $contents = D('PositionContent')->getPositioncontent($data,$page,$pageSize);
        $count = D('PositionContent')->getPositioncontentCount($data);

        //think自带的分页函数
        $res = new  \Think\Page($count,$pageSize);
        $pageres = $res->show();
        //需要把contents pageres 都渲染到页面上
        //positions
        $this->assign('pageres',$pageres);
        $this->assign('positions',$positions);
        $this->assign('contents',$contents);
        $this->assign('positionId',$data['position_id']);
        $this->display();
    }
    public function add(){
        //进行检查
        if($_POST){
            if(!isset($_POST['movie_id']) || !$_POST['movie_id']){
                return show(0, '影片不能为空');
            }
            if(!isset($_POST['position_id']) || !$_POST['position_id']){
                return show(0, '推荐位ID不能为空');
            }
//            print_r($_POST);
//            exit();

            //插入到数据库
            //更新

            if($_POST['id']){
                return $this->save($_POST);
            }
            try{
                $id =D("PositionContent")->insert($_POST);
                if($id){
                    return show(1, '新增成功');
                }
                return show(0, '新增失败');
            }catch (Exception $e){
                return show(0, $e->getMessage());
            }
        }else{
            //获取具体的推荐位，影片
            $positions = D("Position")->getNormalPositions();
            $movie = D("Movie")->getNormalMovie();
            $this->assign('positions',$positions);
            $this->assign('movie',$movie);
            $this->display();
        }
    }
    public function edit(){
        $id = $_GET['id'];
        $position =D("PositionContent")->find($id);
        $positions = D("Position")->getNormalPositions();
        $movie =D("Movie")->getNormalMovie();

        $this->assign('positions',$positions);
        $this->assign('movie',$movie);
        $this->assign('vo',$position);
        
        
        $this->display();
    }
    //都十分类似
    public function save($data){
        $id = $data['id'];
        unset($data['id']);
        
        try {
            //在此对数据库进行操作
            $resId = D("PositionContent")->updateById($id,$data);
            if($resId == false){
                return show(0, '更新失败');
            }
            return show(1, '更新成功');
        } catch (Exception $e) {
            return show(0, $e->getMessage());
        }
    }

    public function setStatus(){
        $data = array(
            //做一个转换，因为很多表不是以id做为主键
            'id'=>intval($_POST['id']),
            'status'=>intval($_POST['status']),
        );
        return parent::setStatus($data, 'PositionContent');
    }
    public function listorder(){
        return parent::listorder("PositionContent");
    }


}