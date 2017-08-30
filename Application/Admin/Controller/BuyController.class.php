<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
use Think\Exception;

class BuyController extends CommonController
{
    public function index()
    {
        $data=array();
        $title = $_GET['title'];
        if($title){
            $data['title'] = $title;
        }
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize =  10;
        $data['status'] = array('neq',-1);
        $buy = D("Scene")->getSellingScene($data,$page,$pageSize);
        $buyCount = D("Scene")->getSellintCount();
//        print_r($ticket);
//        exit();

        $res = new \Think\Page($buyCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('scene',$buy);
        $this->assign('title',$title);
        $this->display();
    }
    public function select(){
        //具体的购票页面
        $id = $_GET['id'];
        $scene =D("Scene")->find($id);
        $this->assign('scene',$scene);

        //座位的处理
        $seat = D("Seat")->getSeatBySceneId($id);
        $message = "";
        for($i=0;$i<sizeof($seat);$i++){
            for($j=1;$j<5;$j++){
                if($seat[$i]['row'.$j]){
                    $message =$message. $seat[$i]['row'.$j].'-'.$seat[$i]['column'.$j].'-';
                }
            }
        }
//        $message = json_encode($message);
//        print_r($message);
//        exit();
        $this->assign('message',$message);
        $this->display();
    }

    //选座
    public function set(){
        $id = $_GET['id'];
        $message="";
        for($i=1;$i<$_GET['k'];$i++){
            $data['row'.$i] = $_GET['row'.$i];
            $data['column'.$i] = $_GET['column'.$i];
            $message =$message.( $_GET['row'.$i].'排'.$_GET['column'.$i].'号'.'&nbsp;&nbsp;');
        }
//        print_r($message);
//        exit();
        $scene = D("Scene")->find($id);
        $this->assign(scene,$scene);
        $this->assign('seat',$data);
        $this->assign('message',$message);
        $this->assign('totalprice',$scene['price']*($_GET['k']-1));
        $this->assign('number',$_GET['k']-1);
        $this->display();
    }

    //确认
    public function add(){
        if($_POST){
            if(!$_POST['scene_id'] || !isset($_POST['scene_id'])){
                return show(0,'场次错误');
            }
            print_r($_POST);
            if(!$_POST['number'] || !isset($_POST['number'])){
                return show(0,'票数错误');
            }

            $sceneId = D("Scene")->find($_POST['scene_id']);
            $sceneId['totalprice'] = $_POST['totalprice'];
            $sceneId['number'] = $_POST['number'];
//            print_r($sceneId);
//            exit();
            $ticketId = D("Ticket")->insert($sceneId); //根据场次id找到对应场次，加上票价票数后，进行更新插入
            if(!$ticketId){//插入了订单表才是真正购买成功
                return show(0,'购买失败');
            }
            $_POST['ticket_id'] = $ticketId;
            $seatId = D("Seat")->insert($_POST);
//            print_r($seatId);

            if(!$seatId){
                return show(0,"购买失败");
            }

//            $this->redirect("/bigticket/admin?c=buy");
//            print_r($seatId);
            return show(1,'操作成功');

        }
        $this->display();
    }
}