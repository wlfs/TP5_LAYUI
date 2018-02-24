<?php
/**
 * Auth.php
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

namespace app\common;


use think\facade\Config;
use think\facade\Session;

class Auth
{
    //动作编码缓存keys
    private $cacheActionKey = 'actionCodes';

    private $cacheUserInfoKey = 'userInfoKey';

    /**
     * 检查权限
     * @param $code
     * @return bool
     */
    public function check($code)
    {
        $code = strtolower($code);
        $codes = Session::get($this->cacheActionKey);
        $debug = Config::get('app.app_debug');
        if (!$debug) {
            if (!empty($codes)) {
                if (in_array($code, $codes)) {
                    return true;
                }
            }
            return false;
        }
        return true;
    }

    /**
     * 保存codes
     * @param $codes
     */
    public function saveCodes($codes)
    {
        if (empty($codes)) {
            return;
        }
        $cs = [];
        foreach ($codes as $code) {
            $cs[] = strtolower($code);
        }
        Session::set($this->cacheActionKey, $cs);
    }

    /**
     * 保存用户信息
     * @param $info
     */
    public function saveUserInfo($info)
    {
        Session::set($this->cacheUserInfoKey, $info);
    }

    /**
     * 获取用户编号
     */
    public function getUserId()
    {
        Session::get($this->cacheUserInfoKey . '.id');
    }

    /**
     * 获取用户信息
     */
    public function getUserInfo()
    {
        Session::get($this->cacheUserInfoKey);
    }
}