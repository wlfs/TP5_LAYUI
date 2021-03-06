<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemCodeGroup extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table=$this->table('system__code_group');
        $table->addColumn(Column::string('name')->setComment('分组名称'));
        $table->addColumn(Column::string('desc')->setComment('描述'));
        $table->addTimestamps();
        $table->addSoftDelete();
        $table->setComment('系统编码分组');
        $table->save();
    }
}
