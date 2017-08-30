<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class LoginController extends Controller {

    public function index(){

        if(session('loginAdmin')) {
           $this->redirect('/bigticket/admin.php');
        }
        // admin.php?c=index
        $this->display();
    }


    public function check(){

        //要用file_get_contents("php://input") 才能获取到！很奇怪
        //之前的一个Bug，js中post过来时，修改了默认的contenttype 为 application/plain 造成只能接受纯文本格式，理应是application/x-www-form-urlencoded;
        //之前造成整个项目都没办法post的Bug，都是这个原因


//        $data = (file_get_contents("php://input"));//从原始输入流中提取是没问题的
//        parse_str($data, $params);
//        print_r($params);
//        exit();
//        var_dump('post.');
//        exit();
//        print_r($_POST);
//        print_r(file_get_contents("php://input"));
//        exit();
//
//        $username = $params['username'];
//        $password = $params['password'];
//        $passcode = $params['passcode'];

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passcode = $_POST['passcode'];


        if(!trim($username)){
            return show(0, '用户名不能为空');
        }
        if(!trim($password)){
            return show(0, '密码不能为空');
        }
        if(!trim($passcode)){
            return show(0, '验证码不能为空');
        }
        //实例化
        //校验账户密码
        $ret = D('Admin')->getAdminByUsername($username);
       // print_r($ret) ;
        if(!$ret){
            return show(0,'该用户不存在');
        }
        if($ret['password'] != (($password))){
            return show(0,'密码错误');
        }
        //记录最后登录时间,更新
        D("Admin")->updateByAdminId($ret['admin_id'],array('lastlogintime'=>time()));

        //重重考验，是正确的了
        //记录session
        session('loginAdmin',$ret);

//        $this->redirect('/bigticket/admin.php');
        return show(1,'登陆成功');
    }
    public function verify()
    {
        $Verify =  new \Think\Verify();
        $Verify->codeSet = '0123456789';
        $Verify->fontSize = 30;
        $Verify->length   = 4;
        $Verify->useNoise = true;
        $Verify->reset=false;
        $Verify->entry();

    }
    
    public function loginout(){
        session('loginAdmin',null);
        $this->redirect('/bigticket/admin.php?m=admin&c=login');
    }
 
}