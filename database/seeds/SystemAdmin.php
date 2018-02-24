<?php

use think\migration\Seeder;

class SystemAdmin extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $row=[
            'name' => '超级管理员',
            'login_name' => 'admin',
            'password' => 'c4e8120040b73db42167a3b91fc51424',
            'salt' => 'QETS',
            'mobile' => '13883096587',
            'email' => 'admin@9ey.com',
            'last_login_ip' => '127.0.0.1',
            'last_login_time' => time(),
            'last_login_address' => '本机地址',
            'error_count' => 0,
            'memo' => '超级管理员账号',
            'status' => 1,
            'created' => time(),
            'skin' => 'green'
            ];
        $this->table('system_admins')->insert($row)->save();
    }
}