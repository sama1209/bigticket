<?php
namespace Common\Model;
use Think\Model;
class SceneModel extends Model{
    private $_db = '';

    public function __construct() {
        $this->_db = M('scene');
    }
    public function insert($data = array()){
        if(!is_array($data) || !$data){
            return 0;//先做个判断
        }
        $time = mktime($data['hour'],$data['minute'],0,$data['month'],$data['date'],$data['year']);
        $data['time'] = $time;
        $data['create']=time();
        $data['creator'] = getLoginUsername();
        $res = $this->_db->add($data);
        return $res;
    }

    public function updateById($id,$data){
        if(!$id || !is_numeric($id) ) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新数据不合法');
        }
        $time = mktime($data['hour'],$data['minute'],0,$data['month'],$data['date'],$data['year']);
        $data['time'] = $time;
        return $this->_db->where('scene_id='.$id)->save($data);
    }

      public function getSceneCount(){
        $conditions['status'] = array('neq',-1);
        return $this->_db->where($conditions)->count();
      }
      public function updateStatusById($id,$status){
          if(!$id || !is_numeric($id)){
              throw_exception('ID不合法');
          }
          if(!is_numeric($status)){
              throw_exception('status不能为非数字');
          }

          $data['status'] = $status;
          return $this->_db->where('scene_id='.$id)->save($data);
      }
      public function getScene($data,$page,$pageSize=10){
          $conditions = $data;
          //这是搜索传过来的值，分页的时候先检查一下有没有这两个值，才可以完成搜索的功能，get
          if($data['title'] && isset($data['title'])){
              //先检查传入来的数据，然后做模糊搜索
              $conditions['title'] = array('like','%'.$data['title'].'%');
          }
//        if(isset($data['carid']) && $data['catid']){
//            $conditions['catid'] = intval($data['catid']);
//        }
          $conditions['status'] = array('neq',-1);
          $offset = ($page - 1) * $pageSize;
          $list = $this->_db->where($conditions)
              ->order('time desc')//以时间倒序，最新的前面
              ->limit($offset,$pageSize)
              ->select();

          return $list;
      }
      public function updateStautusById($id,$status){
          if (!$id || !is_numeric($id)) {
              throw_exception("ID不合法");
          }
          if (!is_numeric($status)) {
              throw_exception('状态不合法');
          }
          $data['status']=$status;
          return $this->_db->where('scene_id='.$id)->save($data);
      }
    public function find($id){
        if(!$id || !is_numeric($id)){
            return array();
        }
        return $this->_db->where('scene_id='.$id)->find();
    }
    public function getScenes(){
        $data['time'] = array('gt',time());
        $data['status'] = array('eq',1);
        $res = $this->_db->where($data)
            ->order('scene_id desc')
            ->select();
        return $res;
    }
    public function getSellingScene($data,$page,$pageSize=10){


        if($data['title'] && isset($data['title'])){
            //先检查传入来的数据，然后做模糊搜索
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        $conditions['time'] = array('gt',time());
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($conditions)
            ->order('time desc')//以时间倒序，最新的前面
            ->limit($offset,$pageSize)
            ->select();
        return $list;
    }
    public function getSellintCount(){
        $data['status'] = array('eq',1);
        $data['time'] = array('gt',time());
        return $this->_db->where($data)->count();
    }
    public function getTodayScene(){
        $data = array(
            'year'=>date('Y'),
            'month'=>date('m'),
            'day'=>date('d')
        );
        $starttime = (strtotime(date('Ymd')));
        $endtime = (strtotime(date('Ymd')) + 86400);
        $count =  $this->_db->where('time between '.$starttime.' and '.$endtime)->count();
        return $count;
    }

}