<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
use Think\Exception;
/**
 * 用户管理相关
 * Created by PhpStorm.
 * User: ASUS-
 * Date: 2017/5/22
 * Time: 10:01
 */

class ClientController extends CommonController
{
    public function index()
    {
        $data = array();
        $name = $_GET['name'];
        if($name){
            $data['name'] = $name;
        }
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize =  10;
        $data['status'] = array('neq',-1);
        $client = D("Client")->getClient($data,$page,$pageSize);
        $clientCount = D("Client")->getClientCount();

//        print_r($ticket);
//        exit();

        $res = new \Think\Page($clientCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('client',$client);
        $this->assign('name',$name);
        $this->display();
    }
    public function add(){
        if($_POST){
            if(!isset($_POST['name']) || !$_POST['name']){
                return show(0,'用户名不能为空');
            }
            if(!isset($_POST['realname']) || !$_POST['realname']){
                return show(0,'真实姓名不能为空');
            }
            if(!isset($_POST['phone']) || !$_POST['phone']){
                return show(0,'联系电话不能为空');
            }
            if(!isset($_POST['email']) || !$_POST['email']){
                return show(0,'电子邮箱不能为空');
            }
            if($_POST['client_id']){
                $this->save($_POST);
            }
            if(!isset($_POST['password']) || !$_POST['password']){
                return show(0,'密码不能为空');
            }
            if(!isset($_POST['password2']) || !$_POST['password2']){
                return show(0,'密码不能为空');
            }
//            $_POST['password'] = getMd5Password($_POST['password']);
            if($_POST['password'] != $_POST['password2']){
                return show(0,'密码不一致');
            }
            $client = D("Client")->getClientByUsername($_POST['username']);
            if($client &&  $client['status']!=-1){
                return show(0,'该用户已存在');
            }
//            print_r($_POST);
//            die();
            //判断完成后进行新增
            $id = D('Client')->insert($_POST);

            if(!$id){
                return show(0,'新增失败');
            }
            return show(1,'新增成功');
        }else{
            $this->display();
        }
    }
    public function save($data){
        $clientId = $data['client_id'];
        unset($data['client_id']);
        try{
            $id = D("Client")->updateByID($clientId,$data);
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
    public function edit(){
        $clientId = $_GET['id'];
        $client = D('Client')->find($clientId);
        $this->assign('client',$client);
        $this->display();
    }
    public function setStatus()
    {
        try{
            if($_POST){
                $id = $_POST['id'];
                $status = $_POST['status'];

                if(!$id){
                    return show(0,'ID不存在');
                }
                $res = D('Client')->updateStautusById($id,$status);

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