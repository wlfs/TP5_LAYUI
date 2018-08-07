<?php
/**
 * Created by PhpStorm.
 * User: 9ey
 * Date: 2018/7/21
 * Time: 20:29
 */

namespace app\common\migrator;


use Phinx\Db\Adapter\MysqlAdapter;
use think\Db;
use think\migration\db\Column;
use think\migration\db\Table;

class MysqlTable extends Table
{
    /**
     * 普通字符串
     * @param $name 字段名称
     * @param string $comment 描述
     * @param string $limit 字符串长度
     */
    function string($name,$comment='',$limit=''){
        $op['comment']=$comment;
        if(!empty($limit)){
            $op['limit']=$limit;
        }
        $this->addColumn($name , 'string' ,$op);
    }

    /**
     * 普通
     * @param $name
     * @param $comment
     * @param int $default
     */
    function integer($name,$comment,$default=0){
        $op['comment']=$comment;
        $op['default']=$default;
        $this->addColumn($name , 'integer' ,$op);
    }

    function unsignedInteger($name,$comment,$default=0){
        $op['comment']=$comment;
        $op['default']=$default;
        $op['signed']=false;
        $this->addColumn($name , 'integer' ,$op);
    }

    function bigint($name,$comment,$default=0){
        $op['comment']=$comment;
        $op['default']=$default;
        $this->addColumn($name , 'biginteger' ,$op);
    }

    function unsignedBigint($name,$comment,$default=0){
        $op['comment']=$comment;
        $op['default']=$default;
        $op['signed']=false;
        $this->addColumn($name , 'decimal' ,$op);
    }
    function decimal($name,$comment,$default=0,$precision=2,$scale=10){
        $op['comment']=$comment;
        $op['default']=$default;
        $op['precision']=$precision;
        $op['scale']=$scale;
        $this->addColumn($name , 'decimal' ,$op);
    }

    function unsignedDecimal($name,$comment,$default=0,$precision=2,$scale=10){
        $op['comment']=$comment;
        $op['default']=$default;
        $op['precision']=$precision;
        $op['scale']=$scale;
        $op['signed']=false;
        $this->addColumn($name , 'decimal' ,$op);
    }
    function text($name,$comment=''){
        $op['comment']=$comment;
        $this->addColumn($name , 'text' ,$op);
    }
    function increments(){
        $this->setId('id');
    }

    /**
     * 普通
     * @param $name
     * @param $comment
     * @param int $default
     */
    function tinyInt($name,$comment,$default=0){
        $op['comment']=$comment;
        $op['default']=$default;
        $op['limit']=MysqlAdapter::INT_TINY;
        $this->addColumn($name , 'integer' ,$op);
    }

    function unsignedTinyInt($name,$comment,$default=0){
        $op['comment']=$comment;
        $op['default']=$default;
        $op['signed']=false;
        $op['limit']=MysqlAdapter::INT_TINY;
        $this->addColumn($name , 'integer' ,$op);
    }
    function bool($name,$comment,$default=0){
        $op['comment']=$comment;
        $op['default']=$default;
        $this->addColumn($name , 'boolean' ,$op);
    }
    function softDelete($name='delete_time',$comment='软删除字段'){

    }

    /**
     * biginteger
    binary
    boolean
    date
    datetime
    decimal
    float
    integer
    string
    text
    time
    timestamp
    uuid
     * @param $name
     * @param string $comment
     * @param string $limit
     */




    /**
     * limit	set maximum length for strings, also hints column types in adapters (see note below)
    length	alias for limit
    default	set default value or action
    null	allow NULL values (should not be used with primary keys!)
    after	specify the column that a new column should be placed after (only applies to MySQL)
    comment	set a text comment on the column
     * For decimal columns:

    Option	Description
    precision	combine with scale set to set decimal accuracy
    scale	combine with precision to set decimal accuracy
    signed	enable or disable the unsigned option (only applies to MySQL)
     * For enum and set columns:

    Option	Description
    values	Can be a comma separated list or an array of values
    For integer and biginteger columns:

    Option	Description
    identity	enable or disable automatic incrementing
    signed	enable or disable the unsigned option (only applies to MySQL)
    For timestamp columns:

    Option	Description
    default	set default value (use with CURRENT_TIMESTAMP)
    update	set an action to be triggered when the row is updated (use with CURRENT_TIMESTAMP)
    timezone	enable or disable the with time zone option for time and timestamp columns (only applies
     */
}