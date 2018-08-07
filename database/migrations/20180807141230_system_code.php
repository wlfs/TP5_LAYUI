<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemCode extends Migrator
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
        $table=$this->table('system__codes');
        $table->addColumn(Column::unsignedInteger('group_id')->setComment('分组编号'));
        $table->addColumn(Column::string('name')->setComment('code名称'));
        $table->addColumn(Column::string('code')->setComment('code')->setUnique());
        $table->addColumn(Column::string('desc')->setComment('描述'));
        $table->addSoftDelete();
        $table->addTimestamps();
        $table->setComment('系统编码');
        $table->save();
    }
}
