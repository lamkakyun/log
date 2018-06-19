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

        if ($params['status'])
        {
            $where['status'] = $params['status'];
        }

        return ModelFactory::getMissionModel()->where($where)->order('priority DESC, create_time DESC')->select();
    }


    public function getTaskById($id)
    {
        return ModelFactory::getMissionModel()->where(['id' => $id])->find();
    }


    public function editTask($params)
    {
        $is_eidt = false;
        if (isset($params['id'])) $is_eidt = true;

        if (!$params['task']) return json(['success' => false, 'msg' => 'task is not allow be empty!']);

        if ($is_eidt)
        {
            if (!preg_match('/^\d+$/', $params['id'])) return json(['success' => false, 'msg' => 'argument error']);
            $task_count = ModelFactory::getMissionModel()->where(['id' => $params['id']])->count();
            if (!$task_count) return json(['success' => false, 'msg' => 'information do not exists']);
        }

        $insert_data = [
            'task' => $params['task'],
            'comment' => $params['comment'],
            'create_time' => time(),
            'last_update_time' => time(),
            'status' => 1, // 1 start 2 stop 3 bingo 4 deleted
        ];
        if ($is_eidt)
        {
            ModelFactory::getMissionModel()->where(['id' => $params['id']])->update($insert_data);
        }
        else
        {
            ModelFactory::getMissionModel()->insert($insert_data);
        }


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

    public function updatePriority($params)
    {
        if (!preg_match('/^\d+$/', $params['id'])) return json(['success' => false, 'msg' => 'param error:id']);
        if (!preg_match('/^\d+$/', $params['priority'])) return json(['success' => false, 'msg' => 'param error:priority']);

        $where = ['id' => $params['id']];
        $task_count = ModelFactory::getMissionModel()->where($where)->count();
        if (!$task_count) return json(['success' => false, 'msg' => 'information do not exists']);

        ModelFactory::getMissionModel()->where($where)->update(['priority' => $params['priority']]);
        return json(['success' => true, 'msg' => 'bingo!']);
    }
}