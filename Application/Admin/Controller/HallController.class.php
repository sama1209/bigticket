<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
use Think\Exception;

class HallController extends CommonController{
    public function index(){
        $hall = D('Hall')->getHall();
        $this->assign('hall',$hall);
        $this->display();
    }
    public function add(){
        if($_POST){
            if($_POST['hall_id']){
                $this->save($_POST);
            }else{
                $res = D('Hall')->insert($_POST);
                if($res)return show(1,'新增成功');
                return show(0,'新增失败');
            }
        }else{
            $this->display();
        }
    }
    public function edit(){
        $hallID = $_GET['id'];
        //获取到单条记录
        $hall = D("Hall")->find($hallID);
        //再把数据传递给模板
        $this->assign('hall',$hall);
        $this->display();
    }
    public function setStatus(){
        try {
            if($_POST){
                $id = $_POST['id'];
                $status = $_POST['status'];
                if(!$id){
                    return show(0, 'ID不存在');
                }
                $res = D('Hall')->updateStatusByID($id,$status);

                if($res){
                    return show(1, '操作成功');
                }else{
                    return show(0, '操作失败');
                }
            }
            return show(0, '没有提交的内容');
        } catch (Exception $e) {
            return show(0, $e->getMessage());
        }
    }
    public function save($data){
        $menuId = $data['hall_id'];
        unset($data['hall_id']);
        try{
            $id = D("Hall")->updateHallByID($menuId,$data);
            if($id === false){
                return show(0,'更新失败');
            }else if($id == false){
                return show(1,'更新成功，但没有无数据发送变化');
            }
            return show(1,'更新成功');
        }catch (Exception $exception){
            return show(0,$exception->getMessage());
        }
    }



}