<?php

namespace app\common\model;

use think\Db;

class ModelFactory
{
    public static function getLogTimeItemModel()
    {
        return Db::table('log_time_item');
    }

    public static function getLogTimeLoggingModel()
    {
        return Db::table('log_time_logging');
    }
}