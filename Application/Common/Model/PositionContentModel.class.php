<?php
namespace Common\Model;
use Think\Model;

/**
 * 推荐位wmodel操作
 */
class PositionContentModel extends Model {
	private $_db = '';

	public function __construct() {
		$this->_db = M('position_content');
	}

	public function select($data = array(),$limit=0) {

		if($data['title']) {
			$data['title'] = array('like', '%'.$data['title'].'%');
		}
		$this->_db->where($data)->order('id desc');
		if($limit) {
			$this->_db->limit($limit);
		}
		$list = $this->_db->select();
		//echo $this->_db->getLastSql();exit;
		return $list;
	}
	//查找
	public function find($id) {
		$data = $this->_db->where('id='.$id)->find();
		return $data;
	}
    /**
    * 插入相关数据
    * @param  array  $data [description]
    * @return intval
    */
    public function insert($res=array()) {
    	if(!$res || !is_array($res)) {
    		return 0;
    	}
    	if(!$res['create_time']) {
    		$res['create_time'] = time();
    	}
		
    	return $this->_db->add($res);
    }

	/**
	 * 通过id更新的状态
	 * @param $id
	 * @param $status
	 * @return bool
	 */
	public function updateStatusById($id, $status) {
		if(!is_numeric($status)) {
			throw_exception("status不能为非数字");
		}
		if(!$id || !is_numeric($id)) {
			throw_exception("ID不合法");
		}
		$data['status'] = $status;
		return  $this->_db->where('id='.$id)->save($data); // 根据条件更新记录

	}

	public function updateById($id, $data) {

		if(!$id || !is_numeric($id)) {
			throw_exception("ID不合法");
		}
		if(!$data || !is_array($data)) {
			throw_exception('更新的数据不合法');
		}
		//先判断，在根据条件更新
		return  $this->_db->where('id='.$id)->save($data); // 根据条件更新记录
	}

	/**7排序**/
	//配合公用的listorder方法
	//先检测一下Id，然后查询数据库，返回
	public function updateListorderById($id, $listorder) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }

        $data = array('listorder'=>intval($listorder));
        return $this->_db->where('id='.$id)->save($data);

    }
    public function getPositioncontent($data,$page,$pageSize){
        $conditions = $data;
        //在news表中，检查的是title 和 catid
        //这是搜索传过来的值，分页的时候先检查一下有没有这两个值，才可以完成搜索的功能，get
        if($data['title'] && isset($data['title'])){
            //先检查传入来的数据，然后做模糊搜索
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        if(isset($data['id']) && $data['id']){
            $conditions['id'] = intval($data['id']);
        }

        $conditions['status'] = array('neq',-1);

	    $offset = ($page - 1) * $pageSize;
	    $list =$this->_db->where($conditions)
                         ->order('listorder desc , id desc')
                         ->limit($offset,$pageSize)
                         ->select();

	    return $list;
    }
    public function getPositioncontentCount($data){

        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();//返回数量
    }

    public function getHotMovie(){
        $data =array(
            'status'=>1,
            'position_id'=>2
        );
        return $this->_db->where($data)->select();
    }
    public function getWillMovie(){
        $data =array(
            'status'=>1,
            'position_id'=>3
        );
        return $this->_db->where($data)->select();
    }
    public function getPastMovie(){
        $data =array(
            'status'=>1,
            'position_id'=>4
        );
        return $this->_db->where($data)->select();
    }

    public function getBigMovie(){
        $data =array(
            'status'=>1,
            'position_id'=>1
        );
        return $this->_db->where($data)->order("create_time desc")->select();
    }


}
