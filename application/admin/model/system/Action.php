<?php
/**
 * Action.php
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

namespace app\admin\model\system;


use think\Model;
use think\model\concern\SoftDelete;

class Action extends Model
{
    use SoftDelete;
    protected $table='system_actions';

}