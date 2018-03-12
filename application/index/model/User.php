<?php

namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

class User extends Model
{
    // 导入软删除方法集
    use SoftDelete;

    // 设置软删除字段
    // 只有该字段为NULL，该字段才能显示出来
    protected $deleteTime = 'delete_time';

    // 保存自动完成列表
    protected $auto = [
        'delete_time' => null,
        'is_delete' => 1 // 1：允许删除 0:禁止删除
    ];

    // 新增自动完成列表
    protected $insert = [
        'login_time' => NULL, // 新增时login_time字段应该为NULL，因为刚刚创建还没有登录
        'login_count' => 0 // 设置登录 统计次数为0
    ];

    // 更新自动完成列表
    protected $update = [];

    // 是否需要自动写入时间戳 如果设置为字符串 则表示时间字段的类型
    protected $autoWriteTimestamp = TRUE;

    // 创建时间字段
    protected $createTime = 'create_time';

    // 更新时间字段
    protected $updateTime = 'update_time';

    // 时间字段取出后的默认格式
    protected $dateFormat = 'Y年m月d日';

    // 数据表中角色字段，role返回值处理
    public function getRoleAttr($value)
    {
        $role = [
            0 => '超级管理员',
            1 => '普通管理员',
            2 => '总经理',
            30 => '销售部经理',
            40 => '维护部经理'
        ];
        return $role[$value];
    }

    // 状态字段，status返回值处理
    /*    public function getStatusAttr($value)
       {
           $status = [
               0 => '已经停用',
               1 => '已经启用'
           ];
           return $status[$value];
       } */

    // 密码修改器
    public function setPasswordAttr($value)
    {
        return md5($value);
    }

    // 登录时间获取器
    public function getLoginTimeAttr($value)
    {
        return date('Y/m/d H:i', $value);
    }
}