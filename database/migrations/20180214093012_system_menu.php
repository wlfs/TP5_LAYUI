<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemMenu extends Migrator
{

    public function change()
    {
        $table = $this->table('system__menus');
        $table->addColumn(Column::string('name')->setComment('菜单名字'));
        $table->addColumn(Column::string('icon')->setComment('菜单图标'));
        $table->addColumn(Column::string('icon_class')->setComment('菜单样式'));
        $table->addColumn(Column::string('url')->setComment('菜单地址'));
        $table->addColumn(Column::string('action')->setComment('动作Code'));
        $table->addColumn(Column::unsignedInteger('pid')->setComment('上级菜单地址'));
        $table->addColumn(Column::integer('weight')->setComment('权重（值越大排序越前）'));
        $table->addColumn(Column::tinyInteger('status')->setComment('状态'));
        $table->addSoftDelete();
        $table->setEngine('MyISAM');
        $table->setComment('系统菜单表');
        $table->save();
    }
}
