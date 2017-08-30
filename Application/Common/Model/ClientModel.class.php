<?php
namespace Common\Model;
use Think\Model;
class ClientModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('client');
    }
    public function getClient($data,$page,$pageSize=10){
        $conditions = $data;
        //这是搜索传过来的值，分页的时候先检查一下有没有这两个值，才可以完成搜索的功能，get
        if($data['name'] && isset($data['name'])){
            //先检查传入来的数据，然后做模糊搜索
            $conditions['name'] = array('like','%'.$data['name'].'%');
        }
        $conditions['status'] = array('neq',-1);
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($conditions)
            ->order('client_id desc')
            ->limit($offset,$pageSize)
            ->select();
        return $list;
    }
    public function getClientCount(){
        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();//返回数据的总数
    }
    public function getClientByUsername($name){
        //是字符串所以要有双引号
        return $this->_db->where('name="'.$name.'"')->find();
    }
    public function insert($data=array()){
        if(!$data || !is_array($data)){
            return 0;
        }
        $data['lastlogintime'] = time();
        return $this->_db->add($data);
    }
    public function find($id){
        if(!$id || !is_numeric($id)){
            throw_exception("ID不合法");
        }
        return $this->_db->where('client_id='.$id)->find();
    }
    public function updateByID($id,$data){
        if(!$id || !is_numeric($id)){
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)){
            throw_exception("更新的数据不合法");
        }
        return $this->_db->where("client_id=".$id)->save($data);
    }
    public function updateStautusById($id,$status){
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if(!is_numeric($status)){
            throw_exception('status不能为非数字');
        }
        $data['status']=$status;
        return $this->_db->where('client_id='.$id)->save($data);
    }
}