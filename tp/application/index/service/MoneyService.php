<?php
namespace app\index\service;

use app\common\model\ModelFactory;

class MoneyService
{
    public static function getInstance()
    {
        return new self();
    }

    /**
     * @AUTHOR: Lamkakyun
     * @DATE: 2018-06-09 12:52:35
     * @DESCRIPTION: add a new money log
     */
    public function addMoneyLog($params)
    {
//        var_dump($params);exit;
        if (!$params['money_item']) return json(['success' => false, 'msg' => 'please select a item']);
        if (!$params['money_amount']) return json(['success' => false, 'msg' => 'please input money amount']);

        $insert_data = [
            'money_item' => $params['money_item'],
            'money_amount' => $params['money_amount'],
            'money_comment' => $params['money_comment'] ? $params['money_comment'] : '',
            'create_time' => time(),
        ];

        ModelFactory::getMoneyLogModel()->insert($insert_data);

        return json(['success' => true, 'msg' => 'bingo!']);
    }


    public function getAllLog()
    {
        return ModelFactory::getMoneyLogModel()->order('create_time DESC')->select();
    }


    /**
     * add a new item
     * @AUTHOR: Lamkakyun
     * @DATE: 2018-06-09 12:54:54
     * @DESCRIPTION:
     */
    public function addMoneyItem($params)
    {
        $money_item = strtoupper(trim($params['money_item']));
        if (empty($money_item)) return json(['success' => false, 'msg' => 'item is not allow be empty']);
        $count = ModelFactory::getMoneyItemsModel()->where(['item_name' => $money_item])->count();
        if ($count) return json(['success' => false, 'msg' => 'item is exists']);

        $insert_data = [
            'item_name' => $money_item,
        ];

        ModelFactory::getMoneyItemsModel()->insert($insert_data);
        return json(['success' => true, 'msg' => 'bingo!']);
    }


    public function getAllMoneyItems()
    {
        $data = ModelFactory::getMoneyItemsModel()->select();

        $items = [];
        foreach ($data as $value)  $items[] = $value['item_name'];
        return $items;
    }
}