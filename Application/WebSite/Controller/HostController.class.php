<?php
namespace WebSite\Controller;
class HostController extends CommonController {
    public function index(){
        $computer_name = I('get.computer_name');
        $map = array('isdel' => 0,'computer_name' => array('LIKE',"%{$computer_name}%"));
        $count = M('host')->where($map)->count();
        $page = new \Think\Page($count,10);
        $list = M('host')->where($map)->order('id desc')->limit($page->firstRow,$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('host',$list);
        $this->assign('computer_name',$computer_name);
        $this->display('list');
    }

    public function add(){
        $this->assign('title','添加网站');
        $this->display('info');
    }

    public function edit(){
        $id = I('get.id');
        $info = M('host')->getById($id);
        $this->assign('title','编辑网站');
        $this->assign('info',$info);
        $this->assign('id',$id);
        $this->display('info');
    }

    public function update(){
        $data = array(
            'computer_name' => I('post.computer_name'),
            'host_addr' => I('post.host_addr'),
            'server_name' => I('post.server_name'),
            'website_name' => I('post.website_name'),
            'host_name' => I('post.host_name'),
            'file_name' => I('post.file_name'),
            'port' => I('post.port'),
        );
        $map = array(
            'id' => I('post.id')
        );
        $rs = M('host')->where($map)->save($data);
        if($rs === false){
            $this->error('更新失败','index',2);
        }
        $this->success('更新成功',U('/WebSite/Host/edit?id='.I('post.id')));
    }

    public function insert(){
        $map = array(
            'computer_name' => I('post.computer_name'),
            'host_addr' => I('post.host_addr'),
            'server_name' => I('post.server_name'),
            'website_name' => I('post.website_name'),
            'host_name' => I('post.host_name'),
            'port' => I('post.port'),
            'file_name' => I('post.file_name'),
            'create_time' => date('Y-m-d H:i:s'),
        );
        $id = M('host')->add($map);
        if(!$id){
            $this->error('新增失败','index',2);
        }
        $this->success('新增成功',U('/WebSite/Host/add'));
    }

    public function delete(){
        $id = I('get.id');
        $map = array(
            'id'=> $id
        );
        $rs = M('host')->where($map)->setField('isdel',1);
        if($rs === false){
            $this->error('删除失败', 'index', 2);
        }
        $this->success('删除成功',U('/WebSite/Host/index'));
    }
}