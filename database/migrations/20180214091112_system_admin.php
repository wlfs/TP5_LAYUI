<?php

use think\migration\Migrator;

class SystemAdmin extends Migrator
{

    public function change()
    {
        $table = $this->table('system_admins');
        $table->increments();//主键
        $table->string('name','用户名');
        $table->string('login_name','登录名');
        $table->string('password','用户密码');
        $table->string('salt','密码盐',5);
        $table->string('mobile','手机号码',20);
        $table->string('email','邮箱',50);
        $table->string('last_login_ip','最后登录IP',50);
        $table->bigint('last_login_time','最后登录时间',50);
        $table->string('last_login_address','最后登录地址',50);
        $table->integer('error_count','异常次数');
        $table->string('memo','备注');
        $table->tinyint('status','状态',1);
        $table->integer('created','创建时间');
        $table->string('skin','皮肤');
        $table->setEngine('MyISAM');
        $table->setComment('系统管理员表');
        $table->save();
    }
}
