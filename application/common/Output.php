<?php
/**
 * Output.php
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

namespace app\common;


class Output
{
    public $code;
    public $data = [];
    public $msg;
    const SUCCESS=0;
    public function error($msg = '失败',$code = -1,  $data = [])
    {
        $this->code = $code;
        $this->data = $data;
        $this->msg = $msg;
        return $this;
    }

    public function success($msg = '成功', $data = [])
    {
        $this->code = static::SUCCESS;
        $this->msg = $msg;
        $this->data = $data;
        return $this;
    }
    public function toJson(){
        return json($this);
    }
}