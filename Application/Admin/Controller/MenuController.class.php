<?php
/**
 * 后台菜单相关
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class MenuController extends CommonController {
    public function index() {
        $data = array();
        if(isset($_REQUEST['type']) && in_array($_REQUEST['type'], array(0,1))) {
            $data['type'] = intval($_REQUEST['type']);
            $this->assign('type',$data['type']);
        }else{
            $this->assign('type',-100);
        }
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;
        $menus = D("Menu")->getMenus($data,$page,$pageSize);
        $menusCount = D("Menu")->getMenusCount();

        $res = new \Think\Page($menusCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('menus',$menus);
    	$this->display();
    }
    public function setStatus()
    {
        //做个转换
        $data=array(
            'id'=>intval($_POST['id']),
            'status'=>intval($_POST['status']),
        );
        // print_r($data);
        return parent::setStatus($data,'Menu');
    }
    public function edit(){
            $menuID = $_GET['id'];
            //获取到单条记录
            $menu = D("Menu")->find($menuID);
            //再把数据传递给模板
            $this->assign('menu',$menu);
            $this->display();
    }
    public function add(){
        if($_POST) {
            //有提交，判断一下
            if (!isset($_POST['name']) || !$_POST['name']) {
                return show(0, '菜单名不能为空');
            }
            if (!isset($_POST['m']) || !$_POST['m']) {
                return show(0, '模块名不能为空');
            }
            if (!isset($_POST['c']) || !$_POST['c']) {
                return show(0, '控制器名不能为空');
            }
            if (!isset($_POST['f']) || !$_POST['f']) {
                return show(0, '方法名不能为空');
            }
            if ($_POST['menu_id']) {
                return $this->save($_POST);
            }

            $menuID = D('Menu')->insert($_POST);
            if ($menuID) {
                return show(1, '新增成功', $menuID);
            }
            return show(0, '新增失败', $menuID);
        }else{
            $this->display();
        }
    }
    public function save($data){
        $menuId = $data['menu_id'];
        unset($data['menu_id']);
        try{
            $id = D("Menu")->updateMenuByID($menuId,$data);
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