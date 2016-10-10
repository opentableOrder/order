<?php
/**
 * Author: dell
 * Date: 2016/10/8
 * Time: 16:12
 * Description:
 */

namespace Home\Controller;
use Think\Controller;
use Think\Page;

class ActiveController extends Controller {
    public function index() {
        $this->assign('web_title', '活动管理');
        $this->display();
    }

    public function getActivities() {
        //$page = I('page') ? I('page') : 1;
        $activity = M('Activity');
        $count = $activity->count();
        $page = new Page($count, 1);
        $show = $page->show();
        $result = $activity->field('id', true)->limit($page->firstRow.','.$page->listRows)->select();
        if ($result) {


            $arr['status'] = 1;
            $arr['msg'] = '';
            $arr['data'] = $result;
            $arr['page'] = $show;
            $this->ajaxReturn($arr);
        }

    }

    public function add() {
        $this->assign('web_title', '活动报名');
        $this->display();
    }

    public function addHandle() {
        $data = array();
        $data['name'] = I('act_name');
        $data['type'] = I('act_type');
        $data['star'] = strtotime(I('start'));
        $data['end'] = strtotime(I('end'));
        $data['bz'] = I('bz');
        $data['bp'] = I('bp');
        $data['cut_date'] = strtotime(I('act_close'));

        if (M('Activity')->add($data)) {
            echo U('Active/index');
        } else {
            echo '上传失败';
        }


    }

    public function updateImg() {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            foreach($info as $file){
                echo $file['savepath'].$file['savename'];
            }
        }
    }
}