<?php
namespace Common\Model;
use Think\Model;
class SeatModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('seat');//实例化对象
    }
    public function insert($data=array()){
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }
    public function getSeatBySceneId($id){
        if(!$id || !is_numeric($id)){
            return 0;
        }
        return $this->_db->where('scene_id='.$id)->select();
    }
}