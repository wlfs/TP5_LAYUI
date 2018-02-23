<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemGroup extends Migrator
{

    public function change()
    {
        $table = $this->table('system_groups');
        $table->increments();//主键
        $table->string('name','分组名称');
        $table->tinyint('is_sys','是否系统组');
        $table->integer('type','分类');
        $table->string('intro','描述',32);
        $table->integer('user_id','用户编号');
        $table->setEngine('MyISAM');
        $table->setComment('系统菜单表');
        $table->save();
    }
}
