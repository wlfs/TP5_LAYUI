<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemAdminGroup extends Migrator
{

    public function change()
    {
        $table = $this->table('system_admin_group');
        $table->integer('group_id','分组编号');
        $table->integer('admin_id','管理员编号');
        $table->setPrimaryKey(['group_id','admin_id']);
        $table->setEngine('MyISAM');
        $table->setComment('用户住权限管理');
        $table->save();
    }
}
