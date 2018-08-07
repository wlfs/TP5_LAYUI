<?php
/**
 * route.php
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

//定义Admin
Route::group('admin', function () {
    //定义系统模块
    Route::group('system', function () {
        //定义首页
        Route::group('index', function () {
            Route::get('index', 'admin/system.index/index');
        });
        Route::group('common', function () {
            //登录
            Route::get('login', 'admin/system.common/login');
            //登录
            Route::post('login','admin/system.common/loging');
            //退出登录
            Route::get('logout', 'admin/system.common/logout');
            //图片验证码
            Route::get('captcha', 'admin/system.common/captcha');
            //没有权限
            Route::get('login', 'admin/system.common/noPermission');
        });
        //管理员管理
        Route::group('admin', function () {
            Route::get('create', 'admin/system.admin/create');
            Route::get('edit/:id', 'admin/system.admin/edit');
            Route::post('del/:id', 'admin/system.admin/del');
            Route::get('/', 'admin/system.admin/index');
        });
    });
    //登录路由
    Route::rule('/', 'admin/system.index/index');
});