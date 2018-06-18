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

    public static function getMoneyItemsModel()
    {
        return Db::table('money_items');
    }

    public static function getMoneyLogModel()
    {
        return Db::table('money_log');
    }

    public static function getMissionModel()
    {
        return Db::table('mission');
    }

    public static function getRuleModel()
    {
        return Db::table('rule');
    }
}