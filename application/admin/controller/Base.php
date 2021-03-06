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

class Base extends Controller {
	protected function initialize() {
	    if(!Auth::getUserId()){
            $this->redirect('/admin/system/common/login');
        }
		$request = request();
		$code = $request->module() . '/' . $request->controller() . '/' . $request->action();
		die($code);
		if (!Auth::check($code)) {
		    //没有权限
            $this->redirect( 'admin/system.common/noPermission');
		}
	}

}