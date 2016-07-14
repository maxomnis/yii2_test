<?php
/**
 * 功能描述:
 *  创建小部件
 * @author zhangjun <zhangjun1@yy.com>
 * @version 1.0
 * Date: 2016/7/13 10:16
 */

namespace frontend\widget;

use yii\base\Widget;
use yii\helpers\Html;

class HelloWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
    }

    public function run()
    {
        //return "这是一个自创的小部件".Html::encode($this->message);
        //小部件也可以有自己的试图，下面是使用试图的写法
       return  $this->render('hello');
    }
}