<?php
/**
 * Common.php
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

namespace app\admin\controller\system;

use app\admin\logic\system\AdminLogic;
use app\facade\Auth;
use app\facade\Output;
use think\captcha\Captcha;
use think\Request;

class Common {

	/**
	 * 登录
	 * @return \think\response\View
	 */
	public function login() {
		return view('system/common/login');
	}
	//登录中
	public function loging(Request $request) {
        $captcha=$request->post('captcha');
        if(!captcha_check($captcha)){
            return Output::error('验证码错误',-1)->toJson();
        };
        $uname=$request->post('username');
        $pass=$request->post('password');
        $bll=new AdminLogic();
        $result=$bll->login($uname,md5($pass));
        if($result->code==0){
            Auth::saveUserInfo($result->data);
            Auth::saveCodes($bll->getUserActions($result->data->id));
            $result->data=[];
        }
        return $result->toJson();
	}

	//退出登录
	public function logout() {
		return redirect('admin_login');
	}

	//验证码
	public function captcha() {
		$config = [
			// 验证码字体大小
			'imageW' => 128,
			// 验证码位数
			'imageH' => 34,
			'fontSize' => 14,
			'useImgBg' => false,
			'bg' => [243, 243, 243],
			// 关闭验证码杂点
			'useNoise' => false,
		];
		$captcha = new Captcha($config);
		return $captcha->entry();
	}
}