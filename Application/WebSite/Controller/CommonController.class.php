<?php
namespace WebSite\Controller;
use Think\Controller;
class CommonController extends Controller {
    //判断session登陆状态
	function _initialize(){
        if(!session('?username')){  
            $this->success('请先登录!', '/WebSite/Login/index',0);
            exit;
        }
        $user = M('user')->getById($_SESSION['id']);
        $this->assign('typeUser',$user);
    }
	
}