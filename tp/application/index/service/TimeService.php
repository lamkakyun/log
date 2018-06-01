<?php
namespace app\index\service;

use app\common\model\ModelFactory;

class TimeService
{
    public static function getInstance()
    {
        return new TimeService();
    }

    public function getTimeItemList()
    {
        $data = ModelFactory::getLogTimeItemModel()->select();
        return $data;
    }

    public function addTimeItem($params)
    {
        if (empty($params['event'])) return json(['success' => false, 'msg' => 'event is not allow be empty']);

        $count = ModelFactory::getLogTimeItemModel()->where(['event' => $params['event']])->count();
        if ($count) return json(['success' => false, 'msg' => 'event is exists']);

        $add_data = [
            'event' => strtoupper($params['event']),
        ];

        ModelFactory::getLogTimeItemModel()->insert($add_data);

        return json(['success' => true, 'msg' => 'bingo!']);
    }


    public function addEventLog($params)
    {
        if (!preg_match('/^\d+$/', $params['event_id'])) return json(['success' => false, 'msg' => 'please select a event']);
        $count = ModelFactory::getLogTimeItemModel()->where(['id' => $params['event_id']])->count();
        if (!$count) return json(['success' => false, 'msg' => 'parameter error']);

        $insert_data = [
            'event_id' => $params['event_id'],
            'create_time' => time(),
        ];

        ModelFactory::getLogTimeLoggingModel()->insert($insert_data);
        return json(['success' => true, 'msg' => 'bingo!']);
    }


    public function getEventLogs()
    {
        $data = ModelFactory::getLogTimeLoggingModel()->select();
        foreach ($data as $key => $value)
        {
            $data[$key]['create_time'] = date('Y-m-d H:i:s', $value['create_time']);
            $data[$key]['event'] = ModelFactory::getLogTimeItemModel()->where(['id' => $value['event_id']])->value('event');
        }
        return $data;
    }
}