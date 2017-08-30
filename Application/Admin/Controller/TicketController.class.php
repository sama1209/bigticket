<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
use Think\Exception;

class TicketController extends CommonController
{
    public function index()
    {
        $data = array();
        $title = $_GET['title'];
        $buyer =$_GET['buyer'];
        if($title){
            $data['title'] = $title;
        }
        if($buyer){
            $data['buyer']=$buyer;
        }
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 8;
        $ticket = D("Ticket")->getTicket($data,$page,$pageSize);
        $ticketCount = D("Ticket")->getTicketCount($data);

//        print_r($ticket);
//        exit();

        $res = new \Think\Page($ticketCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('ticket',$ticket);
        $this->assign('title',$title);
        $this->assign('buyer',$buyer);
        $this->display();
    }

    public function setStatus(){
        try{
            if($_POST){
                $id = $_POST['id'];
                $status = $_POST['status'];
                if(!$id){
                    return show(0,'ID不存在');
                }
                $res = D('Ticket')->updateStautusById($id,$status);

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

    public function add(){
        $this->redirect("/bigticket/admin?c=buy");
    }
    public function select(){
        //具体的购票页面
        $this->display();
    }
}