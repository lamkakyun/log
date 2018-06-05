<?php

namespace app\index\controller;

use think\Controller;
use think\Url;

class Test extends Controller
{

    public function testBs4()
    {
        $methods = get_class_methods(get_class($this));
        $show_methods = [];
        foreach ($methods as $value) {
            $_url = Url::build($value);
            if (preg_match('/^bs4*/', $value)) $show_methods[$_url] = $value;
        }

        $this->assign('show_methods', $show_methods);
        return $this->fetch();
    }


    // bingo
    public function bs4Album()
    {
        return $this->fetch();
    }

    // bingo
    public function bs4Carousel()
    {
        return $this->fetch();
    }

    // bingo
    public function bs4CheckForm()
    {
        return $this->fetch();
    }

    // bingo
    public function bs4Cover()
    {
        return $this->fetch();
    }

    // bingo
    public function bs4Signin()
    {
        return $this->fetch();
    }

    // bingo
    public function bs4Jumbotron()
    {
        return $this->fetch();
    }

    public function bs4Blog()
    {
        return $this->fetch();
    }

    public function bs4Dash()
    {
        return $this->fetch();
    }

    public function bs4Product()
    {
        return $this->fetch();
    }

    public function bs4Svg()
    {
        return $this->fetch();
    }

    public function testChartjs()
    {
        return $this->fetch();
    }

    public function lifeGame()
    {
        return $this->fetch();
    }
}