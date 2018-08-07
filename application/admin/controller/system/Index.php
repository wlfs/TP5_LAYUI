<?php
namespace app\admin\controller\system;

use app\admin\controller\Base;

class Index extends Base
{
    public function index()
    {
        return view('system/index/index');
    }
}
