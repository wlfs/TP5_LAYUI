<?php
/**
 * Admin.php
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

namespace app\admin\model\system;

use think\facade\Config;
use think\Model;

class Admin extends Model
{
    /*-----------public---------------*/
    /**
     * 正常
     */
    const NORMAL = 1;
    /**
     * 禁用
     */
    const DISABLE = 2;

    /**
     * 状态
     */
    public static function status()
    {
        return [
            static::NORMAL => '正常',
            static::DISABLE => '禁用',
        ];
    }

    public function getStatusTextAttr($value,$data)
    {
        return static::status()[$data['status']];
    }

    public function setLastLoginIpAttr($ip,$data)
    {
        $data['last_login_address'] = getIpInfo($ip);
        return $ip;
    }

    /**
     * 创建时间获取器
     * @param $value
     * @return false|string
     */
    public function getCreatedAttr($value)
    {
        if (empty($value))
            return '无';
        return date(Config::get('app.datetime'), $value);
    }

    /**
     *最后登录时间获取器
     * @param $value
     * @return false|string
     */
    public function getLastLoginTimeAttr($value)
    {
        if (empty($value))
            return '无';
        return date(Config::get('app.datetime'), $value);
    }

    /*-----------protected------------*/
    protected $table = 'system_admins';
}