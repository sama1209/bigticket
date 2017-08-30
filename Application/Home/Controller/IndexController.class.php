<?php
namespace Home\Controller;
use Think\Exception;

class IndexController extends CommonController {
    public function index(){

        $bigMovie = D("PositionContent")->getBigMovie();
        $sellingMovie =D("PositionContent")->getHotMovie();
        $willMovie = D("PositionContent")->getWillMovie();
        $passMovie = D("PositionContent")->getPastMovie();
//        print_r($sellingMovie);
//        die();
        $this->assign('bigMovie',$bigMovie);
        $this->assign('sellingMovie',$sellingMovie);
        $this->assign('will',$willMovie);
        $this->assign('pass',$passMovie);
        $this->display();
    }
}