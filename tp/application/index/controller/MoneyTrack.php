<?php
namespace app\index\controller;

use think\Controller;

class MoneyTrack extends Controller
{
    /**
     * add money track
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


    }

    public function moneyItems()
    {

    }
}