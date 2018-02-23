<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemAction extends Migrator
{

    public function change()
    {
        $table = $this->table('system_actions');
        $table->increments();
        $table->string('name','动作名称');
        $table->string('code','动作编码');
        $table->integer('pid','上级编号');
        $table->string('remark','备注');
        $table->bool('is_group','是否分组',1);
        $table->setEngine('MyISAM');
        $table->setComment('系统动作表');
        $table->save();
    }
}
