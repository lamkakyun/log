<?php

namespace app\common\model;

use think\Db;

class TimeItemModel
{
    protected static $table = "log_time_item";

    public static function getInstance()
    {
        return Db::table(self::$table);
    }
}