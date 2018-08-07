<?php
/**
 * Created by PhpStorm.
 * User: 9ey
 * Date: 2018/7/21
 * Time: 20:28
 */

namespace app\common\migrator;


use think\migration\Migrator;

class Mysql extends Migrator
{
    /**
     * @param string $tableName
     * @param array  $options
     * @return MysqlTable
     */
    public  function table($tableName, $options = [])
    {
        return new MysqlTable($tableName, $options, $this->getAdapter());
    }
}