<?php
namespace Common\Model;
use Think\Model;
class AdminModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('admin');//实例化对象
    }
    public function getAdminByUsername($username){
        //是字符串所以要有双引号
        return $this->_db->where('username="'.$username.'"')->find();
    }
    public function getAdmins(){
        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->select();
    }
    public function updateByAdminId($id,$data){
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)){
            throw_exception("更新的数据不合法");
        }
//        print_r($id);
//        print_r($data);
//        die();
        return $this->_db->where('admin_id='.$id)->save($data);
    }
    public function insert($data=array()){
        //先判断是否为空或者说不是数组
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }
    public function find($id){
        if(!$id || !is_numeric($id)){
            throw_exception("ID不合法");
        }
        return $this->_db->where('admin_id='.$id)->find();
    }
    public function updateStatusById($id,$status){
        if(!$id || !is_numeric($id) ) {
            throw_exception("ID不合法");
        }
        if(!is_numeric($status)) {
            throw_exception('状态不合法');
        }
        $data['status'] = $status;
        return $this->_db->where('admin_id='.$id)->save($data);
    }
}