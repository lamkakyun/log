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

    public function logBtn()
    {
        $params = request()->request();
        if (request()->method() == 'GET')
        {
            $time_item_list = TimeService::getInstance()->getTimeItemList();
            $this->assign('time_item_list', $time_item_list);
            return $this->fetch();
        }

        $params['event_id'] = $params['id'];
        return TimeService::getInstance()->addEventLog($params);
    }


    public function delItem()
    {
        $params = request()->request();
        return TimeService::getInstance()->delItem($params);
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
        $list = TimeService::getInstance()->getEventLogs();

        $event_list = TimeService::getInstance()->getTimeItemList(['status' => ['IN', ['0', '1']]]);

        $this->assign('list', $list);
        $this->assign('event_list', $event_list);
        return $this->fetch();
    }


    public function delLog()
    {
        $params = request()->request();
        return TimeService::getInstance()->delLog($params);
//        if (!preg_match('/^\d+$/', $params['id']))
    }
}
