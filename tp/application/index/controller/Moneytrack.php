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
            $fixed_items = [
                'FOOD',
                'TRAFFIC',
                'CLOTH'
            ];
            $money_items = MoneyService::getInstance()->getAllMoneyItems();
            $money_items = array_merge($money_items, $fixed_items);

            $this->assign('money_items', $money_items);
            return $this->fetch();
        }

        return MoneyService::getInstance()->addMoneyLog($params);
    }

    public function log()
    {
        $log_list = MoneyService::getInstance()->getAllLog();

        $this->assign('log_list', $log_list);
        return $this->fetch();
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
        if (request()->method() == 'GET')
        {
            $fixed_items = [
                'FOOD',
                'TRAFFIC',
                'CLOTH'
            ];
            $money_items = MoneyService::getInstance()->getAllMoneyItems();
            $money_items = array_merge($money_items, $fixed_items);

            $this->assign('money_items', $money_items);
            return $this->fetch();
        }

        return MoneyService::getInstance()->addMoneyItem($params);
    }
}