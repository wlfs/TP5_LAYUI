<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemAction extends Migrator
{

    public function change()
    {
        $table = $this->table('system__actions');
        $table->addColumn(Column::string('name')->setComment('动作名称'));
        $table->addColumn(Column::string('code')->setComment('动作编码'));
        $table->addColumn(Column::unsignedInteger('pid')->setComment('上级编号'));
        $table->addColumn(Column::string('remark')->setComment('备注'));
        $table->addColumn(Column::tinyInteger('level')->setComment('层数'));
        $table->setEngine('MyISAM');
        $table->setComment('系统动作表');
        $table->save();
    }
}
