<?php
namespace app\index\controller;

use app\index\service\TaskService;
use think\Controller;

class Task extends Controller
{

    /**
     * task list
     * @AUTHOR: Lamkakyun
     * @DATE: 2018-05-31 10:46:58
     */
    public function index()
    {
        $params = request()->request();

        if (request()->method() == 'GET')
        {
            $task_list = TaskService::getInstance()->getTaskList($params);

            $task_status = [
                '1' => 'start',
                '2' => 'stop',
                '3' => 'bingo',
                '4' => 'deleted',
            ];

            $this->assign('task_list', $task_list);
            $this->assign('task_status', $task_status);
            return $this->fetch();
        }

        // add new task
        return TaskService::getInstance()->addTask($params);
    }


    public function updateTask()
    {
        $params = request()->request();
        $ret = TaskService::getInstance()->updateTaskStatus($params);

        return $ret;
//        return $this->success('operation success', url('index', '', ''));
    }



}