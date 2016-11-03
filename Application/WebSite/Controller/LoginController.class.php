<?php
namespace WebSite\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $this->display('login');
    }
    
    public function loginsubmit(){
        if (IS_POST){
            $username = I('post.username');
            $map = array(
                'username' => $username,
            );
            $data = M("user")->where($map)->select();
			if(count($data)==1){
			    $hash = $data[0]['password'];
                if(password_verify(I('post.password'),$hash)){
                    session('id',$data[0]['id']);
                    session('username',$data[0]['username']);
                    $this->success('登录成功!','/WebSite/Host/index',0);
                }else{
                    $this->error('登录失败,请检查用户名或密码是否正确!', 'index',2);
                }
            }else{
                $this->error('登录失败,请检查用户名或密码是否正确!', 'index',2);
            }
        }else{
            $this->error('非法请求');
        }
    }
    
    public function logout(){
        session(null);
        $this->success('退出成功!', 'index',0);
    }
}