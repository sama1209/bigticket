<?php
/**
 * 后台推荐位相关
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;
class PositionController extends CommonController
{
    public function index()
    {
        $data['status'] = array('neq', -1);
        $positions = D("Position")->select($data);
        $this->assign('positions', $positions);
        $this->assign('nav', '推荐位管理');
        $this->display();
    }
    public function add(){
        if($_POST){
            //有提交
            if(!isset($_POST['name']) || !$_POST['name']){
                return show(0, '推荐位名不能为空');
            }
            if(!isset($_POST['description']) || !$_POST['description']){
                return show(0, '推荐位描述不能为空');
            }
            //如果已经有ID字段了，说明这条数据已经存在数据库中，跳转到保存更新操作,
            if($_POST['id']){
                return $this->save($_POST);
            }

            //判断完毕后，提交到数据库

            $positionId = D("Position")->insert($_POST);
            if($positionId){
                return show(1, '新增成功',$positionId);
            }
            return show(0, '新增失败', $positionId);
        }
        else {
            //无新菜单提交
            $this->display();
        }
    }
    public function setStatus()
    {
//        try {
//            if ($_POST) {
//                $id = $_POST['id'];
//                $status = $_POST['status'];
//                $res = D("Position")->updateStatusById($id, $status);
//                if ($res) {
//                    return show(1, '操作成功');
//                } else {
//                    return show(0, '操作失败');
//                }
//
//            }
//        }catch (Exception $e) {
//            return show(0, $e->getMessage());
//        }
//
//        return show(0, '没有提交的内容');
//    }
        $data = array(
            'id' => $_POST['id'],
            'status' => $_POST['status'],
        );
        return parent::setStatus($data,'Position');
    }
    public function edit(){
        $positionId = $_GET['id'];
        //获取到单条记录
        $vo = D("Position")->find($positionId);
        //再把数据传递给模板
        $this->assign('vo',$vo);
        $this->display();
    }
    public function save($data){
        $positionId = $data['id'];
        //  print_r($menuID);
        unset($data['id']);
        //更新数据操作必须在Model层做处理
        try{
            $id = D("Position")->updateById($positionId,$data);
            if($id == false){
                return show(0, '更新失败');
            }
            return show(1, '更新成功');
        }catch (Exception $e){
            return show(0, $e->getMessage());
        }
    }

}