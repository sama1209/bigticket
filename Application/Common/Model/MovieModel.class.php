<?php
namespace Common\Model;
use Think\Model;
class MovieModel extends Model{
    private $_db = '';

    public function __construct() {
        $this->_db = M('movie');
    }
    public function insert($date=array()){
        if(!is_array($date) || !$date){
            return 0;//先做个判断
        }
        $date['create_time']=time();
        $date['creater'] = getLoginUsername();
        $res = $this->_db->add($date);
        return $res;
    }
    public function getMovie($data,$page,$pageSize=10){
        $conditions = $data;
        //在news表中，检查的是title 和 catid
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
            ->order('movie_id desc')
            ->limit($offset,$pageSize)
            ->select();

        return $list;
    }
    public function getMovieCount($data=array()){
        $conditions = $data;
        $conditions['status'] = array('neq',-1);
        //在news表中，检查的是title 和 catid
        //这是搜索传过来的值，分页的时候先检查一下有没有这两个值，才可以完成搜索的功能，get
        if($data['title'] && isset($data['title'])){
            //先检查传入来的数据，然后做模糊搜索
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
//        if(isset($data['carid']) && $data['catid']){
//            $conditions['catid'] = intval($data['catid']);
//        }
        return $this->_db->where($conditions)->count();
    }
    public function find($id) {
        $data = $this->_db->where('movie_id='.$id)->find();
        return $data;
    }
    public function updateById($id,$data){
        if(!$id || !is_numeric($id) ) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新数据不合法');
        }

        return $this->_db->where('movie_id='.$id)->save($data);
    }
    public function updateStautusById($id,$status){
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if(!is_numeric($status)){
            throw_exception('status不能为非数字');
        }
        $data['status']=$status;
        return $this->_db->where('movie_id='.$id)->save($data);
    }
    public function getBarMovie(){
        $data = array(
            'status'=>1, //获取一些正常的 改为1即可
        );
        $res = $this->_db->where($data)
            ->order('movie_id desc')
            ->select();
        return $res;
    }
    public function getNormalMovie(){
        $data=array('status'=>1);
        return $this->_db->where($data)->select();
    }
}