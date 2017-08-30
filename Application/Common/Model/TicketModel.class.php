<?php
namespace Common\Model;
use Think\Model;
class TicketModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('ticket');//实例化对象
    }
    public function insert($data=array()){
        if(!$data || !is_array($data)){
            return 0;
        }
        $data['buyer'] = getLoginUsername();
        $data['buyTime'] = time();
        return $this->_db->add($data);
    }
    public function getTicket($data,$page,$pageSize=10){
        $conditions = $data;
        //在news表中，检查的是title 和 catid
        //这是搜索传过来的值，分页的时候先检查一下有没有这两个值，才可以完成搜索的功能，get
        if($data['title'] && isset($data['title'])){
            //先检查传入来的数据，然后做模糊搜索
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        if($data['buyer'] && isset($data['buyer'])){
            //先检查传入来的数据，然后做模糊搜索
            $conditions['buyer'] = array('like','%'.$data['buyer'].'%');
        }
//        if(isset($data['carid']) && $data['catid']){
//            $conditions['catid'] = intval($data['catid']);
//        }
        $conditions['status'] = array('neq',-1);
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($conditions)
            ->order('ticket_id desc')
            ->limit($offset,$pageSize)
            ->select();

        return $list;
    }

    public function updateStautusById($id,$status){
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if(!is_numeric($status)){
            throw_exception('status不能为非数字');
        }
        $data['status']=$status;
        return $this->_db->where('ticket_id='.$id)->save($data);
    }

    public function getTicketCount($data){
        if($data['title']){
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        //获取不是删除的数据
        $conditions['status'] = array('neq',-1);
        return $this->_db->where($conditions)->count();//返回数据的总数
    }
    public function getMax(){
        $data = array(
            'status'=>1
        );
        $id = $this->_db->field("count(*) as count,movie_id")->group("movie_id")->select();
        return $id[0];
    }
}