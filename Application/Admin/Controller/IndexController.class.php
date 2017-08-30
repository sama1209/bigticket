<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(!session('loginAdmin')) {
            $this->redirect('/bigticket/admin.php?c=login');
        }
        //客户数量
        $client =D('Client')->getClientCount();
        //总数量
        $movieCount =D("Movie")->getMovieCount();
        //票房部分
        $id = D('Ticket')->getMax();
        //排片部分
        $scenecount = D('Scene')->getTodayScene();
        $max = D('Movie')->find($id['movie_id']);
        $this->assign('moiveCount',$movieCount);
        $this->assign('movieName',$max['title']);
        $this->assign('sceneCount',$scenecount);
        $this->assign('client',$client);
        $this->display();
    }

}