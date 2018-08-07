<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemGroupAction extends Migrator
{

    public function change()
    {
        $table = $this->table('system__group_actions');
        $table->addColumn(Column::unsignedInteger('group_id')->setComment('分组编号'));
        $table->addColumn(Column::unsignedInteger('action_id')->setComment('动作编号'));
        $table->setPrimaryKey(['group_id','action_id']);
        $table->setEngine('MyISAM');
        $table->setComment('分组权限管理');
        $table->save();
    }
}
