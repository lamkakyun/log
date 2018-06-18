<?php
namespace app\index\service;

use app\common\model\ModelFactory;

class RuleService
{
    public static function getInstance()
    {
        return new self();
    }

    public function getAllRule()
    {
        return ModelFactory::getRuleModel()->select();
    }


    public function addRule($params)
    {
        $insert_data = [
            'rule' => $params['rule'],
        ];

        return ModelFactory::getRuleModel()->insert($insert_data);
    }


    public function delRule($params)
    {
        $where = ['id' => $params['id']];
        return ModelFactory::getRuleModel()->where($where)->delete();
    }
}