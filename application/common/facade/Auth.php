<?php
/**
 * Auth.php
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

namespace app\common\facade;

use think\Facade;

/**
 * @see \app\common\Auth
 * Class Auth
 * @package app\common\facade
 */
class Auth extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\Auth';
    }
}