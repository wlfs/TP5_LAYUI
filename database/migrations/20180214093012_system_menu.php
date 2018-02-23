<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemMenu extends Migrator
{

    public function change()
    {
        $table = $this->table('system_menus');
        $table->increments();//主键
        $table->string('name','菜单名字');
        $table->string('icon','菜单图标');
        $table->string('icon_class','菜单样式');
        $table->string('url','菜单地址',32);
        $table->string('action','动作Code',32);
        $table->integer('pid','上级菜单地址');
        $table->integer('weight','权重（值越大排序越前）');
        $table->setEngine('MyISAM');
        $table->setComment('系统菜单表');
        $table->save();
    }
}
