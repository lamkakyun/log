<?php
namespace app\index\controller;

use app\index\service\RuleService;
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
            $rule_list = RuleService::getInstance()->getAllRule();

            $this->assign('rule_list', $rule_list);
            $this->assign('task_list', $task_list);
            $this->assign('task_status', $this->task_status);
            return $this->fetch();
        }

        // add new task
        return TaskService::getInstance()->editTask($params);
    }


    public function edit()
    {
        $params = request()->request();

        if (request()->method() == 'GET')
        {
            if (!preg_match('/^\d+$/', $params['id'])) $this->error('task is not exists');
            $task = TaskService::getInstance()->getTaskById($params['id']);

            $this->assign('task', $task);
            return $this->fetch();
        }

        // add new task
        return TaskService::getInstance()->editTask($params);
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


    /**
     * execute task rules
     * @author: lamkakyun
     * @date: Jun 18, 2018
     */
    public function rule()
    {
        $list = RuleService::getInstance()->getAllRule();
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function addRule()
    {
        $params = request()->request();
        if (!$params['rule']) return json(['success' => false, 'please input rule']);
        RuleService::getInstance()->addRule($params);
        return json(['success' => true, 'msg' => 'bingo!']);
    }

    public function delRule()
    {
        $params = request()->request();
        if (!preg_match('/^\d+$/', $params['id'])) return json(['success' => false, 'msg' => 'argument error']);
        RuleService::getInstance()->delRule($params);
        return json(['success' => true, 'msg' => 'bingo!']);
    }


    public function modifyPriority()
    {
        $params = request()->request();
        return TaskService::getInstance()->updatePriority($params);
    }

}