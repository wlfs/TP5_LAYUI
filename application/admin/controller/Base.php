<?php
/**
 * Base.php
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

namespace app\admin\controller;


use app\common\facade\Auth;
use think\Controller;
use think\facade\Config;

class Base extends Controller
{
    protected function initialize()
    {
        $request=request();
        $code= $request->module().'/'.$request->controller().'/'.$request->action();
        if(!Auth::check($code)){
            $this->redirect('admin_login');
        }
    }

}