<?php
namespace app\index\controller;

use app\index\service\TaskService;
use think\Controller;

class Task extends Controller
{

    private $task_status = [
        '1' => 'start',
        '2' => 'stop',
        '3' => 'bingo',
        '4' => 'deleted',
    ];

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
            $params['status'] = ['IN', ['1', '2']];
            $task_list = TaskService::getInstance()->getTaskList($params);

            $this->assign('task_list', $task_list);
            $this->assign('task_status', $this->task_status);
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


    /**
     *
     * @author: lamkakyun
     * @date: Jun 18, 2018
     */
    public function bingoTask()
    {
        $params = request()->request();
        $params['status'] = ['IN', '3'];
        $task_list = TaskService::getInstance()->getTaskList($params);

        $this->assign('title', 'Bingo Task');
        $this->assign('task_status', $this->task_status);
        $this->assign('task_list', $task_list);
        return $this->fetch('task_list');
    }


    public function deletedTask()
    {
        $params = request()->request();
        $params['status'] = ['IN', '4'];
        $task_list = TaskService::getInstance()->getTaskList($params);

        $this->assign('title', 'Bingo Task');
        $this->assign('task_status', $this->task_status);
        $this->assign('task_list', $task_list);
        return $this->fetch('task_list');
    }

}