<?php
/**
 * Admin.php
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

namespace app\admin\controller\system;


use app\admin\logic\system\ActionLogic;
use app\admin\logic\system\AdminLogic;
use app\admin\controller\Base;
use think\Request;

/**
 * @desc 系统用户管理
 * Class Admin
 * @package app\admin\controller\system
 */
class Admin extends Base
{
    /**
     * @desc 列表
     * @param AdminLogic $bll
     * @param Request $request
     * @return mixed
     */
    public function index(AdminLogic $bll, Request $request)
    {
        $al=new ActionLogic();
        $al->getDir(APP_PATH);
        $data=$bll->page($request->get('keyword'),$request->get('status'));
        $this->assign('data',$data);
        return $this->fetch('system/admin/index');

    }

    public function edit($id, AdminLogic $bll){
        $model=$bll->getDetail($id);
        $this->assign('model',$model);
        return $this->fetch('system/admin/edit');
    }
    public function del(AdminLogic $bll, $id){
        $result=$bll->del($id);
        return $result->toJson();
    }
    public function create(){
        return $this->fetch('system/admin/create');
    }
    public function add(Request $request){

    }
    public function update(Request $request,$id){

    }
}