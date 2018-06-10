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
        $task_list = TaskService::getInstance()->getTaskList($params);
        return $task_list;
    }


    public function addTask()
    {
        $params = request()->request();
        $ret = TaskService::getInstance()->editTask($params);
    }

    public function delTask()
    {
        $params = request()->request();
        $ret = TaskService::getInstance()->delTask($params);
    }


    public function editTask()
    {
        $params = request()->request();
        $ret = TaskService::getInstance()->editTask($params);
    }
}