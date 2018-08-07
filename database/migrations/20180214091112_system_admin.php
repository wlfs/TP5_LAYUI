<?php

use think\migration\Migrator;
use think\migration\db\Column;
/**
 * Class SystemAdmin
 */
class SystemAdmin extends  Migrator
{

    public function change()
    {
        $table = $this->table('system__admins');
        $table->addColumn(Column::string('name')->setComment('用户名'));
        $table->addColumn(Column::string('login_name')->setComment('登录名'));
        $table->addColumn(Column::string('password')->setComment('用户密码'));
        $table->addColumn(Column::string('salt',5)->setComment('密码盐'));
        $table->addColumn(Column::string('mobile',12)->setComment('手机号码'));
        $table->addColumn(Column::string('email')->setComment('邮箱')->setNullable());
        $table->addColumn(Column::string('last_login_ip',50)->setComment('最后登录IP'));
        $table->addColumn(Column::unsignedInteger('last_login_time')->setComment('最后登录时间')->setDefault(1210573710));
        $table->addColumn(Column::string('last_login_address',50)->setComment('最后登录地址')->setNullable());
        $table->addColumn(Column::integer('error_count')->setComment('异常次数')->setDefault(0));
        $table->addColumn(Column::string('memo')->setComment('备注')->setNullable());
        $table->addColumn(Column::tinyInteger('status')->setComment('状态')->setDefault(1));
        $table->addColumn(Column::unsignedInteger('created')->setComment('创建时间'));
        $table->addColumn(Column::string('skin')->setComment('皮肤'));
        $table->addSoftDelete();
        $table->setEngine('MyISAM');
        $table->addIndex(['login_name','delete_time'],['name'=>'uniq__login_name_delete_time','type'=>'unique']);
        $table->setComment('系统管理员表');
        $table->save();
    }
}
