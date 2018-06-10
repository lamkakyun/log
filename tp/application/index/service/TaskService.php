<?php
namespace app\index\service;

use app\common\model\ModelFactory;

class TaskService
{
    public static function getInstance()
    {
        return new self();
    }


    public function getTaskList($params)
    {
        $where = ['status' => ['IN', ['1', '2', '3']]];
        return ModelFactory::getMissionModel()->where($where)->order('create_time DESC')->select();
    }


    public function addTask($params)
    {
        if (!$params['task']) return json(['success' => false, 'msg' => 'task is not allow be empty!']);

        $insert_data = [
            'task' => $params['task'],
            'comment' => $params['comment'],
            'create_time' => time(),
            'last_update_time' => time(),
            'status' => 1, // 1 start 2 stop 3 bingo 4 deleted
        ];

        ModelFactory::getMissionModel()->insert($insert_data);
        return json(['success' => true, 'msg' => 'bingo!']);
    }


    public function updateTaskStatus($params)
    {
        if (!preg_match('/^\d+$/', $params['id'])) return json(['success' => false, 'msg' => 'param error:id']);
        if (!in_array($params['status'], ['1', '2', '3', '4'])) return json(['success' => false, 'msg' => 'param error:status']);

        $update_data = [
            'status' => $params['status'],
            'last_update_time' => time(),
        ];

        $where = ['id' => $params['id']];

        ModelFactory::getMissionModel()->where($where)->update($update_data);

        return json(['success' => true, 'msg' => 'bingo!']);
    }
}