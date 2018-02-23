<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemGroupAction extends Migrator
{

    public function change()
    {
        $table = $this->table('system_group_actions');
        $table->integer('group_id','分组编号');
        $table->integer('action_id','动作编号');
        $table->setPrimaryKey(['group_id','action_id']);
        $table->setEngine('MyISAM');
        $table->setComment('分组权限管理');
        $table->save();
    }
}
