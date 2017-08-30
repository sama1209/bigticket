<?php
namespace Home\Controller;

use Think\Controller;
use Think\Verify;

class PublicController extends Controller
{

    function  index()
    {
        $this->display();
    }
    function verify()
    {
        $Verify =  new \Think\Verify();
        $Verify->fontSize = 30;
        $Verify->length   = 3;
        $Verify->useNoise = false;
        $Verify->entry();

    }

    function check()
    {

        $code = $_POST['code'];

        if(check_verify($code) === true)
        {
            $this->success("正确") ;
        }else
        {
            $this->error("验证码错误") ;
        }

    }

}