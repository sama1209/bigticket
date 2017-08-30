<?php
namespace Common\Model;
use Think\Model;

/**
 * 上传图片类
 */
class UploadImageModel extends Model {
    private $_uploadObj = '';
    private $_uploadImageData = '';

    const UPLOAD = 'upload';

    public function __construct() {
        //创建think自带的上传类对象
        $this->_uploadObj = new  \Think\Upload();
        //dump($this->_uploadObj);
        //   ./bigticket/upload/
        $this->_uploadObj->rootPath = './'.self::UPLOAD.'/';
        //按日期划分，文件目录
        $this->_uploadObj->subName = date(Y) . '/' . date(m) .'/' . date(d);
    }

    public function upload() {
        //调用think自带的上传类，跟这里是upload是不一样的，创建上传对象
        $res = $this->_uploadObj->upload();
        if($res) {
//            print_r($res['imgFile']);
            return '/' .self::UPLOAD . '/' . $res['imgFile']['savepath'] . $res['imgFile']['savename'];
        }else{
            return false;
        }
    }

    public function imageUpload() {
        $res = $this->_uploadObj->upload();
        //是在这里打印了
//        print_r($res);
        if($res) {
            //返回一个资源路径
             return '/' .self::UPLOAD . '/' . $res['file']['savepath'] . $res['file']['savename'];
        }else{
            return false;
        }
    }
}
