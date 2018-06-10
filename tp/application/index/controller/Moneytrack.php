<?php
namespace app\index\controller;

use app\index\service\MoneyService;
use think\Controller;

class Moneytrack extends Controller
{
    /**
     * add money track, UI just like calculator
     * @AUTHOR: Lamkakyun
     * @DATE: 2018-05-31 10:44:27
     */
    public function index()
    {
        $params = request()->request();
        if (request()->method() == 'GET')
        {
            return $this->fetch();
        }

        return MoneyService::getInstance()->addMoneyLog($params);
    }

    /**
     * show add money items, like food, shopping, bus and so on .
     * @AUTHOR: Lamkakyun
     * @DATE: 2018-06-09 12:48:18
     * @DESCRIPTION:
     */
    public function moneyItems()
    {
        $params = request()->request();
        $fixed_items = [
            'FOOD',
            'TRAFFIC',
            'CLOTH'
        ];

        if (request()->method() == 'GET')
        {
            return $this->fetch();
        }

        return MoneyService::getInstance()->addMoneyItem($params);
    }
}