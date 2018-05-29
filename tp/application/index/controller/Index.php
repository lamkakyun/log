<?php
namespace app\index\controller;

use app\index\service\TimeService;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $time_item_list = TimeService::getInstance()->getTimeItemList();

        $this->assign('time_item_list', $time_item_list);
        return $this->fetch();
    }
}
