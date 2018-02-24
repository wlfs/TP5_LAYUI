<?php
/**
 * Output.php
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

namespace app\common\facade;


use think\Facade;

class Output extends Facade
{

    protected static function getFacadeClass()
    {
        return 'app\common\Output';
    }
}