<?php
namespace Common\Model;
use Think\Model;
class HallModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('hall');
    }
    public function getHall(){
        $data['status']=array('neq',-1);
        $res = $this->_db->where($data)
            ->select();
        return $res;
    }
    public function getBarHall(){
        $data=array(
            'status'=>1,
        );
        $res = $this->_db->where($data)
            ->select();
        return $res;
    }
    public function insert($data){
        $data['status']=1;
        return $this->_db->add($data);
    }
    public function updateStatusByID($id,$status)
    {
        if (!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if (!is_numeric($status)) {
            throw_exception('状态不合法');
        }
        $data['status']=$status;
        return $this->_db->where('hall_id='.$id)->save($data);
    }
    public function find($id){
        if(!$id || !is_numeric($id)){
            return array();
        }
        return $this->_db->where('hall_id='.$id)->find();
    }
    public function updateHallByID($id,$data){
        if(!$id || !is_numeric($id) ) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新数据不合法');
        }
        return $this->_db->where('hall_id='.$id)->save($data);
    }
}