<?php
/**
 * AdminBll.php
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

namespace app\admin\logic\system;


use app\admin\logic\BaseLogic;
use app\admin\model\system\Admin;
use app\admin\model\system\LoginRecord;
use app\common\facade\Output;

class AdminLogic extends BaseLogic
{
    public function login($uname, $pass)
    {
        $map['login_name'] = $uname;
        $map['status'] = Admin::NORMAL;
        $ainfo = Admin::where($map)->find();
        if ($ainfo) {
            //验证用户密码是否正确
            if ($ainfo['password'] == md5($pass . $ainfo['salt'])) {
                $ainfo->last_login_ip = request()->ip();
                $ainfo->last_login_time = time();
                $ainfo->save();
                unset($ainfo['password']);
                unset($ainfo['salt']);
                //添加登录日志
                $lrModel = new LoginRecord();
                $lrModel->ip = $ainfo->last_login_ip;
                $lrModel->ip_address = $ainfo->last_login_address;
                $lrModel->admin_id = $ainfo['id'];
                $lrModel->created = time();
                $lrModel->save();
                return Output::success('成功', $ainfo);
            } else {
                return Output::error('用户名或密码错误');
            }
        }
        return Output::error('用户名或密码错误');
    }

    public function getUserActions($uid)
    {
        $map['ug.admin_id'] = $uid;
        $codes = Admin::table('system_admin_group')->alias('ug')->where($map)
            ->join('system_group_actions ga ', ' ga.group_id=ug.group_id')
            ->join('system_actions a  ', ' a.id=ga.action_id')
            ->distinct('code')
            ->column('code');
        return $codes;
    }

    public function getDetail($id){
        return Admin::get($id);
    }

    public function page($keyword,$status=0)
    {
        $map=array();
        if(!empty($keyword)){
            $map['u.name|u.mobile|u.login_name']=array('like',"%$keyword%");
        }
        if($status>0){
            $map['u.status']=$status;
        }
        return Admin::where($map)->alias('u')->paginate();
    }
}