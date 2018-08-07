<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemGroup extends Migrator
{

    public function change()
    {
        $table = $this->table('system__groups');
        $table->addColumn(Column::string('name')->setComment('分组名称'));
        $table->addColumn(Column::string('code')->setComment('分组编码'));
        $table->addColumn(Column::string('intro')->setComment('描述'));
        $table->addTimestamps();
        $table->setEngine('MyISAM');
        $table->setComment('系统菜单表');
        $table->save();
    }
}
