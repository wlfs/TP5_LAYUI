<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemLoginRecord extends Migrator
{

    public function change()
    {
        $table = $this->table('system_login_record');
        $table->integer('created','创建时间');
        $table->integer('admin_id','管理员编号');
        $table->string('ip','管理员编号',20);
        $table->string('ip_address','ip地址');
        $table->setEngine('MyISAM');
        $table->setComment('登录记录');
        $table->save();
    }
}
