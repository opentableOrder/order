<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->assign('web_title', '订餐系统');
        $this->display();
    }
}