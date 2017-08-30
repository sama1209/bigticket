<?php
namespace Common\Model;
use Think\Model;
class MenuModel extends Model{
    private $_db = '';
    public function __construct()
    {
        $this->_db = M('menu');//实例化对象
    }
    public function getAdminMenus()
    {
        //筛选条件
        $data = array(
            'status' => 1,
            'type' => 1,
        );
        $res = $this->_db->where($data)
            ->order('listorder desc,menu_id desc')
            ->select();
        return $res;
    }
    public function getMenus($data,$page,$pageSize=10){
        //获取不是删除的数据
        $data['status'] = array('neq',-1);
        //起始数据，通过页数-1，乘每页形成多少条，来设置
        $offset = ($page - 1) * $pageSize;

        $list = $this->_db->where($data)->order('listorder desc,menu_id desc')->limit($offset,$pageSize)->select();
        return $list;
    }
    public function getMenusCount(){
        //获取不是删除的数据
        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();//返回数据的总数
    }
    public function setStatus(){

    }
    public function find($id){
            if(!$id || !is_numeric($id)){
                //判断ID是否为空或者说是非数字,返回一个空数组
                return array();
            }
            return $this->_db->where('menu_id='.$id)->find();
    }
    public function updateMenuByID($id,$data){
        if(!$id || !is_numeric($id)){
            //判断ID是否为空或者说是非数字,返回一个空数组
            return array();
        }
        if(!data || !is_array($data)){
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where("menu_id=".$id)->save($data);
    }
    public function insert($data =array()){
            //先判断是否为空或者说不是数组
            if(!$data || !is_array($data)){
                return 0;
            }
            return $this->_db->add($data);
    }
    public function updateStatusById($id, $status){
        //还是先判断
        if(!is_numeric($id) || !$id){
            return show(0,'id不合法');
        }
//        if(!is_numeric($status)===false || !$status){
//            return show(0,'状态不合法');
//        }
        $data['status'] = $status;//要更改的信息
        return $this->_db->where('menu_id='.$id)->save($data);
    }
}