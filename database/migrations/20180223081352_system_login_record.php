<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemLoginRecord extends Migrator
{

    public function change()
    {
        $table = $this->table('system__login_record');
        $table->addColumn(Column::unsignedInteger('admin_id')->setComment('管理员编号'));
        $table->addColumn(Column::string('ip')->setComment('登录IP'));
        $table->addColumn(Column::string('ip_address')->setComment('ip地址'));
        $table->addTimestamps();
        $table->setEngine('MyISAM');
        $table->setComment('登录记录');
        $table->save();
    }
}
