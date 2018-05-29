<?php
namespace app\index\controller;

use app\index\service\TimeService;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $this->timeStatistics();
    }


    /**
     * @AUTHOR: Lamkakyun
     * @DATE: 2018-05-29 05:39:29
     */
    public function timeStatistics()
    {

        $time_item_list = TimeService::getInstance()->getTimeItemList();

        $this->fetch();
    }
}
