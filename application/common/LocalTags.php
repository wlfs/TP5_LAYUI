<?php
/**
 * 自定义标签
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

namespace app\common;


use think\template\TagLib;

class LocalTags extends TagLib
{
    // 标签定义
    protected $tags = [
        'auth'        => ['attr' => 'code']
    ];

    public function tagAuth($tag,$content){
        $val=$tag['code'];
        $html="<?php if(\\app\\common\\facade\\Auth::check('$val')){?>";
        $html.=$content;
        $html.='<?php } ?>';
        return $html;
    }
}