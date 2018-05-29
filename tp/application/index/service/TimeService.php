<?php
namespace app\index\service;

use app\common\model\TimeItemModel;

class TimeService
{
    public static function getInstance()
    {
        return new TimeService();
    }

    public function getTimeItemList()
    {
        $data = TimeItemModel::getInstance()->select();
        return $data;
    }
}