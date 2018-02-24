<?php
/**
 * ActionBll.php
 * @author wang lin <lin_wang@loongjoy.com>
 * @copyright Copyright (c) 2018 Loonjoy (http://www.loongjoy.com)
 * @version   v1.0.0
 */

namespace app\admin\logic\system;


use app\admin\logic\BaseLogic;

class ActionLogic extends BaseLogic
{
    public function getDir($dir)
    {
        $lis = $this->getModels($dir);
        $codes = [];
        foreach ($lis as $m) {
            $cs = [];
            $this->getConr($dir . '/' . $m . '/controller', $cs);
            foreach ($cs as $c) {
                $this->getActs($m . '\\controller\\' . $c, $codes, $m . "/$c/");
//                foreach ($ac as $a) {
//                    $codes[]=strtolower($m."/$c/".$a);
//                }
            }
        }
        var_dump($codes);
        return $lis;
    }

    private function getDesc($str)
    {
        $strs = explode("\n", $str);
        foreach ($strs as $s) {
            if (($pos = strpos($s, "@desc")) > 0) {
                return trim(substr($s, $pos + 5));
            }
        }
        return "";
    }

    private function getActs($name, &$lis, $c)
    {
        $name = '\\app\\' . str_replace('.', '\\', $name);
        $ref = new \ReflectionClass($name);
        $methods = $ref->getMethods(\ReflectionMethod::IS_PUBLIC);
        $classDoc = $ref->getDocComment();
        $classDoc = $this->getDesc($classDoc);
        foreach ($methods as $method) {
            $name = $method->getName();
            if (strpos($name, "_") === 0) continue;
            $mdoc = $method->getDocComment();
            $doc = $this->getDesc($mdoc);
            if (empty($doc)) {
                if ($name == 'index')
                    $doc = '列表';
                else if ($name == 'create') {
                    $doc = '添加页面';
                } else if ($name == 'add' || $name == 'store') {
                    $doc = '添加';
                } else if ($name == 'edit') {
                    $doc = '修改页面';
                } else if ($name == 'update') {
                    $doc = '修改操作';
                } else if ($name == 'del' || $name == 'delete') {
                    $doc = '删除';
                } else if ($name == 'show') {
                    $doc = '查看';
                }
            }

            $lis[strtolower($c . $name)] = $classDoc . '-' . $doc;
        }
    }

    private function getConr($dir, &$lis, $qz = '')
    {
        $ls = scandir($dir);
        foreach ($ls as $item) {
            if ($pos = strpos($item, ".php")) {
                //去掉Base
                if ($item == 'Base.php' && $qz == '') continue;
                $lis[] = $qz . substr($item, 0, $pos);
            } else if (strpos($item, ".") === false) {
                $this->getConr($dir . '\\' . $item, $lis, $qz . $item . '.');
            }
        }
    }

    private function getModels($dir)
    {
        $lis = scandir($dir);
        $ms = [];
        foreach ($lis as $item) {
            if (strpos($item, ".") === false) {
                //去掉common
                if ($item == 'common') continue;
                $ms[] = $item;
            }
        }
        return $ms;
    }
}