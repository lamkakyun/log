<?php
namespace app\index\controller;

use app\index\service\TimeService;
use think\Controller;

class Index extends Controller
{
    /**
     * @AUTHOR: Lamkakyun
     * @DATE: 2018-05-30 08:09:11
     */
    public function index()
    {
        $params = request()->request();
        if (request()->method() == 'GET')
        {
            $time_item_list = TimeService::getInstance()->getTimeItemList();
            $this->assign('time_item_list', $time_item_list);
            return $this->fetch();
        }

        return TimeService::getInstance()->addEventLog($params);
    }


    /**
     * @AUTHOR: Lamkakyun
     * @DATE: 2018-05-30 08:09:06
     */
    public function addEvent()
    {
        $params = request()->request();

        if (request()->method() == 'GET')
        {
            $time_item_list = TimeService::getInstance()->getTimeItemList();
            $this->assign('time_item_list', $time_item_list);
            return $this->fetch();
        }

        return TimeService::getInstance()->addTimeItem($params);
    }


    public function eventLogList()
    {
        $logs = TimeService::getInstance()->getEventLogs();
        var_dump($logs);
    }
}
